<?php
session_start();
require_once "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if ($conn) {
        // Get the submitted username and password
        $inputUsername = mysqli_real_escape_string($conn, $_POST["uname"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        // Prepare SQL queries to fetch user data based on username and customerusername
        $usernameQuery = "SELECT * FROM loginpage WHERE username = '$inputUsername'";
        $customerUsernameQuery = "SELECT * FROM loginpage WHERE customerusername = '$inputUsername'";

        // Execute the queries
        $usernameResult = mysqli_query($conn, $usernameQuery);
        $customerUsernameResult = mysqli_query($conn, $customerUsernameQuery);

        if ($usernameResult && mysqli_num_rows($usernameResult) == 1) {
            $row = mysqli_fetch_assoc($usernameResult);

            // Verify the submitted password against the stored password
            if ($row["pass"] == $password) {
                // Password is correct, create a session for the user
                $_SESSION["username"] = $row["username"];
                $_SESSION["loggedin"] = true;

                // Redirect to inventory.php
                header("Location: inventory.php");
                exit();
            }
        } elseif ($customerUsernameResult && mysqli_num_rows($customerUsernameResult) == 1) {
            $row = mysqli_fetch_assoc($customerUsernameResult);

            // Verify the submitted password against the stored password
            if ($row["pass"] == $password) {
                // Password is correct, create a session for the user
                $_SESSION["username"] = $row["customerusername"];
                $_SESSION["loggedin"] = true;

                // Redirect to shopping.php
                header("Location: shopping.php");
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
