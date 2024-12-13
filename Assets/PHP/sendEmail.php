<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Generate the verification code
if (!isset($_SESSION['verification_code'])) {
    $_SESSION['verification_code'] = rand(100000, 999999); // Store the code in session
}

// Fetch email from session
if (!isset($_SESSION['signupEmail'])) {
    echo "No email found in session. Please sign up first.";
    exit;
}

$email = $_SESSION['signupEmail'];
$verification_code = $_SESSION['verification_code'];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userVerCode'])) {
    $userVerCode = $_POST['userVerCode'];

    if ($userVerCode == $verification_code) {
        unset($_SESSION['verification_code']);        
        echo "Verification successful! Redirecting...";
        header('Location: ../Pages/dashboard.php');
        exit;
    } else {
        echo "Invalid verification code. Please try again.";
    }
} else {
    // Send the email if not sent
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
        echo "Check your email for the verification code.";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
    }
}

// Display the verification form
echo "
    <form action=".htmlspecialchars($_SERVER['PHP_SELF'])." method='post'>
        <label for='userVerCode'>Enter verification code:</label><br>
        <input type='number' name='userVerCode' id='userVerCode' required><br><br>
        <input type='submit' value='Verify'>
    </form>
";
?>
