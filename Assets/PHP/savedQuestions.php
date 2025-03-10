<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);  
require '../PHP/startConnection.php';
session_start();

// Output buffering to avoid header issues
ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        die("<script>alert('User not logged in.'); window.history.back();</script>");
    }

    $userId = (int)$_SESSION['user_id'];
    $questionId = isset($_POST['save_question_id']) ? (int)$_POST['save_question_id'] : 0;

    if ($questionId > 0) {
        // Check if question is already saved
        $checkQuery = "SELECT * FROM saved_questions WHERE user_id = $userId AND question_id = $questionId";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows === 0) {
            // Save the question
            $saveQuery = "INSERT INTO saved_questions (user_id, question_id) VALUES ($userId, $questionId)";
            if ($conn->query($saveQuery)) {
                echo "<script>
                    alert('Question saved successfully!');
                    window.location.href = '../Pages/dashboard.php';
                </script>";
            } else {
                echo "<script>alert('Failed to save the question.');</script>";
            }
        } else {
            echo "<script>alert('Question already saved.');</script>";
        }
    } else {
        echo "<script>alert('Invalid question ID.');</script>";
    }
}


    // Fetch saved questions
    $query = "SELECT q.question_id, q.title, q.body, u.username, q.user_id 
              FROM questions q 
              JOIN users u ON q.user_id = u.uid
              JOIN saved_questions sq ON q.question_id = sq.question_id
              WHERE sq.user_id = " . $_SESSION['user_id'];

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $body = $row['body'];
            $uid = $row['user_id'];
            $uname = $row['username'];
            $qid = $row['question_id'];

            echo "
            <tr>
            <td>" . htmlspecialchars($title) . "</td>
            <td>" . htmlspecialchars(substr($body, 0, 100)) . "...</td> <!-- Truncate body text -->
            <td>" . htmlspecialchars($uname) . "</td>
            <td>
                <div class='actions'>
                    <a class='details-link btn' href='../PHP/answerQuestions.php?title=" . urlencode($title) . "&body=" . urlencode($body) . "&uid=" . urlencode($uid) . "&uname=" . urlencode($uname) . "&qid=" . urlencode($qid) . "'>
                    Read More
                    <span aria-hidden='true'>→</span>
                </a>
                <form method='post' action='../PHP/deleteSavedQuestion.php' style='display:inline;'>
                    <input type='hidden' name='delete_question_id' value='" . htmlspecialchars($qid) . "'>
                    <button class='btn' type='submit' name='delete_question'>Delete</button>
                </form>
                </div>
            </td>
        </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No saved questions found.</td></tr>";
    }

    
    require 'closeConnection.php';
    ob_end_flush();
?>