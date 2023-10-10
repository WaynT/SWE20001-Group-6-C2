<?php
session_start();
require_once "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if ($conn) {
        // Get the submitted username and password
        $username = mysqli_real_escape_string($conn, $_POST["uname"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        // Prepare a SQL query to fetch user data based on the username
        $query = "SELECT * FROM loginpage WHERE username = '$username'";

        // Execute the query
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Verify the submitted password against the stored password
            if ($row["pass"] == $password) {
                // Password is correct, create a session for the user
                $_SESSION["username"] = $row["username"];
                $_SESSION["loggedin"] = true;

                // Redirect to index.php
                header("Location: inventory.php");
                exit();
            }
        }

        // If we reach here, the login was unsuccessful
        // Set an error message and redirect back to loginpage.php
        $_SESSION["error"] = "Incorrect username or password";
        header("Location: loginpage.php");
        exit();
    } else {
        // Unable to connect to the database, show an error message
        $_SESSION["error"] = "Unable to connect to the database";
        header("Location: loginpage.php");
        exit();
    }
} else {
    // Handle cases where the form wasn't submitted properly
    header("Location: loginpage.php");
    exit();
}
?>
