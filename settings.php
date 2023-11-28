<?php
    $host = "localhost";
    $user = "id21372732_lilapple";
    $pwd = "Abcde12345@";
    $sql_db = "id21372732_lilappledb";
    
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>