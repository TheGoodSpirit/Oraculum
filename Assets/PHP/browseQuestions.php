<?php

    require '../PHP/startConnection.php';

    $query = "SELECT q.question_id, q.title, q.body, u.username FROM questions q JOIN users u ON q.user_id = u.uid";

    // Execute the query
    $result = $conn->query($query);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Loop through and display the questions
        while ($row = $result->fetch_assoc()) {
            echo "<div class='question'>";
            echo "<ul> <li>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['body'] . "</p>";
            echo "<p>Asked by: " . $row['username'] . "</p>";
            echo "</li></u/>";
            echo "</div>";
            echo "<hr>";
        }
    } else {
        echo "No questions found.";
    }


    require '../PHP/closeConnection.php';
?>