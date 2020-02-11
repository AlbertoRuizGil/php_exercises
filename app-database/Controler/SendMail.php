<?php

session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once("../Model/PHPMailer/PHPMailer.php");
require_once("../Model/PHPMailer/SMTP.php");
require_once("../Model/PHPMailer/Exception.php");

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'zayasdaw007@gmail.com';                     // SMTP username
    $mail->Password   = '12345678daw';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('zayasdaw007@gmail.com', 'Mailer');
    $mail->addAddress($_SESSION["email"], $_SESSION["user"]);     // Add a recipient
    /* $mail->addAddress('ellen@example.com'); */               // Name is optional
    /* $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com'); */

    // Attachments
    /* $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Bienvenido';
    $mail->Body    = 'Bienvenido a la aplicación de librería ' . $_SESSION["user"];
    /* $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; */

    $mail->send();
    echo 'Message has been sent';
    header("Refresh: 2; url=../View/Customer.php");
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}