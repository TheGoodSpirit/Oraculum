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
            <div class="profile-icon">
                <?php echo $_SESSION['user_name']; ?>
            </div>
        </header>

        <!-- Sidebar Section -->
        <aside class="sidebar">
            <a href="../PHP/logout.php">LogOut</a>
        </aside>

        <!-- Main Content Section -->
        <main class="main-content">
            <div class="tabs">
                <button>Post Questions</button>
                <button>Browse Questions</button>
                <button>Saved Questions</button>
                <button>My Questions</button>
            </div>

            <!-- Content Box -->
            <div class="content-box">
                <div class="postQuestions">
                    <h1>Post Questions</h1>
                    <form action="../PHP/postQuestions.php" method="POST">
                        <p>
                            <input type="text" name="title" placeholder="title">
                        </p>
                        <p>
                            <textarea name="body" id="body" placeholder="body"></textarea>
                        </p>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <hr>
                <div class="browseQuestions">
                    <h1>Browse Questions</h1>
                    <?php require '../PHP/browseQuestions.php';?>
                </div>  
            </div>
        </main>
    </div>
</body>
</html>
