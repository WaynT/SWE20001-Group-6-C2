<?php
session_start();
    require_once "settings.php";
    error_reporting(E_ALL);
ini_set('display_errors', 1);
    $conn = new mysqli($host, $user, $pwd, $sql_db);
    if (!$conn)
        {
            echo "<p>Database connection failure</p>";
        }
        else
        {
            if (isset($_POST['edit']))
            {
                $sql_table = "booking";

                $id = $_POST["id"];
                $name = $_POST["name"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $date = $_POST["date"];
                $time = $_POST["time"];
                $service = $_POST["service"];
                $stylist = $_POST["stylist"];
                $message = $_POST["message"];

                $query = "SELECT * FROM $sql_table";

                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["id"] != $id) {
                        $_SESSION["error"] = "Incorrect appointment ID";
                        header("Location: appointmentmanage.php");
                    }
                    else {
                        $edit_query = "UPDATE booking
                        SET name = '$name', email = '$email', phone = '$phone', date = '$date', time = '$time', service = '$service', stylist = '$stylist', message = '$message'
                        WHERE id = '$id'";

                        if ($conn->query($edit_query) === TRUE) {
                            header("Location: appointmentmanage.php");
                        } else {
                            echo "Error: " . $edit_query . "<br>" . $conn->error;
                        }
                    }
                }
            }

            if (isset($_POST['delete']))
            {
                $sql_table = "booking";

                $id = $_POST["id"];

                $query = "SELECT * FROM $sql_table";

                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["id"] != $id) {
                        $_SESSION["error"] = "Incorrect appointment ID";
                        header("Location: appointmentmanage.php");
                    }
                    else {
                        $add_query = "DELETE FROM booking WHERE id = '$id'";

                        if ($conn->query($add_query) === TRUE) {
                            header("Location: appointmentmanage.php");
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }
            }
        }
?>
