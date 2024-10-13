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
            <div class="logo">
                <h1>ORACULUM</h1>
            </div>
            <nav>
                <a href="" class="links">Dashboard</a>
                <a href="" class="links">Contact</a>
                <a href="" class="links">Help</a>
            </nav>
            <div class="search-bar">
                <input type="text" placeholder="Search">
            </div>
            <div class="profile-icon"></div>
        </header>

        <!-- Sidebar Section -->
        <aside class="sidebar">
            <a href="../PHP/logout.php">LogOut</a>
        </aside>

        <!-- Main Content Section -->
        <main class="main-content">
            <h1>Main Content</h1>
            <?php echo $_SESSION['user_name']; ?></h1>
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
