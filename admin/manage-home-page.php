<?php
include("./include/db_conn.php");
include("./include/constant.php");
 if (isset($_POST['slider1'])) {
    $image = $_FILES["slider1"];
    // for image upload 
    $filename = $image['name'];
    $filerror = $image['error'];
    $filetmp = $image['tmp_name'];
    
    $fileext = explode('.',$filename);
    $filecheck = strtolower(end($fileext));
    
    
    $fileextstored = array('png', 'jpg', 'jpeg' , 'PNG');
    
    if(in_array($filecheck,$fileextstored)){
    $destinationfile = PRODUCT_IMAGE_SERVER_PATH.$filename;
    move_uploaded_file($filetmp,$destinationfile);
    $sql = "UPDATE `home_slider` SET `slider1`='$filename' WHERE `id`='1'";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Successfully Updated Slider 1')</script>";
    }
    else {
    //error display
    echo "<script>alert('error in slider Slider 1')</script>";
    }
    };


if (isset($_POST['slider2'])) {
    $image = $_FILES["slider2"];
    // for image upload 
    $filename = $image['name'];
    $filerror = $image['error'];
    $filetmp = $image['tmp_name'];
   
   

    $fileext = explode('.',$filename);
    $filecheck = strtolower(end($fileext));
    
    
    $fileextstored = array('png', 'jpg', 'jpeg' , 'PNG');
    
    if(in_array($filecheck,$fileextstored)){
    $destinationfile = PRODUCT_IMAGE_SERVER_PATH.$filename;
    move_uploaded_file($filetmp,$destinationfile);
    $sql = "UPDATE `home_slider` SET `slider2`='$filename' WHERE `id`='1'";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Successfully Updated Slider 2')</script>";

    }
    else {
    //error display
    echo "<script>alert('error in slider Slider 2')</script>";
    }
    
    };

    if (isset($_POST['slider3'])) {
    $image2 = $_FILES["slider3"];
    // for image upload 
    $filename2 = $image2['name'];
    $filerror2 = $image2['error'];
    $filetmp2 = $image2['tmp_name'];
    
    $fileext2 = explode('.',$filename2);
    $filecheck2 = strtolower(end($fileext2));
    
    
    $fileextstored2 = array('png', 'jpg', 'jpeg' , 'PNG');
    
    if(in_array($filecheck2,$fileextstored2)){
    $destinationfile2 = PRODUCT_IMAGE_SERVER_PATH.$filename2;
    move_uploaded_file($filetmp2,$destinationfile2);
    $sql = "UPDATE `home_slider` SET `slider3`='$filename2' WHERE `id`='1'";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Successfully Updated Slider 3')</script>";
    
    }
    else {
    //error display
    echo "<script>alert('error in slider Slider 3')</script>";
    }
    };

?>




<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rosa Cosmetics Dashboard</title>
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
        <form method="post" enctype="multipart/form-data">
            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">
                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Home Page Slider
                        <?php
                            // echo $name , $mrp ;
                        ?>
                        <span></span></h3>
                    </div>
                    </div><!-- Page Heading End -->
                     <!-- Page Button Group Start -->
                <div class="col-12 col-lg-auto mb-20">
                    
                </div><!-- Page Button Group End -->
                
            </div><!-- Page Headings End -->
             <!-- Add or Edit Product Start -->
          <!-- Add or Edit Product Start -->
          <div class="add-edit-product-wrap col-12">

<div class="add-edit-product-form">
    
        </div>
<form method="post" enctype="multipart/form-data">
        <h4 class="title">Slider 1</h4>

        <div class="product-upload-gallery row flex-wrap">
            <div class="col-12 mb-30">
                <p class="form-help-text mt-0">Upload Maximum 800 x 800 px & Max size 2mb.</p>
                <input class="file-pond" type="file" name='slider1'>
                <button class="button button-outline button-primary mb-10 ml-10 mr-0" name='slider1'>Update</button>
            </div>
        </div>
    </form>


    <form method="post" enctype="multipart/form-data">

        <h4 class="title">Slider 2</h4>

        <div class="product-upload-gallery row flex-wrap">
            <div class="col-12 mb-30">
                <p class="form-help-text mt-0">Upload Maximum 800 x 800 px & Max size 2mb.</p>
                <input class="file-pond" type="file" name='slider2'>
                <button class="button button-outline button-primary mb-10 ml-10 mr-0" name='slider2'>Update</button>
            </div>
        </div>
</form>


        <form method="post" enctype="multipart/form-data">

        <h4 class="title">Slider 3</h4>

        <div class="product-upload-gallery row flex-wrap">
            <div class="col-12 mb-30">
                <p class="form-help-text mt-0">Upload Maximum 800 x 800 px & Max size 2mb.</p>
                <input class="file-pond" type="file" name='slider3'>
                <button class="button button-outline button-primary mb-10 ml-10 mr-0" name='slider3'>Update</button>
            </div>
        </div>
</form>

        <!-- Button Group Start -->
        <div class="row">
            <div class="d-flex flex-wrap justify-content-end col mbn-10">
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
                    <p class="text-body-light">2023 &copy; <a href="http://silkygold.in/">Rosa Cosmetics</a></p>
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