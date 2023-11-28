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
                        <a class="nav-brand" href="loggedinindex.php"><img width="100" src="./img/core-img/logo.png" alt=""></a>

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
                                    <li ><a href="./loggedinindex.php">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./loggedinindex.php">- Home</a></li>
                                            <li><a href="./loggedinabout.php">- About Us</a></li>
                                            <li><a href="./loggedinshopping.php">- Shopping</a></li>
                                            <li><a href="./loggedinservices.php">- Services</a></li>
                                            <li><a href="./loggedincontact.php">- Contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./loggedinshopping.php">Shopping</a></li>
                                    <li><a href="./loggedinabout.php">About Us</a></li>
                                    <li class="active"><a href="./loggedinservices.php">Services</a></li>
                                    <li><a href="./loggedincontact.php">Contact</a></li>
                                </ul>

                                <!-- Cart Icon -->
                                <div class="cart-icon ml-5 mt-4 mt-lg-0">
                                    <a href="cart.php"><i class="icon_cart"></i></a>
                                </div>

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
                                    <a href='index.php' class='btn akame-btn'>Logout</a>
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
                        <h2>Book an Appointment</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- News Area Start -->
    <section class="akame-news-area section-padding-0-80">
        <div class="container">
            <h2> Your Hair, Your Canvas. </h2>
            <form action="bookings.php" method="post">
            <div class="form-container">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-container">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-container">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            
            <div class="form-container">
                <label for="date">Preferred Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            
            <div class="form-container">
                <label for="time">Preferred Time:</label>
                <input type="time" id="time" name="time" required>
            </div>
            
            <div class="form-container">
                <label for="service">Select Service:</label>
                <select id="service" name="service">
                    <option disabled selected value=""> Please Select </option>
                    <option value="haircut">Haircut</option>
                    <option value="coloring">Hair Coloring</option>
                    <option value="styling">Hair Styling</option>
                    <option value="highlights">Highlights</option>
                    <option value="perming">Perming</option>
                    <option value="rebonding">Rebonding</option>
                </select>
            </div>

            <div class="form-container">
                <label for="stylist">Select Hairstylist:</label>
                <select id="stylist" name="stylist">
                    <option disabled selected value=""> Please Select </option>
                    <option value="zk">Zhang Kan</option>
                    <option value="j">Jasper</option>
                    <option value="wayne">Wayne</option>
                    <option value="wh">Wai Hoe</option>
                </select>
            </div>
            
            <div class="form-container">
                <label for="message">Remarks:</label>
                <textarea id="message" name="message" rows="4"></textarea>
            </div>
                <br>
                <br>
            <div class="button-container">
                <input type="submit" value="Submit"> 
                <input type="reset" value="Reset"> 
            </div>
            
            </form>
            <div class="back-to">
            <form action="loggedinservices.php" method="post">
            <input type="submit" value="Back to Services"> 
            </form>
            </div>
            </div>

            
            
            </div>
        </section>
        <!-- News Area End -->

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