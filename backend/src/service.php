<?php 
namespace Helloprint\Services;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/services/RecoverPassword.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/services/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/services/Login.php';

use \Helloprint\Services\RecoverPassword;
use \Helloprint\Services\DB;
use \Helloprint\Services\Login;
use function GuzzleHttp\json_decode;


class Service {

    public function execute($data){
        $db = new DB();
        $db->create();  

        $data = json_decode($data, true);
        

        if ($data["op"] === "recover"){
            $recoverPass = new RecoverPassword();
            return $recoverPass->recover($data['username']);
        }

        if ($data["op"] === "login"){
            $login = new Login();
            return $login->execute($data['username'], $data['password']);
        }   
    }

}
