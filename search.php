<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>ClickinPedia - Search Service</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<?php 
include "include/links.php";
 include "include/menu.php";
 include "include/config.php";
 include "include/constant.php";
 
 if(isset($_POST['search'])){
   $query = $_POST['query'];
 }
?>
 <!-- <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script type='text/javascript'>
        $(document).ready(function () {
            $('#query').keyup(function () {
                var query = $(this).val();
                if (query != '') {
                  $.ajax({
                     type: "POST",
                     url: "search.php",
                     data: { query: query}
                     })
                }
            });
        });
    </script>  -->
<?php
 $sql = "SELECT * FROM `services` WHERE name like '%$query%'";
 $result = mysqli_query($conn , $sql);
 $num = mysqli_num_rows($result);
 ?>
   <main>
      <!-- breadcrumb area start -->
      <section class="breadcrumb__area breadcrumb-height include-bg p-relative" data-background="assets/img/breadcrumb/breadcurmb.jpg">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="breadcrumb__content">
                  <h3 class="breadcrumb__title wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".5s">Click In Pedia Service </h3>
                  <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
                     <span><a href="index.php">Home</a></span>
                     <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                     <span> 

<?php
echo $query;
?>

                     </span>
                     <div>
                        <!-- <input class="search-input" type="search" placeholder="Search Here" id="query"> -->
                     </div>
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
              if($num > 0){
while($row = mysqli_fetch_assoc($result)){
            echo "
               <div class='col-xl-4 col-lg-4 mb-30  wow tpfadeUp' data-wow-duration='.7s' data-wow-delay='.3s'>
                  <div class='service-item-three text-center'>
                     <div class='service-item-three__img'>
                     <a href='service-details.php?id=".$row['id']."'>
                        <img src='".PRODUCT_IMAGE_SITE_PATH.$row['image']."' alt=''>
                        </a>
                     </div>
                     <div class='service-item-three__content'>
                        <h4 class='tp-service-sm-title'><a href='service-details.php?id=".$row['id']."'>".$row['name']."</a></h4>
                        <p>".substr($row['short_desc'],0,100)."</p>
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
              }
              else {
               echo "
               <div class='col-xl-4 col-lg-4 mb-30  wow tpfadeUp' data-wow-duration='.7s' data-wow-delay='.3s'>
                  <div class='service-item-three text-center'>
                     <div class='service-item-three__content'>
                        <h4 class='tp-service-sm-title'>No Serivce Available </h4>
                        <p>For Query ( ".$query." )</p>
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


   </main>


   




 
   <?php include "include/footer.php" ?>


<?php include "include/scripts.php" ?>
