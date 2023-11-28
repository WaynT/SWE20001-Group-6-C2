<?php
session_start();
    require_once "settings.php";
    $conn = new mysqli($host, $user, $pwd, $sql_db);
    if (!$conn)
        {
            echo "<p>Database connection failure</p>";
        }
        else
        {
            if (isset($_POST['edit']))
            {
                $sql_table = "inventory";

                $inventoryID = $_POST["id"];
                $name = $_POST["name"];
                $quantity = $_POST["quantity"];
                $price = $_POST["price"];
                $supplier = $_POST["supplier"];

                $query = "SELECT * FROM $sql_table";

                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["itemID"] != $inventoryID) {
                        $_SESSION["error"] = "Incorrect inventory ID";
                        header("Location: inventory.php");
                    }
                    else {
                        $edit_query = "UPDATE inventory
                        SET name = '$name', quantity = '$quantity', price = $price, supplier = '$supplier'
                        WHERE itemID = '$inventoryID'";

                        if ($conn->query($edit_query) === TRUE) {
                            header("Location: inventory.php");
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }
            }
            if (isset($_POST['delete']))
            {
                $sql_table = "inventory";

                $inventoryID = $_POST["id"];

                $query = "SELECT * FROM $sql_table";

                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["itemID"] != $inventoryID) {
                        $_SESSION["error"] = "Incorrect inventory ID";
                        header("Location: inventory.php");
                    }
                    else {
                        $add_query = "DELETE FROM inventory WHERE itemID = '$inventoryID'";

                        if ($conn->query($add_query) === TRUE) {
                            header("Location: inventory.php");
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }
            }
            if (isset($_POST['add']))
            {
                $sql_table = "inventory";

                $inventoryID = $_POST["id"];
                $name = $_POST["name"];
                $quantity = $_POST["quantity"];
                $price = $_POST["price"];
                $supplier = $_POST["supplier"];

                $query = "SELECT * FROM $sql_table";

                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["itemID"] == $inventoryID) {
                        $_SESSION["error"] = "Duplicate inventory ID";
                        header("Location: inventory.php");
                    }
                    else {
                        $add_query = "INSERT INTO inventory (itemID, name, quantity, price, supplier)
                        VALUES ('$inventoryID', '$name', '$quantity', '$price', '$supplier')";

                        if ($conn->query($add_query) === TRUE) {
                            header("Location: inventory.php");
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }
            }
        }
?>
