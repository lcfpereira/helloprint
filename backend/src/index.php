<?php
namespace Helloprint\Services;

require_once __DIR__ . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/service.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage; 
use Helloprint\Services\Service;

$connection = new AMQPStreamConnection('172.17.0.2', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('rpc_queue', false, false, false, false);

function fib($n)
{
    if ($n == 0) {
        return 0;
    }
    if ($n == 1) {
        return 1;
    }
    return fib($n-1) + fib($n-2);
}

    echo " [x] Awaiting RPC requests\n";
    
    $callback = function ($req) {

        echo $req->body;

    $service = new Service();
    $mensagem = $service->execute($req->body);

    $msg = new AMQPMessage(
        $mensagem,
        array('correlation_id' => $req->get('correlation_id'))
    );

    $req->delivery_info['channel']->basic_publish(
        $msg,
        '',
        $req->get('reply_to')
    );
    $req->delivery_info['channel']->basic_ack(
        $req->delivery_info['delivery_tag']
    );
};

$channel->basic_qos(null, 1, null);
$channel->basic_consume('rpc_queue', '', false, false, false, false, $callback);

while (count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();