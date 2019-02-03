<?php 

namespace Helloprint\Services\RecoverPassword;

require $_SERVER['DOCUMENT_ROOT'].'/helloprint/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'].'/helloprint/backend/src/PhpMailer.php';

use Helloprint\Services\PhpMailer;

class RecoverPassword {

    public function recover($username){
        $userData = $this->getPassword($username);

        $emailBody = $this->bodyEmail($username, $userData);

        $emailAltBody = $this->altBodyEmail($username, $userData);

        $phpMailer = new PhpMailer();

        $result = $phpMailer->sendEmail($from, 'Recover Password', $emailBody, $emailAltBody);

        return $result;
    }

    protected function getPassword($username){
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'users';

        try {
            $conn = new PDO('mysql:host=$servername;dbname=$dbname', $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare('SELECT password, email FROM users WHERE username = $username'); 
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
                return $v;
            }
        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conn = null;
    }

    private function bodyEmail($username, $userData){
        return 'Hello $username,</br> you password is '.$userData['password'] . ' </br> Best regards, HelloPrint</br>';
    } 

    private function altBodyEmail($username, $userData){
        return 'Hello $username, you password is '.$userData['password'] . ' Best regards, HelloPrint';
    } 
}

?>