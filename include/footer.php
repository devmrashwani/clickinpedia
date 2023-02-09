<?php
   $sql_c = "SELECT * FROM `contact`";   
   $result_c = mysqli_query($conn , $sql_c);
   $row = mysqli_fetch_assoc($result_c);
   echo "
      <!-- tp-social-area-start -->
      <div class='tp-social-area social-space-bottom fix'>
         <div class='container-fluid p-0'>
            <div class='row g-0'>
               <div class='col-lg-2 col-md-4 col-sm-6'>
                  <a href='".$row['fb']."'>
                     <div class='tp-social-item'>
                        <span><i class='fab fa-facebook-f'></i> Facebook</span>
                     </div>
                  </a>
               </div>
               <div class='col-lg-2 col-md-4 col-sm-6'>
                  <a href='".$row['youtube']."'>
                     <div class='tp-social-item tp-youtube'>
                        <span><i class='fab fa-youtube'></i> youtube</span>
                     </div>
                  </a>
               </div>
               <div class='col-lg-2 col-md-4 col-sm-6'>
                 <a href='".$row['insta']."'>
                     <div class='tp-social-item tp-instagram'>
                        <span><i class='fab fa-instagram'></i> instagram</span>
                     </div>
                 </a>
               </div>
               <div class='col-lg-2 col-md-4 col-sm-6'>
                  <a href='".$row['whatsapp']."'>
                     <div class='tp-social-item tp-whatsapp'>
                        <span><i class='fab fa-whatsapp'></i> whatsapp</span>
                     </div>
                  </a>
               </div>
               <div class='col-lg-2 col-md-4 col-sm-6'>
                  <a href='".$row['twiter']."'>
                     <div class='tp-social-item tp-twitter'>
                        <span><i class='fab fa-twitter'></i> twitter</span>
                     </div>
                  </a>
               </div>
               <div class='col-lg-2 col-md-4 col-sm-6'>
                 <a href='".$row['lkdn']."'>
                     <div class='tp-social-item tp-linkedin'>
                        <span><i class='fab fa-linkedin'></i>linkedin</span>
                     </div>
                 </a>
               </div>
            </div>
         </div>
      </div>
      ";
      ?>
      <!-- tp-social-area-end -->

<footer>
      <!-- tp-footer-area-start -->
      <div class="tp-footer-area footer-bg pt-130" data-background="assets/img/footer/footer.png">
         <div class="container">
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-4 col-8 mb-30">
                  <div class="tp-footer-widget z-index-3">
                     <div class="tp-footer-widget__title">
                     <a href="index.php">
               <img src="assets/img/logo/logo.jpg" alt="" width="150px">
            </a>
                     </div>
                     <div class="">
                        <p style="font-size: 15px; color:white;">
                        “Our company Clickinpedia is a leading digital marketing company that helps businesses grow online. Our mission is to provide businesses with innovative and effective digital marketing solutions that drive results.”
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-2 col-md-3 col-6 mb-30">
                  <div class="tp-footer-widget footer-space-one z-index-3">
                     <div class="tp-footer-widget__title">
                        <h4 class="tp-footer-title">Links</h4>
                     </div>
                     <div class="tp-footer-widget__list">
                        <ul>
                           <li><a href="index.php">Home</a></li>
                           <li><a href="about-us.php">About</a></li>
                           <li><a href="contact.php">Contact</a></li>
                           <li><a href="blog.php">Blogs</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               
               <div class="col-xl-2 col-lg-2 col-md-3 col-6 mb-30">
                  <div class="tp-footer-widget footer-space-three z-index-3">
                     <div class="tp-footer-widget__title">
                        <h4 class="tp-footer-title">Services</h4>
                     </div>
                     <div class="tp-footer-widget__list">
                        
                        <ul>
                        <?php
                     $sql = "SELECT * FROM `services`";
                  $result = mysqli_query($conn , $sql);
                  while($row = mysqli_fetch_assoc($result)){
                     echo "
                           <li><a href='service-details.php?id=".$row['id']."'>".$row['name']."</a></li>
                           ";
                  }
                  ?>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-30">
                  <div class="tp-footer-widget z-index-3">
                     <div class="tp-footer-widget__title">
                        <h4 class="tp-footer-title">Contact Us</h4>
                     </div>
                     <div class="tp-footer-widget__list">
                        <?php
                        $sql_c = "SELECT * FROM `contact`";   
                        $result_c = mysqli_query($conn , $sql_c);
                        $row_c = mysqli_fetch_assoc($result_c);
                        echo "
                        <ul class='footer-position'>
                           
                           <li><a href='mailto:".$row_c['email']."'>
                              <span><i class='fal fa-envelope-open'></i></span>
                              ".$row_c['email']."</a>
                           </li>
                           <li><a href='tel:".$row_c['phone']."'>
                              <span><i class='fal fa-phone-alt'></i></span>
                              ".$row_c['phone']."</a>
                           </li>
                           <li>
                           <iframe src='".$row_c['map']."' width='100%' height='100' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>
                           </li>
                           ";
                           ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <div class="tp-newsletter-wrapper z-index-3">
                     <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12 col-12">
                           <div class="tp-newsletter">
                              <div class="tp-newsletter__title">
                                 <h4 class="tp-newsletter-title">Get latest updates</h4>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                           <div class="tp-newsletter">
                              <div class="tp-newsletter__input p-relative">
                                 <form action="#">
                                    <input type="email" placeholder="Enter your mail">
                                    <button class="tp-btn-yellow">Subscribe <i class="far fa-arrow-right"></i></button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copy-right-wrapper z-index-3">
               <div class="row">
                  <div class="col-xl-6 col-lg-7 col-12">
                     <div class="copyright-left text-center text-lg-start">
                        <p>©Copy Right @2023 All Rights Reserved - Clinkinpedia</p>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-5 col-12">
                     <div class="copyright-right-side text-center text-lg-end">
                        <ul>
                           <li><a href="#">Privacy Policy</a></li>
                           <li><a href="#">Terms of Use</a></li>
                           <!-- <li><a href="#">Sales and Refunds</a></li> -->
                        </ul>
                     </div>
                  </div>
               </div>
           </div>
         </div>
      </div>
      <!-- tp-footer-area-end -->

      <button class="scroll-top scroll-to-target" data-target="html">
         <i class="far fa-angle-double-up"></i>
     </button>


   </footer>




</body>

</html>