<?php


    session_start();
    require 'startConnection.php';

    // Delete question if "Delete" button is clicked
    if (isset($_POST['delete_question_id'])) {
        $questionId = (int)$_POST['delete_question_id'];
        $userId = $_SESSION['user_id'];

        // Check if the question belongs to the user
        $checkQuery = "SELECT * FROM saved_questions WHERE user_id = $userId AND question_id = $questionId";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            $deleteQuery = "DELETE FROM saved_questions WHERE question_id = $questionId";
            if ($conn->query($deleteQuery)) {
                echo "<script>alert('Question deleted successfully!');</script>";
            } else {
                echo "Error deleting question: " . $conn->error;
            }
        } else {
            echo "<script>alert('You do not have permission to delete this question.');</script>";
        }
    }

    header('Location: ../Pages/dashboard.php');

    require 'closeConnection.php';
?>