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
      header("Location:./services.php?ok=Thank You We Will contact You ASAP&#ok");
   }
}
?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>ClickinPedia - Services Page</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<?php include "include/links.php" ?> 



<?php include "include/menu.php" ?>
 

   <main>

      <!-- breadcrumb area start -->
      <section class="breadcrumb__area breadcrumb-height include-bg p-relative" data-background="assets/img/breadcrumb/breadcurmb.jpg">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="breadcrumb__content">
                  <h3 class="breadcrumb__title wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".5s">Clickinpedia Service </h3>
                  <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
                     <span><a href="#">Home</a></span>
                     <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                     <span>Our Service</span>
                   </div>
               </div>
            </div>
         </div>
      </div>
      </section>
      <!-- breadcrumb area end -->

      <!-- tp-service-area-start -->
      <div class="tp-service-area pt-120 pb-100">
         <div class="container">
            <div class="row">
               <?php
            $sql = "SELECT * FROM `services`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            echo "
               <div class='col-xl-4 col-lg-4 mb-30  wow tpfadeUp' data-wow-duration='.7s' data-wow-delay='.3s'>
                  <div class='service-item-three text-center'>
                     <div class='service-item-three__img'>
                     <a href='service-details.php?id=".$row['id']."'>
                        <img src='assets/img/service/web-development.png' alt=''>
                        </a>
                     </div>
                     <div class='service-item-three__content'>
                        <h4 class='tp-service-sm-title'><a href='service-details.php?id=".$row['id']."'>".$row['name']."</a></h4>
                        <p>".substr($row['short_desc'],0,100)."...</p>
                     </div>
                     <div class='service-item-three__button'>
                        <a href='service-details.php?id=".$row['id']."'>
                           <span>
                              <svg width='34' height='16' viewBox='0 0 34 16' fill='none'
                                 xmlns='http://www.w3.org/2000/svg'>
                                 <path
                                    d='M33.7071 8.70711C34.0976 8.31659 34.0976 7.68342 33.7071 7.2929L27.3431 0.928935C26.9526 0.53841 26.3195 0.53841 25.9289 0.928934C25.5384 1.31946 25.5384 1.95262 25.9289 2.34315L31.5858 8L25.9289 13.6569C25.5384 14.0474 25.5384 14.6805 25.9289 15.0711C26.3195 15.4616 26.9526 15.4616 27.3431 15.0711L33.7071 8.70711ZM-8.74228e-08 9L33 9L33 7L8.74228e-08 7L-8.74228e-08 9Z'
                                    fill='currentColor' />
                              </svg>
                           </span>
                           Read More
                        </a>
                     </div>
                  </div>
               </div>
               ";
}
               ?>
            </div>
         </div>
      </div>
      <!-- tp-service-area-end -->

      <!-- tp-about-area-start -->
      <div class="tp-about-area ab-area-sapce pb-120">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-xl-5 col-lg-5 order-2 order-lg-1 wow tpfadeLeft" data-wow-duration=".7s" data-wow-delay=".5s">
                  <div class="tp-ab-wrapper p-relative">
                     <div class="tp-ab-shape-one z-index-3">
                        <img src="assets/img/about/about-shape-1.png" alt="">
                     </div>
                     <div class="tp-ab-shape-two z-index-3">
                        <img src="assets/img/about/about-circle-shape.png" alt="">
                     </div>
                     <div class="tp-about-thumb">
                        <img src="assets/img/about/about-img.jpg" alt="">
                     </div>
                  </div>
               </div>
               <div class="col-xl-7 col-lg-7 order-1 order-lg-2 wow tpfadeRight" data-wow-duration=".7s" data-wow-delay=".8s">
                  <div class="tp-ab-section-title-box">
                     <h4 class="tp-section-subtitle tp-green-color">Who we are?</h4>
                     <h3 class="tp-section-title">We are dynamic team of creative design and development</h3>
                     <p>We have almost 12+ years of experience for helping consulting services <br> and business
                        solutions and best protect.</p>
                     <a class="tp-btn" href="about-us.html">About our Agency</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- tp-about-area-end -->

      <!-- tp-contact-area-start -->
      <div class="tp-contact-area grey-bg pt-120 pb-120 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".5s">
         <div class="container">
            <div class="tp-contact-wrapper p-relative">
               <div class="tp-contact-shape d-none d-xl-block">
                  <img src="assets/img/cta/cta-1.png" alt="">
               </div>
               <div class="row">
                  <div class="col-xl-6 col-lg-6">
                     <div class="contact-us-sction-box mb-60">
                        <h4 class="tp-section-subtitle">Contact me</h4>
                        <h3 class="tp-section-title-xs">Let’s Work <br> Together.</h3>
                     </div>
                     <div class="contact-info">
                        <div class="contact-info-item d-flex align-items-center">
                           <div class="contact-icon">
                              <img src="assets/img/contact/contact-1.png" alt="">
                           </div>
                           <div class="contact-loaction">
                              <a href="https://www.google.com.bd/maps/place/United+States/@37.2756214,-104.656551,5z/data=!3m1!4b1!4m5!3m4!1s0x54eab584e432360b:0x1c3bb99243deb742!8m2!3d37.09024!4d-95.712891" target="_blank">Wisconsin Ave, Suite 700 <br> Chevy Chase, Maryland 20815</a>
                           </div>
                        </div>
                        <div class="contact-info-item d-flex align-items-center">
                           <div class="contact-icon">
                              <img src="assets/img/contact/contact-2.png" alt="">
                           </div>
                           <div class="contact-loaction">
                              <a href="mailto:support@figma.com">support@figma.com</a>
                           </div>
                        </div>
                        <div class="contact-info-item d-flex align-items-center">
                           <div class="contact-icon">
                              <img src="assets/img/contact/contact-3.png" alt="">
                           </div>
                           <div class="contact-loaction">
                              <a href="tel:08778886664)">088 (778 886 664)</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="tpcontact">
                        <div class="tpcontact__heading">
                           <h4 class="tp-contact-title mb-20">
                              <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="M22.9201 9.11169C22.8196 9.00949 22.6998 8.92831 22.5678 8.87286C22.4355 8.81732 22.2936 8.78872 22.1502 8.78872C22.0068 8.78872 21.8649 8.81732 21.7326 8.87286C21.6005 8.92835 21.4806 9.0096 21.38 9.1119C21.3799 9.11199 21.3798 9.11209 21.3797 9.11219L13.2476 17.2717L13.2281 17.2913L13.2214 17.3182L12.7524 19.2026L12.7121 19.3644L12.8738 19.3238L14.7499 18.8526L14.7768 18.8459L14.7964 18.8262L22.9197 10.6577C22.9198 10.6577 22.9198 10.6576 22.9199 10.6575C23.0218 10.5565 23.1027 10.4361 23.1579 10.3035C23.2131 10.1708 23.2415 10.0283 23.2415 9.88451C23.2415 9.74067 23.2131 9.59826 23.1579 9.46552C23.1027 9.33298 23.0219 9.2127 22.9201 9.11169ZM22.9201 9.11169C22.92 9.11154 22.9198 9.11141 22.9197 9.11127L22.8493 9.18228L22.9206 9.11219C22.9204 9.11202 22.9203 9.11186 22.9201 9.11169ZM15.1768 0.100017L15.1774 0.100013C15.2807 0.0994136 15.383 0.11929 15.4786 0.158513C15.5742 0.197727 15.6612 0.255516 15.7345 0.328588C15.7345 0.328604 15.7345 0.328619 15.7346 0.328635L19.2738 3.88363C19.2738 3.88364 19.2738 3.88364 19.2738 3.88365C19.3465 3.95734 19.4041 4.04475 19.4432 4.1409C19.4823 4.23705 19.5021 4.34002 19.5015 4.4439V4.44448V6.22227C19.5015 6.43164 19.4187 6.63234 19.2715 6.78026C19.1242 6.92815 18.9246 7.01116 18.7166 7.01116C18.5086 7.01116 18.309 6.92815 18.1617 6.78026C18.0145 6.63234 17.9317 6.43164 17.9317 6.22227V4.80893V4.76764L17.9025 4.73837L14.8849 1.70725L14.8556 1.6778H14.814H2.78764C2.52627 1.6778 2.2757 1.7821 2.09102 1.9676C1.90636 2.15309 1.8027 2.40457 1.8027 2.66669V22.2223C1.8027 22.4845 1.90636 22.736 2.09102 22.9214C2.2757 23.1069 2.52627 23.2112 2.78764 23.2112H16.9467C17.2081 23.2112 17.4587 23.1069 17.6433 22.9214C17.828 22.736 17.9317 22.4845 17.9317 22.2223V20.4446C17.9317 20.2352 18.0145 20.0345 18.1617 19.8866C18.309 19.7387 18.5086 19.6557 18.7166 19.6557C18.9246 19.6557 19.1242 19.7387 19.2715 19.8866C19.4187 20.0345 19.5015 20.2352 19.5015 20.4446V22.2223C19.5015 22.9032 19.2323 23.5561 18.7531 24.0374C18.2739 24.5187 17.6242 24.789 16.9467 24.789H2.78764C2.1102 24.789 1.46042 24.5187 0.981261 24.0374C0.502089 23.5561 0.232813 22.9032 0.232813 22.2223V2.66669C0.232813 1.98583 0.502089 1.33293 0.981262 0.85162C1.46042 0.370323 2.1102 0.100015 2.78764 0.100015L15.1768 0.100017ZM23.819 11.949H23.8652L15.7349 20.1156C15.7348 20.1157 15.7347 20.1158 15.7346 20.1159C15.6326 20.2166 15.5051 20.2874 15.366 20.3206L15.3649 20.3209L11.8251 21.2098L11.8251 21.2098L11.8222 21.2106C11.6896 21.2481 11.5495 21.2499 11.416 21.2157C11.2825 21.1816 11.1602 21.1127 11.0615 21.016C10.9628 20.9192 10.8912 20.798 10.8539 20.6646C10.8166 20.5311 10.8149 20.3902 10.849 20.2559L10.8492 20.2554L11.7341 16.6998L11.7344 16.6987C11.7675 16.5587 11.8381 16.4306 11.9384 16.3281C11.9384 16.328 11.9385 16.3279 11.9386 16.3278L20.2388 7.99061L20.2389 7.99071L20.2425 7.98667C20.4848 7.7154 20.7795 7.4966 21.1088 7.34361C21.438 7.19062 21.7948 7.10664 22.1574 7.09677C22.52 7.08691 22.8807 7.15137 23.2177 7.28624C23.5547 7.4211 23.8608 7.62355 24.1174 7.88124C24.3739 8.13893 24.5755 8.44646 24.7098 8.78508C24.8441 9.12369 24.9084 9.48626 24.8985 9.85065C24.8887 10.215 24.8051 10.5736 24.6527 10.9044C24.5003 11.2352 24.2825 11.5313 24.0124 11.7747L23.819 11.949ZM4.00264 16.331C4.14988 16.1831 4.34949 16.1001 4.55752 16.1001H8.09729C8.30533 16.1001 8.50494 16.1831 8.65217 16.331C8.79943 16.4789 8.88224 16.6796 8.88224 16.889C8.88224 17.0984 8.79943 17.2991 8.65218 17.447C8.50494 17.5949 8.30533 17.6779 8.09729 17.6779H4.55752C4.34949 17.6779 4.14988 17.5949 4.00264 17.447C3.85539 17.2991 3.77258 17.0984 3.77258 16.889C3.77258 16.6796 3.85539 16.4789 4.00264 16.331ZM4.55752 5.43337H12.522C12.73 5.43337 12.9296 5.51638 13.0769 5.66428C13.2241 5.81219 13.3069 6.0129 13.3069 6.22227C13.3069 6.43164 13.2241 6.63234 13.0769 6.78026C12.9296 6.92815 12.73 7.01116 12.522 7.01116H4.55752C4.34949 7.01116 4.14988 6.92815 4.00264 6.78026C3.85539 6.63234 3.77258 6.43164 3.77258 6.22227C3.77258 6.0129 3.85539 5.81219 4.00264 5.66428C4.14988 5.51638 4.34949 5.43337 4.55752 5.43337ZM13.0769 10.9976C13.2241 11.1455 13.3069 11.3463 13.3069 11.5556C13.3069 11.765 13.2241 11.9657 13.0769 12.1136C12.9296 12.2615 12.73 12.3445 12.522 12.3445H4.55752C4.34949 12.3445 4.14988 12.2615 4.00264 12.1136C3.85539 11.9657 3.77258 11.765 3.77258 11.5556C3.77258 11.3463 3.85539 11.1455 4.00264 10.9976C4.14988 10.8497 4.34949 10.7667 4.55752 10.7667H12.522C12.73 10.7667 12.9296 10.8497 13.0769 10.9976Z"
                                    fill="#171717" stroke="#0F0F0F" stroke-width="0.2" />
                              </svg>
                              Fill the form
                           </h4>
                        </div>
                        <div class="tpcontact__form">
                           <form method="POST" id='ok'>
                              <div class="d-flex justify-content-around">
                                 <input type="text" name="name" placeholder="Company name">
                                 <input type="email" name="email" placeholder="Enter your mail">

                              </div>
                              <div class="d-flex justify-content-around">
                              
                              <input type="number" name="phone" placeholder="Enter your Number">
                              <select name='service' class="select-input" required>
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
                              <textarea name="message" placeholder="Enter your message"></textarea>
                              <?php
                                 $ok = $_GET['ok'];
                           if($ok == '')
                           {
                           echo "
                              <button name='submit' class='tp-btn'>Let,s Talk</button>
                              ";
                           }
                           else {
                              echo "
                              <button class='tp-btn'>".$ok."</button>
                              ";
                           }

                           ?>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- tp-contact-area-end -->

   </main>



 
   <?php include "include/footer.php" ?>


<?php include "include/scripts.php" ?>
