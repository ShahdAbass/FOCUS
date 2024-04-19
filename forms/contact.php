<?php

require('../vendor/smtp/PHPMailer.php');
require('../vendor/smtp/SMTP.php');
require('../vendor/smtp/Exception.php');

require('vendor/smtp/PHPMailer.php');
require('vendor/smtp/SMTP.php');
require('vendor/smtp/Exception.php');

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
 $mail = new PHPMailer(true);


 try {
   //Server settings
   $mail->SMTPDebug = SMTP::DEBUG_SERVER;          
   $mail->isSMTP();     
   $mail->SMTPAuth   = true;                       
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
   $mail->Port       = 587;        
   $mail->SMTPSecure = "tls";                  

   $mail->Host       = 'smtp.gmail.com';
   $mail->Username   = 'info@trkez.com';
   $mail->Password   = 'egrbtxdkihq';
   
   $mail->setFrom('info@trkez.com', 'Trkez');
   $mail->addAddress('info@trkez.com');

   $mail->isHTML(true);
   $mail->Subject = 'Notification: Received New Inquiry!';
   $mail->Body    = 'Name: ' . $_POST['name'] . '<br>' . 
                    'Email: ' . $_POST['email'] . '<br>'. 
                    'Subject: ' . $_POST['subject'] . '<br>' .
                    'Message: '. $_POST['message'];

   $mail->send();
   echo 'Message has been sent';
} catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 $retval = mail($to,$subject,$message,$header);
?>