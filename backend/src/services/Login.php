<?php 

namespace Helloprint\Services;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

use \Helloprint\Services\DB;
use PDO;

class Login {

    public function execute($username, $password){
        $db = new DB;
        $isRegistered = $db->selectUserData($username, $password);

        if ($isRegistered === false){
            return "Invalid credentials!";
        }else{
            return "Login successful!";
        }
    }
}

?>