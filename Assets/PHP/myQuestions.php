<?php

    require '../PHP/startConnection.php';

    $count = 0;
    $query = "SELECT q.question_id, q.title, q.body, u.username, q.user_id FROM questions q JOIN users u ON q.user_id = u.uid";

    // Execute the query
    $result = $conn->query($query);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Loop through and display the questions
        while ($row = $result->fetch_assoc()) {
            if($row['user_id'] === $_SESSION['user_id']) {
                $count += 1;
                $title = $row['title'];
                $body = $row['body'];
                $uid = $row['user_id'];
                $uname = $row['username'];
                 echo "
                    <div class='question'>
                        <div class='content'>
                            <h3 class='title'>" . $title . "</h3>
                            <p class='desc'>" . $body . "</p>
                            <p class='desc'>Asked by: " . $row['username'] . "</p>
                            <a class='action' href='../PHP/answerQuestions.php?title=$title&body=$body&uid=$uid&uname=$uname&qid=$qid'>
                                Details
                                <span aria-hidden='true'>→</span>
                            </a>
                        </div>
                    </div>";
            } 
        }
    } 

    if($count == 0) {
        echo "No questions publishd yet.";
    }


    require '../PHP/closeConnection.php';
?>