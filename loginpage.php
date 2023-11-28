<?php

include 'settings.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   // Check for customer username login
   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE customerusername = '$username' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['username'] = $row['customerusername'];
      $_SESSION["identity"] = 'Customer';
      $_SESSION["loggedin"] = true;
      header('location:loggedinindex.php');
   } else {
      // If not found, check for staff username login
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE staffusername = '$username' AND password = '$pass'") or die('query failed');

      if(mysqli_num_rows($select) > 0){
         $row = mysqli_fetch_assoc($select);
         $_SESSION['user_id'] = $row['id'];
         $_SESSION['username'] = $row['staffusername'];
         $_SESSION["identity"] = 'Staff';
         $_SESSION["loggedin"] = true;
         header('location:staffindex.php');
      } else {
         $message[] = 'incorrect password or username!';
      }
   }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="loginpagestyles.css">
    <link rel="shortcut icon" type="x-icon" href="imgs/Lilapple.png">
</head>
<body>
    <?php
    if(isset($message)){
       foreach($message as $message){
          echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
       }
    }
    ?>
    
    <div class="form-container">

       <form action="" method="post">
          <h3>login now</h3>
          <input type="username" name="username" required placeholder="enter username" class="box">
          <input type="password" name="password" required placeholder="enter password" class="box">
          <input type="submit" name="submit" class="btn" value="login now">
          <p>don't have an account? <a href="registerpage.php">register now</a></p>
       </form>
    </div>
</body>
</html>
