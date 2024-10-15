<?php

    require '../PHP/startConnection.php';

    $count = 0;
    $query = "SELECT q.user_id, q.question_id, q.title, q.body, u.username FROM questions q JOIN users u ON q.user_id = u.uid";

    // Execute the query
    $result = $conn->query($query);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Loop through and display the questions
        while ($row = $result->fetch_assoc()) {
            if($row['user_id'] === $_SESSION['user_id']) {
                    $count += 1;
                    echo "<div class='question'>";
                    echo "<ul> <li>";
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<p>" . $row['body'] . "</p>";
                    echo "<p>Asked by: " . $row['username'] . "</p>";
                    echo "</li></u/>";
                    echo "</div>";  
            } 
        }
    } 

    if($count == 0) {
        echo "No questions publishd yet.";
    }


    require '../PHP/closeConnection.php';
?>