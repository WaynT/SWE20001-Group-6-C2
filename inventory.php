<?php

include 'settings.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Lil Apple Hair Salon</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/Lilapple.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    </head>

    <body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Top Header Area Start -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-5">
                        <div class="top-header-content">
                            <p>Welcome to hair salon!</p>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="top-header-content text-right">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> Mon-Sat: 8.00 to 17.00 <span class="mx-2"></span> | <span class="mx-2"></span> <i class="fa fa-phone" aria-hidden="true"></i> Call us: (+12)-345-6789</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="akameNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.html"><img width="100" src="./img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="./staffindex.php">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./staffindex.php">- Home</a></li>
                                            <li><a href="./inventory.php">- Inventory</a></li>
                                            <li><a href="./appointmentmanage.php">- Appointment</a></li>
                                        </ul>
                                    </li>
                                    <li class="active"><a href="./inventory.php">Inventory</a></li>
                                    <li><a href="./appointmentmanage.php">Appointment</a></li>
                                </ul>

                                <?php
                                if ($_SESSION["loggedin"] == true)
                                {
                                    echo "<!-- Logout Icon -->
                                    <div class='book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4'>
                                    <form action='logoutverification.php' method='post'>
                                    <button type='submit' name='login' class='btn akame-btn'>Log Out</button>
                                    </form>
                                    </div>
                                    <div class='login_creds'>
                                    <p>"; echo $_SESSION["identity"]; echo " logged in.</p>
                                    <p>Username: "; echo $_SESSION["username"]; echo"</p></div>";
                                }
                                else
                                {
                                    echo " <!-- Login Icon -->
                                    <div class='book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4'>
                                    <a href='loginpage.php' class='btn akame-btn'>Login</a>
                                    </div>";
                                }
                                ?>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Inventory</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

     <!-- Inventory -->
     <section class="akame-portfolio section-padding-0-80 clearfix">
     <div class="manage-inventory">
            <form action="inventory.php" method="post">
                <input type="submit" value="Edit" name = "edit">
                <input type="submit" value="Add" name = "add">
                <input type="submit" value="Delete" name = "delete">
            </form>
    </div>

     <?php
        require_once "settings.php";
        $conn = new mysqli($host, $user, $pwd, $sql_db);
        if (!$conn)
        {
            echo "<p>Database connection failure</p>";
        }
        else
        {
            $sql_table = "inventory";

            $query = "SELECT * FROM $sql_table";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "<p>Something is wrong with ", $query, "</p>";
            } else {
                echo "<table class='appointment-table'>\n";
                echo "<tr id='thead'>\n "
                    ."<th scope=\"col\">Inventory ID</th>\n "
                    ."<th scope=\"col\">Name</th>\n "
                    ."<th scope=\"col\">Quantity</th>\n "
                    ."<th scope=\"col\">Price</th>\n "
                    ."<th scope=\"col\">Supplier</th>\n "
                    ."</tr>\n";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n";
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


        <?php
            if (isset($_POST['edit'])) {
                echo "<div class='container'>
                <br>
                <br>
                <h2> Edit the inventory </h2>
                <form action='inventorymanagement.php' method='post'>
                <div class='form-container'>
                    <label for='name'>Inventory ID:</label>
                    <input type='text' id='id' name='id' required>
                </div>

                <div class='form-container'>
                    <label for='email'>Name:</label>
                    <input type='text' id='name' name='name' required>
                </div>

                <div class='form-container'>
                    <label for='phone'>Quantity:</label>
                    <input type='text' id='quantity' name='quantity' required>
                </div>

                <div class='form-container'>
                    <label for='phone'>Price:</label>
                    <input type='text' id='price' name='price' required>
                </div>

                <div class='form-container'>
                    <label for='phone'>Supplier:</label>
                    <input type='text' id='supplier' name='supplier' required>
                </div>

                <div class='manage-inventory'>
                        <input type='submit' method = 'post' value='Submit' name = 'edit'>
                </div>
                </form>";
            }
            if (isset($_POST['delete'])) {
                echo "<div class='container'>
                <br>
                <br>
                <h2> Edit the inventory </h2>
                <form action='inventorymanagement.php' method='post'>
                <div class='form-container'>
                    <label for='name'>Inventory ID:</label>
                    <input type='text' id='id' name='id' required>
                </div>

                <div class='manage-inventory'>
                        <input type='submit' method = 'post' value='Submit' name = 'delete'>
                </div>
                </form>";
            }
            if (isset($_POST['add'])) {
                echo "<div class='container'>
                <br>
                <br>
                <h2> Edit the inventory </h2>
                <form action='inventorymanagement.php' method='post'>
                <div class='form-container'>
                    <label for='name'>Inventory ID:</label>
                    <input type='text' id='id' name='id' required>
                </div>

                <div class='form-container'>
                    <label for='email'>Name:</label>
                    <input type='text' id='name' name='name' required>
                </div>

                <div class='form-container'>
                    <label for='phone'>Quantity:</label>
                    <input type='text' id='quantity' name='quantity' required>
                </div>

                <div class='form-container'>
                    <label for='phone'>Price:</label>
                    <input type='text' id='price' name='price' required>
                </div>

                <div class='form-container'>
                    <label for='phone'>Supplier:</label>
                    <input type='text' id='supplier' name='supplier' required>
                </div>

                <div class='manage-inventory'>
                        <input type='submit' method = 'post' value='Submit' name = 'add'>
                </div>
                </form>";
            }
        ?>

        </section>
    <!-- Inventory Area End -->


     <!-- Border -->
    <div class="container">
        <div class="border-top"></div>
    </div>

        <!-- Footer Area Start -->
        <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single-footer-widget mb-80">
                        <!-- Footer Logo -->
                        <a href="#" class="footer-logo"><img src="img/core-img/logo.png" alt=""></a>

                        <p class="mb-30">We would love to serve you and let you enjoy your hairstyling journey.</p>

                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Opening times</h4>

                        <!-- Open Times -->
                        <div class="open-time">
                            <p>Monday: Friday: 10.00 - 23.00</p>
                            <p>Saturday: 10.00 - 19.00</p>
                        </div>

                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-md-4 col-xl-3">
                    <div class="single-footer-widget mb-80">

                        <!-- Widget Title -->
                        <h4 class="widget-title">Contact Us</h4>

                        <!-- Contact Address -->
                        <div class="contact-address">
                            <p>Tel: (+60) 12-345-6789</p>
                            <p>E-mail: xiaopingguo@gmail.com</p>
                            <p>Address: 3, Jalan SS 15/8, Ss 15, 47500 Subang Jaya, Selangor</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- All JS Files -->
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/akame.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>

