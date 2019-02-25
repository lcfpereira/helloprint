<?php 

namespace Helloprint\Services;

use PDO;

class DB
{

    public function create() {
        $conn = new PDO('mysql:host=localhost;', 'root', '');
        $conn->exec('CREATE DATABASE helloprint;');
        $conn->exec('CREATE TABLE `helloprint`.`users` ( `Id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `password` VARCHAR(15) NOT NULL , `email` VARCHAR(60) NOT NULL , `status` TINYINT(2) NOT NULL , PRIMARY KEY (`Id`)) ENGINE = InnoDB;'); 
        $conn->exec("INSERT INTO `helloprint`.`users` (`Id`, `username`, `password`, `email`, `status`) VALUES (NULL, 'helloprint', 'P@ssw0rd!', 'helloprint@mailinator.com', 1)");
    }

    public function selectUserData($username, $password){
        $conn = new PDO('mysql:host=localhost;', 'root', '');
        $query = "SELECT password, email FROM `helloprint`.`users` WHERE username = :username";

        $parameters = [':username' => $username];

        if (!empty($password)){
            $query .= " AND password = :password";
            $parameters[':password'] = $password;
        }

        $query .= " AND status = 1";

        $q = $conn->prepare($query);
        
        // pass values to the query and execute it
        $q->execute($parameters);
        
        $q->setFetchMode(PDO::FETCH_ASSOC);
        
        // print out the result set
        $r = $q->fetch();

        return $r;
    }


}
