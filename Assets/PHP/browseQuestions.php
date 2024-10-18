<?php
    require '../PHP/startConnection.php';
    $query = "SELECT q.question_id, q.title, q.body, u.username FROM questions q JOIN users u ON q.user_id = u.uid";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $body = $row['body'];
            echo "
            <div class='question'>
                <div class='image'></div>
                <div class='content'>
                    <h3 class='title'>" . $title . "</h3>
                    <p class='desc'>" . $body . "</p>
                    <p class='desc'>Asked by: " . $row['username'] . "</p>
                    <a class='action' href='../PHP/answerQuestions.php?title=$title&body=$body'>
                        Find out more
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