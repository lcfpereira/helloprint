<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT');

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/services/RecoverPassword.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/services/Init.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/services/Login.php';

use \Helloprint\Services\RecoverPassword;
use \Helloprint\Services\Init;
use \Helloprint\Services\Login;

$init = new Init();
$init->execute();

if ($_GET["op"] === "recover"){
    $recoverPass = new RecoverPassword();
    echo $recoverPass->recover($_GET['username']);
}

if ($_GET["op"] === "login"){
    $login = new Login();
    echo $login->execute($_GET['username'], $_GET['password']);
}