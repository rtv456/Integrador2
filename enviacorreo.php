<?php

require 'mail/PHPMailerAutoload.php';

$mail = new PHPMailer(true);     
try {
    $mail->SMTPDebug = 0;   
    $mail->isSMTP();         

   
    $mail->Host = 'smtp.gmail.com';             
                                             
    $mail->Username = 'info@cmch.com.pe';       
    $mail->Port = 587;                       
    $mail->setFrom('myname@web.de', 'Clinica Los Olivos - Citas web');
    $mail->Password = '1nf0cmch:08';        


    $mail->SMTPAuth = true;                  
    $mail->SMTPSecure = 'tls';          


    $mail->addAddress('lalosamuel@gmail.com');               
    $mail->CharSet = "UTF-8";              


    $mail->isHTML(true);                                  
    $mail->Subject = 'Confirmacion de Cita';
    $mail->Body    = 'Usted ha generado de manera satisfactoria su cita</b>';
    $mail->AltBody = 'Algun detalle en html<b>dsfdsfds</b><h1>Holaaaaaaaaaaa</h1>';

    $mail->send();
    echo 'ok';
} catch (Exception $e) {
    echo 'not.';
    echo 'erro: ' . $mail->ErrorInfo;
}




/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';



// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@cmch.com.pe';                     // SMTP username
    $mail->Password   = '1nf0cmch:08';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@cmch.com.pe', 'Pepe');
    $mail->addAddress('lalosamuel@gmail.com');               // Name is optional
   

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Asunto';
    $mail->Body    = 'This is talgo de HTML <b>in bold!</b>';
    $mail->AltBody = 'y no se que mas';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
*/

?>