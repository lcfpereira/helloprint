<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT');

require_once __DIR__ . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/broker.php';


use Helloprint\Broker\FibonacciRpcClient;
use function GuzzleHttp\json_encode;


$data = ["op" => $_POST['op'], "username" => $_POST['username']];

if (!empty($_POST['password'])){
    $data["password"] =  $_POST['password'];
}

$fibonacci_rpc = new FibonacciRpcClient();
$response = $fibonacci_rpc->call(json_encode($data));
echo $response;