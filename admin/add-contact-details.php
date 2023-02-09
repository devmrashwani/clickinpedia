<?php
error_reporting(E_ERROR | E_PARSE);
require('./include/db_conn.php');
require('./include/functions.php');
if (isset($_POST['save'])) {
    $email = get_safe_value($conn, $_POST['email']);
    $phone = get_safe_value($conn, $_POST['phone']);
    $map = get_safe_value($conn, $_POST['map']);
    $address = get_safe_value($conn, $_POST['address']);
    $about = get_safe_value($conn, $_POST['about']);
    $insta = get_safe_value($conn, $_POST['insta']);
    $fb = get_safe_value($conn, $_POST['fb']);
    $twiter = get_safe_value($conn, $_POST['twiter']);
    $youtube = get_safe_value($conn, $_POST['youtube']);
    $lkdn = get_safe_value($conn, $_POST['lkdn']);
 
    $result = mysqli_query($conn, "UPDATE `contact` SET `email`='$email',`phone`='$phone',`address`='$address',`map`='$map',`fb`='$fb',`insta`='$insta',`twiter`='$twiter',`youtube`='$youtube',`lkdn`='$lkdn',`about`='$about' WHERE 1");
    if ($result) {
        echo "<script>alert('Successfully Updated')</script>";
    }else {
        echo "<script>alert('Error')</script>";
    }
    }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Click In Pedia Dashboard</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/vendor/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="assets/css/vendor/cryptocurrency-icons.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins/plugins.css">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="assets/css/helper.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Custom Style CSS Only For Demo Purpose -->
    <link id="cus-style" rel="stylesheet" href="assets/css/style-primary.css">
</head>
<body>
    <div class="main-wrapper">
        <!-- Header Section Start -->
        <?php
        include("./include/header.php");
         ?>
        <!-- Header Section End -->
        <!-- Content Body Start -->
        <div class="content-body">
            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">
                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Add Contact Details<span></span></h3>
                    </div>
                    </div><!-- Page Heading End -->
                     <!-- Page Button Group Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="buttons-group">
                        <button class="button button-outline button-primary" name='save'>Save</button>
                    </div>
                </div><!-- Page Button Group End -->
                
            </div><!-- Page Headings End -->
             <!-- Add or Edit Product Start -->
          <!-- Add or Edit Product Start -->
          <div class="add-edit-product-wrap col-12">

<div class="add-edit-product-form">
    <form method='post'>
        <h4 class="title">About Contact Details</h4>
        <div class="row">
<?php
    $row = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `contact`"));
?> 
        <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Contact Email</b></label>    
                <input class="form-control" type="email" name='email' value='<?php echo $row['email']; ?>' required>
                
            </div>
            
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Mobile Number</b></label>    
                <input class="form-control" type="text" name='phone' value='<?php echo $row['phone']; ?>' required>
            </div>
              
           
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Google Map</b></label>    
                <input class="form-control" type="text" name='map' value='<?php echo $row['map']; ?>' required>
            </div>
            
           
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Instagram Link</b></label>    
                <input class="form-control" type="text" name='insta' value='<?php echo $row['insta']; ?>' required>
            </div>
            
           
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Facebook Link</b></label>    
                <input class="form-control" type="text" name='fb' value='<?php echo $row['fb']; ?>' required>
            </div>
           
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Twiter Link</b></label>    
                <input class="form-control" type="text" name='twiter' value='<?php echo $row['twiter']; ?>' required>
            </div>
            
            
           
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Linkdein Link</b></label>    
                <input class="form-control" type="text" name='lkdn' value='<?php echo $row['lkdn']; ?>' required>
            </div>
            
            
           
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Youtube Link</b></label>    
                <input class="form-control" type="text" name='youtube' value='<?php echo $row['youtube']; ?>' required>
            </div>
            
            
            <div class="col-12 mb-30">
            <label for="name"><b>Address</b></label> 
                <textarea class="form-control" name='address' required>
                <?php echo $row['address'];?>
                </textarea>
            </div>
            
            
            <div class="col-12 mb-30">
            <label for="name"><b>About</b></label> 
                <textarea class="form-control" name='about' required>
               <?php echo $row['about']; ?>
                </textarea>
            </div>
            
        <!-- Button Group Start -->
        <div class="row">
            <div class="d-flex flex-wrap justify-content-end col mbn-10">
                <button class="button button-outline button-primary mb-10 ml-10 mr-0" name='save'>Save</button>
               
            </div>
        </div><!-- Button Group End -->

    </form>
</div>

</div><!-- Add or Edit Product End -->

        </div><!-- Content Body End -->

        <!-- Footer Section Start -->
        <div class="footer-section">
            <div class="container-fluid">

                <div class="footer-copyright text-center">
                    <p class="text-body-light">2022 &copy; <a href="https://themeforest.net/user/codecarnival">Codecarnival</a></p>
                </div>

            </div>
        </div><!-- Footer Section End -->

    </div>

    <!-- JS
============================================ -->

    <!-- Global Vendor, plugins & Activation JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!--Plugins JS-->
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/tippy4.min.js.js"></script>
    <!--Main JS-->
    <script src="assets/js/main.js"></script>

</body>

</html>