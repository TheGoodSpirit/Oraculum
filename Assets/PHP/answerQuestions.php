<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oraculum | Question Details</title>
    <link rel="stylesheet" href="../CSS/answerQuestion.css">
</head>
<body>

    <div class="container">
        <!-- Question Details -->
        <div class="question-details">
            <?php   
            session_start();
                $title = $_GET['title'];
                $body = $_GET['body'];
                $uname = $_GET['uname'];
                $qid = $_GET['qid'];

                echo "<h1>" . $title . "</h1>";
                echo "<p class='question-body'>" . $body . "</p>";
                echo "<p class='posted-by'>Posted by: " . $uname;
            ?>
        </div>

        <hr>

        <!-- Answer Section -->
        <div class="answer-section">
            <h2>Submit Your Answer</h2>
            <form action="submit_answer.php" method="POST">
                <textarea name="body" rows="5" placeholder="Write your answer here..." required></textarea><br>
                <input type="hidden"  name="question_id" value="<?php echo $qid; ?>">
                <input type="hidden"  name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="submit" value="Submit Answer">
            </form>
        </div>

        <!-- Display Existing Answers -->
        <div class="existing-answers">
            <h2>Answers:</h2>
            <?php 
                // display answers
                require './startConnection.php';
               $answer_query = "
                    SELECT a.answer_id, a.body, a.votes, u.username 
                    FROM answers a
                    JOIN users u ON a.user_id = u.uid 
                    WHERE a.question_id = $qid
                    ORDER BY a.votes DESC";
                $answer_result = $conn->query($answer_query);
                if ($answer_result->num_rows > 0) {
                while ($answer = $answer_result->fetch_assoc()) {
                    $answer_id = $answer['answer_id'];
                    $answer_body = $answer['body'];
                    $votes = $answer['votes'];
                    $username = $answer['username'];
                    
                    echo "
                    <div class='answer'>
                        <p>" . $answer_body . "</p>
                        <p class='answered-by'>Answered by: " . $username . "</p>
                        <p class='votes'>Votes: " . $votes . "</p>
                        <button class='vote-btn' onclick='vote($answer_id, 1)'>Upvote</button>
                    </div>";
                }
            } else {
                echo "<p>No answers yet. Be the first to answer!</p>";
            }
            ?>
            
        </div>
    </div>
</body>
<script src="../Scripts/answerCount.js"></script>
</html>
