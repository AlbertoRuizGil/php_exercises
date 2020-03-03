<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require "../Model/PHPMailer.php";
require "../Model/ExceptionMail.php";
require "../Model/SMTP.php";

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                   // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'prodriguezarmida@gmail.com';                     // SMTP username
    $mail->Password   = '';                              // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('prodriguezarmida@gmail.com', 'Mailer');
    $mail->addAddress('prodriguezarmida@gmail.com');     // Add a recipient            // Name is optional

    // Attachments
    $mail->addAttachment('../../../mail/mail.json');         // Add attachments    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    header("Location: ../View/compra.php");
} catch (ExceptionMail $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("Location: ../View/filtro1.php");
}catch(Exception $e){
    header("Location: ../View/filtro1.php");
}
