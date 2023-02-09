<?php
require('./include/db_conn.php');
require('./include/authentication.php');
require('./include/constant.php');
?>

<div class="header-section">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">

                    <!-- Header Logo (Header Left) Start -->
                    <div class="header-logo col-auto">
                        <a href="index.php">
                            <img src="assets/images/logo/logo.jpg" alt="" height='100px' weight='100px'>
                            <!-- <img src="assets/images/logo/logo-light.png" class="logo-light" alt=""> -->
                        </a>
                    </div><!-- Header Logo (Header Left) End -->

                    <!-- Header Right Start -->
                    <div class="header-right flex-grow-1 col-auto">
                        <div class="row justify-content-between align-items-center">

                            <!-- Side Header Toggle & Search Start -->
                            <div class="col-auto">
                                <div class="row align-items-center">
                                    <!--Side Header Toggle-->
                                    <div class="col-auto"><button class="side-header-toggle"><i class="zmdi zmdi-menu"></i></button></div>
                                    <!--Header Search-->
                                    <div class="col-auto">
                                        <div class="header-search">
                                            <button class="header-search-open d-block d-xl-none"><i class="zmdi zmdi-search"></i></button>
                                            <div class="header-search-form">
                                                <button class="header-search-close d-block d-xl-none"><i class="zmdi zmdi-close"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Side Header Toggle & Search End -->

                            <!-- Header Notifications Area Start -->
                            <div class="col-auto">

                                <ul class="header-notification-area">

                                    <!--Language-->
                                    <!--User-->
                                    <li class="adomx-dropdown col-auto">
                                        <a class="toggle" href="#">
                                            <span class="user">
                                        <span class="avatar">
                                            <img src="assets/images/avatar/avatar-1.jpg" alt="">
                                            <span class="status"></span>
                                            </span>
                                            <span class="name"> <?php echo $_SESSION['ADMIN_USERNAME']; ?></span>
                                            </span>
                                        </a>
                                        <!-- Dropdown -->
                                        <div class="adomx-dropdown-menu dropdown-menu-user">
                                            <div class="head">
                                                <h5 class="name"><a href="#"> <?php echo $_SESSION['ADMIN_USERNAME']; ?></a></h5>
                                                <!-- <a class="mail" href="#">mailnam@mail.com</a> -->
                                            </div>
                                            <div class="body">
                                                <ul>
                                                    <li><a href="./logout.php"><i class="zmdi zmdi-lock-open"></i>Sing out</a></li>
                                                </ul>  
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- Header Notifications Area End -->
                        </div>
                    </div><!-- Header Right End -->
                </div>
            </div>
        </div>
               <!-- Side Header Start -->
               <div class="side-header show">
            <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
            <!-- Side Header Inner Start -->
            <div class="side-header-inner custom-scroll">
                <nav class="side-header-menu" id="side-header-menu">
                    <ul>
                        <li><a href="index.php"><i class="ti-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li><a href="category.php"><span>Blog Category</span></a></li>
                        <li><a href="blog.php"><span>Blog</span></a></li>
                        <li><a href="services.php"><span>Services</span></a></li>
                                <!-- <li><a href="reviews.php"><span>Reviews</span></a></li>
                                <li><a href="discount.php"><span>Discount</span></a></li>
                                <li><a href="product.php"><span>Products</span></a></li>
                                <li><a href="order_master.php"><span>Order Master</span></a></li> -->
                                <li><a href="contact.php"><span>Contact From Details</span></a></li>
                                <li><a href="add-contact-details.php"><span>Add Contact Details </span></a></li>
                                <!-- <li><a href="users.php"><span>Users</span></a></li>
                                <li><a href="manage-home-page.php"><span>Home Page Slider</span></a></li> -->
                        </li>
                    </ul>
                </nav>
            </div><!-- Side Header Inner End -->
        </div>
        <!-- Side Header End -->