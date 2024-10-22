<?php
    require 'startConnection.php';
    if (isset($_POST['answer_id']) && isset($_POST['vote'])) {
        $answer_id = $_POST['answer_id'];
        $vote = intval($_POST['vote']);

        // Update the votes in the database
        $query = "UPDATE answers SET votes = votes + $vote WHERE answer_id = $answer_id";
        if ($conn->query($query)) {
            echo "Vote updated successfully.";
        } else {
            echo "Error updating vote: " . $conn->error;
        }
    }
    require 'closeConnection.php';
?>