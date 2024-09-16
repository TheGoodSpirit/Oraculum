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
  <title></title>
</head>
<body>
</body>
</html>