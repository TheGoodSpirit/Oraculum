<?php
session_start();  // Start a session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oraculum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Store user data in session
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_name'] = $row['name'];  // Assuming you have a 'name' column

            // Redirect to user dashboard
            header('Location: ../Pages/dashboard.php');
            exit();  // Prevent further execution after redirection
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();
?>
