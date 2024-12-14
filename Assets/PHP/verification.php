<?php
    require 'startConnection.php';
    error_reporting(E_ERROR | E_PARSE);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userCode = $_POST['verification_code'];

        // Check if the verification code exists and is not already verified
        $query = "SELECT * FROM users WHERE verification_code = '$userCode' AND is_active = 0";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) === 1) {
            // Update verification status
            $update_query = "UPDATE users SET is_active = 1 WHERE verification_code = '$userCode'";
            if (mysqli_query($conn, $update_query)) {
                echo "Your account has been verified! You can now log in.";
            } else {
                echo "Error updating verification status: " . mysqli_error($conn);
            }
        } else {
            echo "Invalid verification code or account already verified.";
        }
    }
    require 'closeConnection.php';
?>

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <label for="verification_code">Enter Verification Code:</label>
    <input type="text" name="verification_code" id="verification_code" required>
    <button type="submit">Verify</button>
</form>
