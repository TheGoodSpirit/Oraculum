<?php
    session_start();
    require 'startConnection.php';
    
    if (isset($_POST['answer_id']) && isset($_POST['vote']) && isset($_SESSION['user_id'])) {
        $answer_id = $_POST['answer_id'];
        $vote = intval($_POST['vote']);
        $user_id = $_SESSION['user_id'];
        
        $checkVoteQuery = "SELECT * FROM answer_votes WHERE answer_id = $answer_id AND user_id = $user_id";
        $voteResult = $conn->query($checkVoteQuery);
        
        if ($voteResult->num_rows > 0) {
            echo "You have already voted on this answer.";
        } else {
            $insertVoteQuery = "INSERT INTO answer_votes (answer_id, user_id, vote) VALUES ($answer_id, $user_id, $vote)";
            if ($conn->query($insertVoteQuery)) {
                $updateVotesQuery = "UPDATE answers SET votes = votes + $vote WHERE answer_id = $answer_id";
                if ($conn->query($updateVotesQuery)) {
                    echo "Vote added successfully.";
                } else {
                    echo "Error updating total votes: " . $conn->error;
                }
            } else {
                echo "Error registering your vote: " . $conn->error;
            }
        }
    } else {
        echo "Error: Invalid vote request.";
    }
    
    require 'closeConnection.php';
?>