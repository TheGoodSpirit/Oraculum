<?php
    require './startConnection.php';
    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $question_id = $_POST['question_id'];
        $user_id = $_POST['user_id'];
        $body = $_POST['body'];

        // Insert query
        $sql = "INSERT INTO answers  (question_id, user_id, body) VALUES ('$question_id', '$user_id', '$body')";

        // Execute the query
        if ($conn->query($sql)) {
            echo "New record created successfully";
            header('Location: ../Pages/dashboard.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    require './closeConnection.php';
?>