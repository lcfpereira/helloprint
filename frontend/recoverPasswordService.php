<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/helloprint/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/helloprint/backend/src/RecoverPassword.php';

use \Helloprint\Services\RecoverPassword;

$recoverPass = new \RecoverPassword();

return recover($_GET['username']);