<?php 

namespace Helloprint\Services;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/services/PhpMailer.php';

use \Helloprint\Services\PhpMailerService;
use \Helloprint\Services\DB;
use PDO;

class RecoverPassword {

    public function recover($username){
        $db = new DB();
        $userData = $db->selectUserData($username, '');

        if ($userData === false){
            return "This user is not registered!";
        }

        $emailBody = $this->bodyEmail($username, $userData);

        $emailAltBody = $this->altBodyEmail($username, $userData);

        $phpMailer = new PhpMailerService();

        $result = $phpMailer->sendEmail($userData['email'], 'Recover Password', $emailBody, $emailAltBody);

        if ($result === true){

            return "Email sent!";
        }

        return $result;
    }

    private function bodyEmail($username, $userData){
        return '<p>Hi '.$username.',</p> <p>you password is '.$userData['password'] . '</p> <p>Best regards,</p> <p>HelloPrint</p>';
    } 

    private function altBodyEmail($username, $userData){
        return 'Hi '.$username.', you password is '.$userData['password'] . ' Best regards, HelloPrint';
    } 
}


?>