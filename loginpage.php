<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="loginpagestyles.css">
    <link rel="shortcut icon" type="x-icon" href="imgs/Lilapple.png">
</head>
<body>
    <form action="loginvalidation.php" method="post">
        <h2>LOGIN</h2>
        <?php
        // Check if there's an error message from a previous submission
        if (isset($_SESSION['error'])) {
            echo '<p class="error">' . $_SESSION['error'] . '</p>';
            // Remove the error message from the session
            unset($_SESSION['error']);
        }
        ?>
        <label>Username</label>
        <input type="text" name="uname" placeholder="Insert Username Here"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Insert Password Here"><br>

        <div class="form-buttons">
            <a href="index.php" class="back-button">Back</a>
            <button type="submit" name="login">Login</button>
            <a href="signup.php" class="sign-up-button">Sign Up</a>
        </div>
    </form>
</body>
</html>
