<?php

    session_start();

    require './startConnection.php';

    $user_id = $_SESSION['user_id']; 
    $title = $_POST['title'];
    $body = $_POST['body'];

    $sql = "INSERT INTO questions (user_id, title, body) VALUES ('$user_id', '$title', '$body')";

    if($title != "" && $body != "") {
         if ($conn->query($sql)) {
        echo "question submitted successsfully.";
        }
        header('Location: ../Pages/dashboard.php');
    } else {
        echo "Please fill up the all input fields.";
    }
   

    require './closeConnection.php';
?>