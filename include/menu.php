<?php 
error_reporting(0);
include "include/config.php";
$sql_c = "SELECT * FROM `contact`";
$result_c = mysqli_query($conn, $sql_c);
$row_c = mysqli_fetch_assoc($result_c);
 ?>
 
 <!-- preloader -->
 <div id="preloader">
      <div class="preloader">
            <span></span>
            <span></span>
      </div>
   </div>
   <!-- preloader end  -->

   <header>
      <!-- tp-header-area-start -->
      <div id="header-sticky" class="tp-header-area header-pl-pr header-transparent header-border-bottom">
         <div class="container-fluid">
            <div class="row g-0 align-items-center">
               <div class="col-xl-2 col-lg-2 col-md-4 col-6">
                  <div class="tp-logo tp-logo-border">
                     <a href="index.php">
                        <img src="assets/img/logo/logo.jpg" alt="">
                     </a>
                  </div>
               </div>
               <div class="col-xl-10 col-lg-10 col-md-8 col-6 d-flex justify-content-end">
                  <div class="tp-main-menu d-none d-xl-block">
                     <nav id="mobile-menu">
                        <ul>
                           <li><a href="index.php">Home</a> </li>
                            
                          
                           <li><a href="about-us.php">About</a></li>

                           <!-- <li><a href="case-details.php">Our Project</a> </li> -->
                           <li><a href="services.php">Services</a>
                              <ul class="submenu">
                                 <?php
                              $sql = "SELECT * FROM `services`";
                              $result = mysqli_query($conn, $sql);
                              
                           while($row = mysqli_fetch_assoc($result)){
                              echo "
                                 <li><a href='service-details.php?id=".$row['id']."'>".$row['name']."</a></li>
                                 ";
                                    }
                                    ?>
 
                              </ul>
                           </li>
                           <li><a href="contact.php">Contact Us</a></li>
                           <li><a href="blog.php">Blog</a></li>

                        </ul>
                     </nav>
                  </div>
                  <div class="tp-header-right">
                     <ul>
                        <li class=" d-none d-md-inline-block search-wrapper">
                           <a class="tp-search-box" href="javascript:void(0)"><i class="tp-search-toggle fal fa-search"></i><i class="search-close  far fa-times"></i></a>
                           <div class="tp-search-form p-relative">
                              <form action="search.php" method="POST">
                                 <input type="text" name="query" placeholder="Search ...">
                                 <button type="submit" name="search"><i class="far fa-search"></i></button>
                              </form>
                           </div>
                        </li>
                       
                        <li><a class="tp-menu-bar" href="javascript:void(0)"><i class="fas fa-bars"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- tp-header-area-end -->
   </header>

   <!-- tp-offcanvus-area-start -->
      <div class="tp-offcanvas-area">
      <div class="tpoffcanvas">
         <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="tpoffcanvas__logo pt-50">
            <a href="index.php">
               <img src="assets/img/logo/logo.jpg" alt="">
            </a>
         </div>
         <div class="tpoffcanvas__text">
            <p><?php echo $row_c['about']; ?></p>
         </div>
         <div class="mobile-menu"></div>
         <div class="tpoffcanvas__info">
            <h3 class="offcanva-title">Get In Touch</h3>
            <div class="tp-info-wrapper mb-20 d-flex align-items-center">
               <div class="tpoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-envelope"></i></a>
               </div>
               <div class="tpoffcanvas__info-address">
                  <span>Email</span>
                  <a href="maito:<?php echo $row_c['email']; ?>"><?php echo $row_c['email']; ?></a>
               </div>
            </div>
            <div class="tp-info-wrapper mb-20 d-flex align-items-center">
               <div class="tpoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-phone-alt"></i></a>
               </div>
               <div class="tpoffcanvas__info-address">
                  <span>Phone</span>
                  <a href="tel:<?php echo $row_c['phone']; ?>"><?php echo $row_c['phone']; ?></a>
               </div>
            </div>
            <div class="tp-info-wrapper mb-20 d-flex align-items-center">
               <div class="tpoffcanvas__info-icon">
                  <a href="#"><i class="fas fa-map-marker-alt"></i></a>
               </div>
               <div class="tpoffcanvas__info-address">
                  <span>Location</span>
                  <iframe src="<?php echo $row_c['map']; ?>" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  
               </div>
            </div>
         </div>
         <div class="tpoffcanvas__social">
            <div class="social-icon">
               <a href="<?php echo $row_c['twiter']; ?>"><i class="fab fa-twitter"></i></a>
               <a href="<?php echo $row_c['insta']; ?>"><i class="fab fa-instagram"></i></a>
               <a href="<?php echo $row_c['fb']; ?>"><i class="fab fa-facebook-square"></i></a>
               <a href="<?php echo $row_c['youtube']; ?>"><i class="fab fa-youtube"></i></a>
            </div>
         </div>
      </div>
      </div>
   