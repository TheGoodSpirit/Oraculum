<?php

    require 'startConnection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";

        if ($conn->query($sql)) {
            echo "Registration successful!";
            header('Location: ../../index.html');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    require 'closeConnection.php';
?>