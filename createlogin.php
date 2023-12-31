<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="lab10" />
    <meta name="keywords" content="HTML5, PHP" />
    <meta name="author" content="Chang Wai Hoe"  />
    <title> Create Login </title>
</head>
<body>
<?php
    require_once "settings.php";
    $conn = @mysqli_connect ($host, $user, $pwd, $sql_db);
    if ($conn)
    {
        echo "<p>connection successful! </p>";

        $query = "CREATE TABLE loginpage (
            customerusername varchar (40),
            username varchar(40),
            pass varchar(20),
            last_login timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        $result = mysqli_query($conn, $query);

        if ($result)
            echo "<p>create table successful.</p>";
        else 
            echo "<p>create table unsuccessful.</p>";

        mysqli_close ($conn);
    }
    else
        echo "<p>Unable to connect to the db.</p>";
?>
</body>
</html>
