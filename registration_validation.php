<?php
session_start();
require_once "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if ($conn) {
        // Get the submitted data from the registration form
        $customerUsername = mysqli_real_escape_string($conn, $_POST["customer_username"]);
        $username = isset($_POST["username"]) ? mysqli_real_escape_string($conn, $_POST["username"]) : "NULL";
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        // Check if the provided customer username is unique
        $query = "SELECT * FROM loginpage WHERE customerusername = '$customerUsername'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION["error"] = "Customer username is already taken. Choose a different one.";
            header("Location: registration.php");
            exit();
        }

        // Insert the new user data into the database
        $insertQuery = "INSERT INTO loginpage (customerusername, username, pass) VALUES ('$customerUsername', $username, '$password')";

        if (mysqli_query($conn, $insertQuery)) {
            // Registration successful, redirect to the login page
            $_SESSION["success"] = "Registration successful. You can now log in.";
            header("Location: loginpage.php");
            exit();
        } else {
            $_SESSION["error"] = "Error: Registration failed. Please try again later.";
            header("Location: registration.php");
            exit();
        }
    } else {
        // Unable to connect to the database, show an error message
        $_SESSION["error"] = "Unable to connect to the database";
        header("Location: registration.php");
        exit();
    }
} else {
    // Handle cases where the form wasn't submitted properly
    header("Location: registration.php");
    exit();
}
?>
