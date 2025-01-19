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
        <section>
            <div class="msg">
                <h1>Welcome to Oraculum</h1>
                <p> Your Gateway to Knowledge and Insight. Explore, Learn, and Stay Informed!</p>
            </div>
        </section>
    

        <!-- Content Box -->
        <div class="content-box">
            <div class="tabs">
                <button class="btn active" id="bq_btn">Browse Questions</button>
                <button id="pq_btn" class="btn">Post Questions</button>
                <button id="sq_btn" class="btn">Saved Questions</button>
                <button id="mq_btn" class="btn">My Questions</button>
            </div>
            <center>
                <div class="postQuestions" id="postQuestions">
                    <form action="../PHP/postQuestions.php" method="POST">
                        <input type="text" name="title" placeholder="Enter your question title" class="input-title" required />
                        <textarea name="body" placeholder="Describe your question in detail..." class="input-body" required></textarea>
                        <input type="submit" value="Submit" class="submit-btn" />
                    </form>
                </div>
                <div class="browseQuestions" id="browseQuestions">
                    <div class="searchBox">
                         <form onsubmit="event.preventDefault(); fetchQuestions(document.getElementById('searchInput').value);">
                            <input type="text" id="searchInput" placeholder="Search..." onkeyup="fetchQuestions(this.value)" />
                        </form>
                    </div>
                    <table class="question-table" border="1" cellspacing="5">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Asked by</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="resultsTable"></tbody>
                    </table>
                </div>
                <div class="myQuestions" id="myQuestions">
                     <table class="question-table" border="1" cellspacing="5">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Asked by</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php require '../PHP/myQuestions.php'; ?>
                        </tbody>
                    </table>
                </div>  
                <div class="savedQuestions" id="savedQuestions">
                    <table class="question-table" border="1" cellspacing="5">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Asked by</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php require '../PHP/savedQuestions.php'; ?>
                        </tbody>
                    </table>
                </div>
            </center>
        </div>
    </main>
</body>
<script src="../Scripts/dashboardScript.js"></script>
</html>