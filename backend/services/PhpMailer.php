<?php
namespace Helloprint\Services\PhpMailer;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

class PhpMailerService {
    public function sendEmail($from, $fromName, $subject, $body, $altBody){
        $mail = new PHPMailer(true);                           

        $mail->SMTPDebug = 2;                                
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                              
        $mail->Username = 'helloprintchallenge@gmail.com';                 
        $mail->Password = 'wiwi_lp11';                          
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 587;                                    
    
        $mail->setFrom('helloprintchallenge@gmail.com', 'Helloprint Challenge');
        $mail->addAddress($from, $fromName);   

    
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $altBody;
    
        $mail->send();
        echo 'Message has been sent';
    }
}
