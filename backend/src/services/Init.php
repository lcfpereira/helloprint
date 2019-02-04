<?php 

namespace Helloprint\Services;

use PDO;


class Init
{
    Public function execute() {
        $servername = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'users';
        
        $conn = new PDO('mysql:host=localhost;', $user, $pass);

        $conn->exec('CREATE DATABASE helloprint;');
        $conn->exec('CREATE TABLE `helloprint`.`users` ( `Id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `password` VARCHAR(15) NOT NULL , `email` VARCHAR(60) NOT NULL , `status` TINYINT(2) NOT NULL , PRIMARY KEY (`Id`)) ENGINE = InnoDB;'); 
        $conn->exec("INSERT INTO `helloprint`.`users` (`Id`, `username`, `password`, `email`, `status`) VALUES (NULL, 'helloprint', 'P@ssw0rd!', 'lpereirapro@gmail.com', '1')");
    }
}
