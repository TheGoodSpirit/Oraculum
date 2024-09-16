<?php
session_start();  // Start a session

require './startConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Store user data in session
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_name'] = $row['username'];  

            // Redirect to user dashboard
            header('Location: ../Pages/dashboard.php');
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
require './closeConnection.php';
?>