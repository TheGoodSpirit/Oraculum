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
                $qid = $row['question_id'];
                
                    echo "
                    
                        <tr>
                            <td>" . $title . "</td>
                            <td>" . substr($body, 0, 100) . "...</td>
                            <td>" . $uname . "</td>
                            <td>
                               <div class='actions'>
                                     <a class='details-link btn' href='../PHP/answerQuestions.php?title=$title&body=$body&uid=$uid&uname=$uname&qid=$qid'>
                                    Read More
                                    <span aria-hidden='true'>→</span>
                                </a>
                                <a class='action btn' href='../PHP/deleteQuestion.php?question_id=$qid'>
                                    Delete
                                </a>
                                <!-- <a class='action btn' href='../PHP/editQuestion.php?question_id=$qid&title=$title&body=$body'>
                                    Edit -->
                                </a>
                               </div>
                            </td>
                        </tr>";
            } 
        }
    } 

    if($count == 0) {
        echo "No questions publishd yet.";
    }


    require '../PHP/closeConnection.php';
?>