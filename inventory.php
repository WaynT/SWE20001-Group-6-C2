<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Managing Software Projects" />
	<meta name="keywords" content="HTML5, PHP" />
	<meta name="author" content="Group 6"  />
	<title>Inventory</title>
    <link href= "inventoryCSS.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <section class = "inventoryMain">
    <nav>
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="shopping.php">Products</a></li>
            <li><a href ="loginpage.php">Login</a></li>
        </ul>
    </nav>
        <h1>Inventory</h1>
        <?php
        require_once "settings.php";
        $conn = @mysqli_connect ($host, $user, $pwd, $sql_db);
        if (!$conn)
        {
            echo "<p>Database connection failure</p>";
        }
        else
        {
            $sql_table = "inventorypage";

            $query = "SELECT * FROM $sql_table";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "<p>Something is wrong with ", $query, "</p>";
            } else {
                echo "<table border = \"1\">\n";
                echo "<tr id='thead'>\n "
                    ."<th scope=\"col\">Inventory ID</th>\n "
                    ."<th scope=\"col\">Name</th>\n "
                    ."<th scope=\"col\">Quantity</th>\n "
                    ."<th scope=\"col\">Price</th>\n "
                    ."<th scope=\"col\">Supplier</th>\n "
                    ."</tr>\n";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr id='tbody'>\n";
                    echo "<td>" ,$row["itemID"],"</td>\n";
                    echo "<td>" ,$row["name"],"</td>\n";
                    echo "<td>" ,$row["quantity"],"</td>\n";
                    echo "<td>" ,$row["price"],"</td>\n";
                    echo "<td>" ,$row["supplier"],"</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
                mysqli_free_result($result);
                }
            mysqli_close($conn);
        }
        ?>
        </section>
    </section>
</body>
