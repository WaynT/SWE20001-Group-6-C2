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
                                    <li class="active"><a href="./index.php">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./index.php">- Home</a></li>
                                            <li><a href="./about.php">- About Us</a></li>
                                            <li><a href="./shopping.php">- Shopping</a></li>
                                            <li><a href="./services.php">- Services</a></li>
                                            <li><a href="./contact.php">- Contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./shopping.php">Shopping</a></li>
                                    <li><a href="./about.php">About Us</a></li>
                                    <li><a href="./services.php">Services</a></li>
                                    <li><a href="./contact.php">Contact</a></li>
                                </ul>

                                <!-- Cart Icon -->
                                <div class="cart-icon ml-5 mt-4 mt-lg-0">
                                    <a href="loginpage.php"><i class="icon_cart"></i></a>
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

    <!-- Welcome Area Start -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img" style="background-image: url(img/bg-img/16.png);">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-9 col-lg-6">
                                <div class="welcome-text">
                                    <h2 data-animation="fadeInUp" data-delay="100ms">We Care About <br> Your Hair</h2>
                                    <p data-animation="fadeInUp" data-delay="400ms">“Discover your own style. Don't try to repeat what has already been written - have the courage to do your own thing and don't be afraid to do something different.”</p>
                                    <a href="#" class="btn akame-btn" data-animation="fadeInUp" data-delay="700ms">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img" style="background-image: url(img/bg-img/16a.png);">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-9 col-lg-6">
                                <div class="welcome-text">
                                    <h2 data-animation="fadeInUp" data-delay="100ms">We Care About <br> Your Hair</h2>
                                    <p data-animation="fadeInUp" data-delay="400ms">“Discover your own style. Don't try to repeat what has already been written - have the courage to do your own thing and don't be afraid to do something different.”</p>
                                    <a href="#" class="btn akame-btn active" data-animation="fadeInUp" data-delay="700ms">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Area End -->

    <!-- About Area Start -->
    <section class="akame-about-area section-padding-80-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Section Heading -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="section-heading mb-80">
                        <h2>Hair Salon</h2>
                        <p>The House of Hair Salon &amp; Spa</p>
                        <span>About Us</span>
                    </div>
                </div>

                <!-- About Us Thumbnail -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-us-thumbnail mb-80">
                        <img src="img/bg-img/15.jpg" alt="">
                    </div>
                </div>

                <!-- About Us Content -->
                <div class="col-12 col-lg-4">
                    <div class="about-us-content mb-80 pl-4">
                        <h3>Beautiful Hair Comes From A Legendary.</h3>
                        <p>“Working in a salon, you look at trends all day long. You’re looking at color all the time,what new products are coming out. You’re a part of the fashion industry,especially if you’re working in a higher-end salon.”</p>
                        <a href="#" class="btn akame-btn active mt-30">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->

    <!-- Border -->
    <div class="container">
        <div class="border-top mt-3"></div>
    </div>

    <!-- Our Service Area Start -->
    <section class="akame-service-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Our Services</h2>
                        <p>The House of Hair Salon &amp; Spa, incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-service-area mb-80 wow fadeInUp" data-wow-delay="200ms">
                        <img src="img/core-img/s1.png" alt="">
                        <h5>Coloring</h5>
                        <p></p>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-service-area mb-80 wow fadeInUp" data-wow-delay="400ms">
                        <img src="img/core-img/s3.png" alt="">
                        <h5>Haircut</h5>
                        <p></p>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-service-area mb-80 wow fadeInUp" data-wow-delay="600ms">
                        <img src="img/core-img/s4.png" alt="">
                        <h5>Hairstyle</h5>
                        <p></p>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-service-area mb-80 wow fadeInUp" data-wow-delay="800ms">
                        <img src="img/core-img/s3.png" alt="">
                        <h5>Treatment</h5>
                        <p></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Our Service Area End -->

    <!-- Why Choose Us Area Start -->
    <section class="why-choose-us-area bg-gray section-padding-80-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="choose-us-thumbnail mt-30 mb-80">
                        <div class="choose-us-img bg-img" style="background-image: url(img/bg-img/4.jpg);"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>Why Choose Us</h2>
                        <p>We provide the utmost professionalism and satisfaction for the customers.</p>
                    </div>
                    <!-- Choose Us Content -->
                    <div class="choose-us-content mt-30 mb-80">
                        <ul>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> We Strive For LIVE Answer On Our Calls.</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> A Wide Spectrum Of Skills And Experience.</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Fast Response To Requests &amp; Critical Response Time Guaranteed.</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> We Help Solve Your Business Problems.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Area End -->


    <!-- Our Expert Area Start -->
    <section class="akame-our-expert-area section-padding-80-0">

        <!-- Side Thumbnail -->
        <div class="side-thumbnail" style="background-image: url(img/bg-img/14.png);"></div>

        <div class="container">
            <div class="row justify-content-end">
                <div class="col-12 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>Our Experts</h2>
                        <p>Below are our top leading staff members who specializes in their specific fields.</p>
                    </div>
                    <!-- Our Certificate -->
                    <div class="our-certificate-area mb-60 d-flex align-items-center">
                        <img src="img/core-img/certificate-1.png" alt="">
                        <img src="img/core-img/certificate-2.png" alt="">
                        <img src="img/core-img/certificate-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member mb-80 wow fadeInUp" data-wow-delay="200ms">
                        <div class="team-member-img">
                            <img src="img/bg-img/10.jpg" alt="">
                            <!-- Social Info -->
                            <div class="team-social-info d-flex align-items-center justify-content-center">
                                <div class="social-link">
                                    <a href="https://www.instagram.com/zkannn__/"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h5>Wong Zhang Kan</h5>
                            <p>Hairdresser</p>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member mb-80 wow fadeInUp" data-wow-delay="400ms">
                        <div class="team-member-img">
                            <img src="img/bg-img/11.jpg" alt="">
                            <!-- Social Info -->
                            <div class="team-social-info d-flex align-items-center justify-content-center">
                                <div class="social-link">
                                    <a href="https://www.instagram.com/jazype/"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h5>Jasper Chia</h5>
                            <p>Stylist</p>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member mb-80 wow fadeInUp" data-wow-delay="600ms">
                        <div class="team-member-img">
                            <img src="img/bg-img/12.jpg" alt="">
                            <!-- Social Info -->
                            <div class="team-social-info d-flex align-items-center justify-content-center">
                                <div class="social-link">
                                    <a href="https://www.instagram.com/waaiih/"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h5>Chang Wai Hoe</h5>
                            <p>Hairstylist</p>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member mb-80 wow fadeInUp" data-wow-delay="800ms">
                        <div class="team-member-img">
                            <img src="img/bg-img/13.jpg" alt="">
                            <!-- Social Info -->
                            <div class="team-social-info d-flex align-items-center justify-content-center">
                                <div class="social-link">
                                    <a href="https://www.instagram.com/wayne.tan_/"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h5>Wayne Tan</h5>
                            <p>Barber</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Our Expert Area End -->

    <!-- Border -->
    <div class="container">
        <div class="border-top mt-3"></div>
    </div>

    <!-- Call To Action Area Start -->
    <section class="akame-cta-area bg-gray section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-xl-5">
                    <div class="cta-content">
                        <h2>Make Lil Apple Your <br>Number One Choice</h2>
                        <p>Book now or Contact us to make an appointment!</p>
                        <div class="akame-btn-group mt-30">
                            <a href="#" class="btn akame-btn active mr-3 mb-3 mb-sm-0">Book An Appointment</a>
                            <a href="#" class="btn akame-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Thumbnail -->
        <div class="cta-thumbnail bg-img" style="background-image: url(img/bg-img/cta.png);"></div>
    </section>
    <!-- Call To Action Area End -->

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
