<?php
    require '../PHP/startConnection.php';
    $query = "SELECT q.question_id, q.title, q.body, u.username, q.user_id FROM questions q JOIN users u ON q.user_id = u.uid";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $body = $row['body'];
            $uid = $row['user_id'];
            $uname = $row['username'];
            $qid = $row['question_id'];
            
           echo "
            <div class='question-card'>
                <div class='card-content'>
                    <h3 class='title'>" . $title . "</h3>
                    <p class='body'>" . substr($body, 0, 100) . "...</p> <!-- Truncate body text -->
                    <p class='desc'>Asked by: " . $uname . "</p>
                    <a class='details-link' href='../PHP/answerQuestions.php?title=$title&body=$body&uid=$uid&uname=$uname&qid=$qid'>
                        Read More
                        <span aria-hidden='true'>→</span>
                    </a>
                    <a class='details-link' href='../PHP/savedQuestions.php?title=$title&body=$body&uid=$uid&uname=$uname&qid=$qid'>
                        save
                        <span aria-hidden='true'>→</span>
                    </a>
                </div>
            </div>";

        }
    } else {
        echo "No questions found.";
    }
    require '../PHP/closeConnection.php';
?>