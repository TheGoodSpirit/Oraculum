<?php
    
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $email = $_SESSION['signupEmail'];
    $verification_code = $_SESSION['verification_code'];

    $mail = new PHPMailer();
    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mannish079@gmail.com';
        $mail->Password = 'hxib daai nhgc qefp'; // Use app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipient settings
        $mail->setFrom('mannish079@gmail.com', 'Oraculum');
        $mail->addAddress($email);

        // Sending HTML email
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to Oraculum';
        $mail->Body    = '<h2>Verification code for activating your account</h2><p>' . $verification_code . '</p>';

        $mail->send();
        header('Location: ./verification.php');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
    }
        require 'closeConnection.php';
?>