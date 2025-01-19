<?php
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oraculum Layout</title>
        <link rel="stylesheet" href="../CSS/dashboard.css">
    </head>
    <body>
        <header class="header">
            <div class="logo">
                <h2>ORACULUM</h2>
            </div>
            <div class="profile">
                <a href="" class="profile-name">'. $_SESSION['user_name'] . '</a>
                 <a class="logout"  href="../PHP/logout.php">LogOut</a>
            </div>
            <script>
                function fetchQuestions(searchValue = "") {
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "../PHP/browseQuestions.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            document.getElementById("resultsTable").innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send("search=" + encodeURIComponent(searchValue));
                }

                // Fetch all questions when the page loads
                window.onload = function () {
                    fetchQuestions();
                };
            </script>
        </header>';
?>