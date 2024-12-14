<?php
    session_start();
    require './startConnection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if ($email != "" && $password != "") {
            // Check if the user exists and is verified
            $query = "SELECT * FROM users WHERE email = '$email' AND is_active = 1";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) === 1) {
                $user = mysqli_fetch_assoc($result);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['uid'];
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_name'] = $user['username'];
                    header('Location: ../Pages/dashboard.php');
                    exit;
                } else {
                    echo "Incorrect password.";
                }
            } else {
                echo "Your account is not verified. Please check your email.";
                echo "<br> <a href='./verification.php'>Click here</a> to verify.";
            }
        } else {
            echo "Please enter all your details.";
        }
         
    }
    require './closeConnection.php';
?>