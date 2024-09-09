<?php
session_start();  // Start a session

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    header('Location: ../PHP/login.php');  // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oraculum Dashboard</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
</head>
<body>

    <div class="sidebar">
        <h2>Oraculum</h2>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Ask Question</a></li>
            <li><a href="#">My Questions</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="../PHP/logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h2>Welcome, <?php echo $_SESSION['user_name']; ?>, to the Oraculum Dashboard</h2>
            <p>Get answers, engage with the community, and grow your knowledge.</p>
        </header>

        <section class="stats">
            <div class="card">
                <h3>Total Questions</h3>
                <p>25</p>
            </div>
            <div class="card">
                <h3>Answered Questions</h3>
                <p>15</p>
            </div>
            <div class="card">
                <h3>Pending Questions</h3>
                <p>10</p>
            </div>
        </section>

        <section class="activity">
            <h3>Recent Activity</h3>
            <ul>
                <li>New answer posted by JohnDoe on "How to integrate APIs in PHP?"</li>
                <li>Your question "How to create a login system?" was answered.</li>
                <li>You received a new message from Moderator.</li>
            </ul>
        </section>
    </div>
</body>
</html>