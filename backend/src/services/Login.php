<?php 

namespace Helloprint\Services;

require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

use PDO;

class Login {

    public function execute($username, $password){
        $isRegistered = $this->IsRegistered($username, $password);

        if ($isRegistered === false){
            return $username . " is not registered!";
        }else{
            return "Login successful!";
        }
    }

    protected function IsRegistered($username, $password){
        $servername = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'users';

        try {
            $conn = new PDO('mysql:host=localhost;', $user, $pass);

            $q = $conn->prepare("SELECT password, email FROM `helloprint`.`users` WHERE username = :username");
            
            // pass values to the query and execute it
            $q->execute([':username' => $username]);
            
            $q->setFetchMode(PDO::FETCH_ASSOC);
            
            // print out the result set
            $r = $q->fetch();

            return $r;

        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

?>