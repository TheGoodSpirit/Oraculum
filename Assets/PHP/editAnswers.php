<?php
    session_start();
    require './startConnection.php';
   

    if (!isset($_SESSION['user_id'])) {
        die("Access denied. Please log in to continue.");
    }

    $answer_id = intval($_GET['answer_id']);

    // Fetch the answer details
    $query = "SELECT body, user_id FROM answers WHERE answer_id = $answer_id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $answer = $result->fetch_assoc();
        $existing_body = htmlspecialchars($answer['body']);
        $answer_user_id = $answer['user_id'];

        // Check if the logged-in user is the owner of the answer
        if ($_SESSION['user_id'] != $answer_user_id) {
            die("You are not authorized to edit this answer.");
        }
    } else {
        die("Answer not found.");
    }

    // Update the answer
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $updated_body = $conn->real_escape_string($_POST['body']);
        $update_query = "UPDATE answers SET body = '$updated_body' WHERE answer_id = $answer_id";

        if ($conn->query($update_query)) {
            header('Location: ../Pages/dashboard.php'); // Redirect back to the question page
            exit();
        } else {
            echo "Error updating answer: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Answer</title>
</head>
<body>
    <div class="container">
        <h1>Edit Your Answer</h1>
        <form action="editAnswers.php?answer_id=<?php echo $answer_id; ?>" method="POST">
            <textarea name="body" rows="5" required><?php echo $existing_body; ?></textarea><br>
            <!-- <input type="hidden" name="question_id" value="<?php echo $_GET['qid']; ?>"> -->
            <input type="submit" value="Update Answer">
        </form>
    </div>
</body>
</html>
