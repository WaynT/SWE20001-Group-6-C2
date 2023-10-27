<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="lab10" />
    <meta name="keywords" content="HTML5, PHP" />
    <meta name="author" content="Chang Wai Hoe"  />
    <title> Register Table </title>
</head>
<body>
<?php
    require_once "settings.php";
    $conn = @mysqli_connect ($host, $user, $pwd, $sql_db);
    if ($conn)
    {
        echo "<p>connection successful! </p>";

        $query = "CREATE TABLE customerlogin (
            username varchar(40),
            pass varchar(20),
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
