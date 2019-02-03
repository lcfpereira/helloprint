<?php
namespace Helloprint\Services\PhpMailer;

//Load Composer's autoloader
require_once $_SERVER['DOCUMENT_ROOT'].'/helloprint/vendor/autoload.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PhpMailerService {
    public function sendEmail($from, $subject, $body, $altBody){
        try {
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
            $mail->addAddress($from);   

        
            $mail->isHTML(true);                                  
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = $altBody;
        
            $mail->send();
           return 'Email was sended!';
        } catch (Exception $e) {
            return 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
        }    
    }
}
