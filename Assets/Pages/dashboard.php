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
    <title>Oraculum Layout</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header class="header">
            <div class="logo">LOGO</div>
            <div class="search-bar">
                <input type="text" placeholder="Search">
            </div>
            <div class="profile-icon">O</div>
        </header>

        <!-- Sidebar Section -->
        <aside class="sidebar">
            <!-- Sidebar content can go here -->
        </aside>

        <!-- Main Content Section -->
        <main class="main-content">
          <h1>Welcome <?php echo $_SESSION['user_name']; ?></h1>
            <!-- Tabs (View Questions, Saved Answers, etc.) -->
            <div class="tabs">
                <button>View Questions</button>
                <button>Saved Answers</button>
                <button>Other Tab</button>
            </div>

            <!-- Content Box -->
            <div class="content-box">
                <!-- Content goes here -->
            </div>
        </main>
    </div>
</body>
</html>
