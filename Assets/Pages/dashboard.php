<?php
session_start();  // Start a session

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    header('Location: ../PHP/login.php');  // Redirect to login page if not logged in
 exit();
}
?>
<?php require './header.php'; ?>

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
                <div class="browseQuestions">
                    <h1>Browse Questions</h1>
                    <?php require '../PHP/browseQuestions.php';?>
                </div>
                <div class="myQuestions">
                    <h1>My Questions</h1>
                    <?php require '../PHP/myQuestions.php'; ?>
                </div>  
            </div>
        </main>
    </div>
</body>
</html>
