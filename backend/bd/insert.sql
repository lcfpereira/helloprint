

CREATE TABLE `users`.`users` ( `Id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , 
`password` VARCHAR(15) NOT NULL , `email` VARCHAR(60) NOT NULL , `status` TINYINT(2) NOT NULL , PRIMARY KEY (`Id`)) ENGINE = InnoDB;

INSERT INTO `users` (`Id`, `username`, `password`, `email`, `status`) 
VALUES (NULL, 'helloprint', 'P@ssw0rd!', 'lpereirapro@gmail.com', '1');