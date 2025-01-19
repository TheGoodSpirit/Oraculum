<?php
require '../PHP/startConnection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $userId = $_SESSION['user_id']; // Assuming user_id is stored in the session after login

    // Fetch all questions if no search term is provided, otherwise filter by search term
    $query = "SELECT q.question_id, q.title, q.body, u.username, q.user_id 
              FROM questions q 
              JOIN users u ON q.user_id = u.uid";
    if (!empty($search)) {
        $query .= " WHERE q.title LIKE '%" . $conn->real_escape_string($search) . "%'";
    }

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
                <td>" . htmlspecialchars(substr($body, 0, 100)) . "...</td>
                <td>" . htmlspecialchars($uname) . "</td>
                <td>
                    <a class='details-link' href='../PHP/answerQuestions.php?title=" . urlencode($title) . "&body=" . urlencode($body) . "&uid=" . urlencode($uid) . "&uname=" . urlencode($uname) . "&qid=" . urlencode($qid) . "'>
                        Read More
                        <span aria-hidden='true'>→</span>
                    </a>
                    <form method='post' action=''>
                        <input type='hidden' name='save_question_id' value='" . $qid . "'>
                        <button type='submit' id='save_btn' name='save_question'>Save</button>
                    </form>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No questions found.</td></tr>";
    }
}

require '../PHP/closeConnection.php';
?>