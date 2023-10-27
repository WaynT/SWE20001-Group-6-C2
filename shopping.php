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
<?php
session_start();
?>
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
                                    <li><a href="./index.html">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./index.html">- Home</a></li>
                                            <li><a href="./about.html">- About Us</a></li>
                                            <li><a href="./shopping.php">- Shopping</a></li>
                                            <li><a href="./inventory.php">- Inventory</a></li>
                                            <li><a href="./services.html">- Services</a></li>
                                            <li><a href="./contact.html">- Contact</a></li>
                                        </ul>
                                    </li>
                                    <li  class="active"><a href="./shopping.php">Shopping</a></li>
                                    <li><a href="./inventory.php">Inventory</a></li>
                                    <li><a href="./about.html">About Us</a></li>
                                    <li><a href="./services.html">Services</a></li>
                                    <li><a href="./contact.html">Contact</a></li>
                                </ul>

                                <!-- Cart Icon -->
                                <div class="cart-icon ml-5 mt-4 mt-lg-0">
                                    <a href="shoppingCart.html"><i class="icon_cart"></i></a>
                                </div>

                               <!-- Book Icon -->
                                <div class="book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                    <a href="loginpage.php" class="btn akame-btn">Login</a>
                                </div>
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
                        <h2>Shopping</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shopping</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Portfolio Area Start -->

    <section class="akame-portfolio section-padding-0-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio-menu text-center mb-50">
                        <button class="btn active" data-filter="*">All</button>
                        <button class="btn" data-filter=".shampoo">Shampoo</button>
                        <button class="btn" data-filter=".conditioner">Conditioner</button>
                        <button class="btn" data-filter=".hairserum">Hair Serum</button>
                        <button class="btn" data-filter=".hairmask">Hair Mask</button>
                        <button class="btn" data-filter=".hairdye">Hair Dye</button>
                        <button class="btn" data-filter=".haircurler">Hair Curler</button>
                    </div>
                </div>
            </div>
            <form method="post" action = "shoppingCart.php?action=add&id=<?php echo $row["productName"]; ?>">
            <div class="row akame-portfolio-area">
            <?php

            require_once "settings.php";
            $conn = new mysqli($host, $user, $pwd, $sql_db);
            if ($conn -> connect_error){
                die("Connection failed: ".$conn->connect_error);
            }
            else
            {
                $query = "SELECT * FROM products ORDER BY productID ASC";
                $result = $conn->query($query);
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_array())
                    {
                        echo "<!-- Single Shopping Item -->
                        <div class='col-12 col-sm-6 col-lg-4 akame-portfolio-item "; echo $row["productCategory"]; echo " mb-30 wow fadeInUp' data-wow-delay='200ms'>
                            <div class='akame-portfolio-single-item'>
                                <img src='"; echo $row["productImage"]; echo "' alt=''>

                                <!-- Overlay Content -->
                                <div class='overlay-content d-flex align-items-center justify-content-center'>
                                    <div class='overlay-text text-center'>
                                    <h4>"; echo $row["productName"]; echo "</h4>
                                    <p>"; echo $row["productDescription"]; echo "
                                    <br>
                                    <b>RM"; echo $row["productPrice"]; echo "</b></p>
                                </div>
                            </div>
                    </div>
                    <input type='submit' class='checkout-button' name='"; echo $row["productName"]; echo"' value='Add to Cart'>
                </div>";
                    }
                }
            }
            ?>
            </div>
            </form>

            <div class="row">
                <div class="col-12">
                    <div class="view-all-btn mt-30 text-center">
                        <a href="shopping.php" class="btn akame-btn">View All Products</a>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- Portfolio Area End -->

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
                        <a href="#" class="footer-logo"><img width="100" src="img/core-img/logo.png" alt=""></a>

                        <p class="mb-30">We would love to serve you and let you enjoy your culinary experience. Excepteur sint occaecat cupidatat non proident.</p>

                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
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
                            <p>Tel: (+12) 345 678 910</p>
                            <p>E-mail: Hello.colorlib@gmail.com</p>
                            <p>Address: Iris Watson, P.O. Box 283 8562 Fusce Rd, NY</p>
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
