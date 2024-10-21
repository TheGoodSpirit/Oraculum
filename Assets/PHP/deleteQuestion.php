<?php
    require '../PHP/startConnection.php';

    // Check if the question_id is set via GET
    if (isset($_GET['question_id'])) {
        $qid = $_GET['question_id'];
        
        // SQL to delete the question from the database
        $delete_query = "DELETE FROM questions WHERE question_id = $qid";

        if ($conn->query($delete_query) === TRUE) {
            echo "Question deleted successfully.";
        } else {
            echo "Error deleting question: " . $conn->error;
        }
    } else {
        echo "No question ID provided.";
    }

    require '../PHP/closeConnection.php';
?>
