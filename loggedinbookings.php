<?php
$servername = "localhost";
$username = "id21372732_admin";
$password = "Apple123@";
$database = "id21372732_lilappledb";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $service = $_POST["service"];
    $stylist = $_POST["stylist"];
    $message = $_POST["message"];

    // Insert the data into the database
    $sql = "INSERT INTO bookingpage (name, email, phone, date, time, service, stylist, message) VALUES ('$name', '$email', '$phone', '$date', '$time', '$service', '$stylist', $message')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Close the database connection
$conn->close();
?>