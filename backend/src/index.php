<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT');

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/services/RecoverPassword.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/services/init.php';

use \Helloprint\Services\RecoverPassword;
use \Helloprint\Services\Init;

$init = new Init();
$init->execute();

$recoverPass = new RecoverPassword();
return $recoverPass->recover($_GET['username']);