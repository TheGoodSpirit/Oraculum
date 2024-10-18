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
                <button class="active" id="bq_btn">Browse Questions</button>
                <button id="pq_btn">Post Questions</button>
                <button id="sq_btn">Saved Questions</button>
                <button id="mq_btn">My Questions</button>
            </div>

            <!-- Content Box -->
            <div class="content-box">
                <div class="postQuestions" id="postQuestions">
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
                <div class="browseQuestions" id="browseQuestions">
                    <div class="ques">
                        <?php require '../PHP/browseQuestions.php';?>
                    </div>
                </div>
                <div class="myQuestions" id="myQuestions">
                    <?php require '../PHP/myQuestions.php'; ?>
                </div>  
            </div>
        </main>
    </div>
</body>
<script src="../Scripts/dashboardScript.js"></script>
</html>
