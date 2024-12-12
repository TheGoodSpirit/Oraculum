    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    // PHPMailer Object
    $mail = new PHPMailer();

    // SMTP Configuration
    $mail->isSMTP(true);
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mannish079@gmail.com';
    $mail->Password = 'hxib daai nhgc qefp '; 
    $mail->Port = 587;

    // Sender and recipient settings
    $mail->addAddress('ghimiremanish007@gmail.com');

    // Sending plain text email
    $mail->isHTML(false); // Set email format to plain text
    $mail->Subject = 'Your Subject Here';
    $mail->Body    = 'This is the plain text message body';

    // Send the email
    if(!$mail->send()){
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
?>