<?php 

namespace Helloprint\Services;

require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'].'/services/PhpMailer.php';

use Helloprint\Services\PhpMailerService;
use PDO;

class RecoverPassword {

    public function recover($username){
        $userData = $this->getPassword($username);

        $emailBody = $this->bodyEmail($username, $userData);

        $emailAltBody = $this->altBodyEmail($username, $userData);

        $phpMailer = new PhpMailerService();

        $result = $phpMailer->sendEmail($userData['email'], 'Recover Password', $emailBody, $emailAltBody);

        return $result;
    }

    protected function getPassword($username){
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
            while ($r = $q->fetch()) {
                return $r;
            }

        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conn = null;
    }

    private function bodyEmail($username, $userData){
        return 'Hi '.$username.',</br> you password is '.$userData['password'] . ' </br> Best regards, HelloPrint</br>';
    } 

    private function altBodyEmail($username, $userData){
        return 'Hi '.$username.', you password is '.$userData['password'] . ' Best regards, HelloPrint';
    } 
}

?>