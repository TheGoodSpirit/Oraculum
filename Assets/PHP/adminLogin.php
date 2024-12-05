<?php

    echo '
        <form action="../Pages/adminDashboard.php" method="POST">
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit">Login In</button>
        </form>
    ';

     $adminLogin = "SELECT * FROM admins WHERE email = '$email'";
?>