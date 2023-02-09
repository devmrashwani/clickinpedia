<?php
include "include/config.php";
include "include/functions.php";
if(isset($_POST['submit']))
{
   $name = get_safe_value($conn,$_POST['name']);
   $email = get_safe_value($conn,$_POST['email']);
   $phone = get_safe_value($conn,$_POST['phone']);
   $service = get_safe_value($conn,$_POST['service']);
   $message = get_safe_value($conn,$_POST['message']);
   date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
   $date = date("Y-m-d i:h:s"); 
   $sql = "INSERT INTO `contact_us`(`name`, `email`, `mobile`, `comment`, `service`, `added_on`) VALUES ('$name','$email','$phone','$message','$service','$date')";
   $result = mysqli_query($conn, $sql);
   if($result){
      echo"<script>alert('Thank You We Will contact You ASAP.');</script>";
      header("Location:./contact.php?ok=Thank You We Will contact You ASAP&#ok");
   }
}
?>



<!doctype html>
<html class="no-js" lang="zxx">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>ClickinPedia - Contact us Page</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include "include/links.php" ?> 
<?php include "include/menu.php" ?>


<div class="tp-offcanvas-area">
      <div class="tpoffcanvas">
         <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="tpoffcanvas__logo pt-50">
            <a href="index.html">
               <img src="assets/img/logo/logo-white.png" alt="">
            </a>
         </div>
         <div class="tpoffcanvas__text">
            <p>Suspendisse interdum consectetur libero id. Fermentum leo vel orci porta non. Euismod viverra nibh cras pulvinar suspen.</p>
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
                  <a href="maito:hello@yourmail.com">hello@yourmail.com</a>
               </div>
            </div>
            <div class="tp-info-wrapper mb-20 d-flex align-items-center">
               <div class="tpoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-phone-alt"></i></a>
               </div>
               <div class="tpoffcanvas__info-address">
                  <span>Phone</span>
                  <a href="tel:(00)45611227890">(00) 456 1122 7890</a>
               </div>
            </div>
            <div class="tp-info-wrapper mb-20 d-flex align-items-center">
               <div class="tpoffcanvas__info-icon">
                  <a href="#"><i class="fas fa-map-marker-alt"></i></a>
               </div>
               <div class="tpoffcanvas__info-address">
                  <span>Location</span>
                  <a href="https://www.google.com/maps/@37.4801311,22.8928877,3z" target="_blank">Riverside 255, San Francisco, USA </a>
               </div>
            </div>
         </div>
         <div class="tpoffcanvas__social">
            <div class="social-icon">
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#"><i class="fab fa-facebook-square"></i></a>
               <a href="#"><i class="fab fa-dribbble"></i></a>
            </div>
         </div>
      </div>
      </div>
   
      <div class="body-overlay"></div>
   <!-- tp-offcanvus-area-end -->
   <main>

      <!-- breadcrumb area start -->
      <section class="breadcrumb__area breadcrumb-height include-bg p-relative" data-background="assets/img/breadcrumb/breadcurmb.jpg">
         <div class="container">
            <div class="row">
               <div class="col-xxl-12">
                  <div class="breadcrumb__content">
                     <h3 class="breadcrumb__title">Contact us</h3>
                     <span class="breadcrumb__subtitle">Home <i class="far fa-angle-right"></i> <a href="#"> Contact us</a></span>
                    
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- breadcrumb area end -->


      <!-- contact area start -->
      <div class="tp-contact-area pt-130 pb-130">
         <div class="container">
            <div class="row g-0 align-items-center justify-content-center">
               <div class="col-xl-4 col-lg-4 col-md-5 col-12">
                  <div class="contact-box">
                     <div class="contact-box-circle">
                        <span>O</span>
                        <span>R</span>
                     </div>
                     <h3 class="contact-box__title">Contact <br> Directly</h3>
                     <div class="contact-box__info-list">
                     <?php
                        $sql_c = "SELECT * FROM `contact`";   
                        $result_c = mysqli_query($conn , $sql_c);
                        $row = mysqli_fetch_assoc($result_c);
                        echo "
                        <ul>
                           <li><a href='tel:".$row['phone']."'><i class='fal fa-phone-alt'></i>".$row['phone']."</a></li>
                           <li><a href='mailto:".$row['email']."'><i class='fal fa-globe'></i>".$row['email']."</a></li>
                           <li><iframe src='".$row['map']."' width='100%' height='100' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe></li>
                        </ul>
                       
                     </div>
                     <div class='contact-box__social'>
                        <ul>
                           <li><a href='".$row['insta']."'><i class='fab fa-instagram'></i></a></li>
                           <li><a href='".$row['fb']."'><i class='fab fa-facebook-f'></i></a></li>
                           <li><a href='".$row['lkdn']."'><i class='fab fa-linkedin'></i></a></li>
                           <li><a href='".$row['twiter']."'><i class='fab fa-twitter'></i></a></li>
                           <li><a href='".$row['youtube']."'><i class='fab fa-youtube'></i></a></li>
                        </ul>
                     </div>
                     ";
                     ?>
                  </div>
               </div>
               <div class="col-xl-8 col-lg-8 col-md-7 col-12">
                  <div class="postbox__comment-form contact-wrapper">
                     <h3 class="postbox__comment-form-title">Send us a
                        Message</h3>
                     <form method="POST" id='ok'>
                        <div class="row">
                           <div class="col-12 d-flex justify-content-around">
                              <div class="postbox__comment-input">
                                 <input type="text" name="name" minlength="3" maxlength="17" placeholder="Enter your name" required>
                              </div>
                              <div class="postbox__comment-input">
                                 <input type="email" name="email" minlength="12" placeholder="Enter your mail" required>
                              </div>
                           </div>
                           <div class="col-12 d-flex justify-content-around">
                              <div class="postbox__comment-input" >
                                 <input type="number" name="phone" minlength="10" maxlength="12" placeholder="Enter your Contact" required>
                              </div>
                              <div class="postbox__comment-input">
                                 <select name='service' required>
                                    <option value="">--Select Service--</option>
                                    <?php
                                    $result = mysqli_query($conn,"SELECT * from services");
                                    while ($row = mysqli_fetch_assoc($result) ){
                                             echo "
                                          <option value='".$row['name']."'>".$row['name']."</option>
                                          ";
                                          }
                                    ?>
                                 </select>
                              </div>
                           </div>
                          
                           <div class="col-12">
                              <div class="postbox__comment-input">
                                 <textarea name="message" placeholder="Enter your message" required></textarea>
                              </div>
                           </div>
                           <div class="col-12">
                              <?php
                                 $ok = $_GET['ok'];
                           if($ok == '')
                           {
                           echo "
                           <div class='postbox__comment-btn'>
                              <button type='submit' name='submit' class='tp-btn'>Let,s Talk</button>
                           </div>
                           ";
                           }
                           else {
                              
                              echo"
                              <div class='postbox__comment-btn'>
                              <button class='tp-btn'>".$ok."</button>
                           </div>
                              ";
                           }

?> 
                             
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact area end -->



   </main>

   <?php include "include/footer.php" ?>


<?php include "include/scripts.php" ?>
