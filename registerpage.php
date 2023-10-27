<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="loginpagestyles.css">
    <link rel="shortcut icon" type="x-icon" href="imgs/Lilapple.png">
</head>
<body>
    <form action="registration_validation.php" method="post">
        <h2>REGISTER</h2>
        <?php
        // Check if there's an error message from a previous submission
        if (isset($_SESSION['error'])) {
            echo '<p class="error">' . $_SESSION['error'] . '</p>';
            // Remove the error message from the session
            unset($_SESSION['error']);
        }
        ?>
        <label>Customer Username</label>
        <input type="text" name="customer_username" placeholder="Insert Customer Username Here"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Insert Password Here"><br>

        <div class="form-buttons">
            <a href="index.html" class="back-button">Back</a>
            <button type="submit" name="register">Register</button>
        </div>
    </form>
</body>
</html>
