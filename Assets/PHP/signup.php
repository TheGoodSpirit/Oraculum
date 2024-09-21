<?php
    session_start();
    require 'startConnection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];  // Store plain password for validation
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        $errors = [];

        // Username Validation: 3-16 characters (alphanumeric only)
        if (!preg_match("/^[a-zA-Z]{3,16}$/", $user)) {
            $errors['username'] = "Username must be 3-16 characters only.";
        }

        // Email Validation: check if valid email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Please enter a valid email address.";
        }

        // Password Validation: minimum 8 characters, at least one letter and one number
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $pass)) {
            $errors['password'] = "Password must be at least 8 characters long with at least one letter and one number.";
        }

        // If no errors, proceed with the SQL query
        if (empty($errors)) {
            $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$hashedPass')";
            
            if ($conn->query($sql)) {
                header('Location: ../../index.php');  // Redirect on successful signup
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // If errors exist, store them in session and return to form
            $_SESSION['errors'] = $errors;
            header('Location: ../../index.php');

        }
    }

    require 'closeConnection.php';
?>