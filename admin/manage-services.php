<?php
error_reporting(E_ERROR | E_PARSE);
require('./include/db_conn.php');
require('./include/functions.php');
require('./include/constant.php');

$image_required = 'required';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $image_required = '';
$display_value = "SELECT * from services where id ='$id'";
$result_display = mysqli_query($conn,$display_value);
$row_display = mysqli_fetch_assoc($result_display);
}
if (isset($_POST['save'])) {
    $categories = get_safe_value($conn,$_POST['categories']);
    $name = get_safe_value($conn,$_POST['name']);
    $short_desc = get_safe_value($conn,$_POST['short_desc']);
    $long_desc = get_safe_value($conn,$_POST['long_desc']);
    $date = get_safe_value($conn,$_POST['date']);
    
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if ($_FILES['image']['name'] == "") {
                $update_sql = "UPDATE `services` SET `name`='$name',`short_desc`='$short_desc',`long_desc`='$long_desc' WHERE id ='$id'";
                $result = mysqli_query($conn,$update_sql);
            }
            if ($_FILES['image']['name'] != "") {
                if (($_FILES['image']['type'] !='image/png' && $_FILES['image']['type'] !='image/jpg'&& $_FILES['image']['type'] !='image/jpeg')) {
                    $error = "<div class='alert alert-danger' role='alert'>
                    <strong>Oppsss!</strong> Please select only png,jpg and jpeg Image Formate Files.
                    <button class='close' data-dismiss='alert'><i class='zmdi zmdi-close'></i></button>
                    </div>";
                }
                $image = rand (111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
    $update_sql = "UPDATE `services` SET `image`='$image',`name`='$name',`short_desc`='$short_desc',`long_desc`='$long_desc' WHERE id ='$id'";;
    $result = mysqli_query($conn,$update_sql);
}
}     
        else {
                $image = rand (111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
    $insert_sql = "INSERT INTO `services`( `name`, `image`, `short_desc`, `long_desc`, `status`, `added_on`) VALUES ('$name','$image','$short_desc','$long_desc','1','$date')";
    $result = mysqli_query($conn,$insert_sql);
    }
    header("location:./services.php");
    die();
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
    <script src="./ckeditor/ckeditor.js"></script>
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
                        <h3>Manage Blog
                        <span></span></h3>
                    </div>
                    </div><!-- Page Heading End -->
                     <!-- Page Button Group Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="buttons-group">
                        <button class="button button-outline button-primary" name='save'>Save</button>
                    </div>
                    <?php
                         echo $error ; 
                    ?>
                </div><!-- Page Button Group End -->
            </div><!-- Page Headings End -->
             <!-- Add or Edit Product Start -->
          <!-- Add or Edit Product Start -->
          <div class="add-edit-product-wrap col-12">
<div class="add-edit-product-form">
        <h4 class="title">About Service</h4>
        <div class="row">
            <div class="col-lg-6 col-12 mb-30">
            <label for="title"><b>Name</b></label>    
            <input class="form-control" id='title' name='name' type="text" value="<?php
            if (isset($_GET['id']) && $_GET['id'] != '') {
            echo $row_display['name'];
            } 
            ?>">
        </div>
            
             
            <div class="col-12 mb-30">
            <label for="name"><b> Short Description</b></label> 
                <textarea class="form-control" name='short_desc'><?php
                if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['short_desc']; 
                }
                ?></textarea>
            </div>
            
            <div class="col-12 mb-30">
            <label for="name"><b> Description</b></label> 
                <textarea class="form-control" id="description" name='long_desc' ><?php
                if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['long_desc']; 
                }
                ?></textarea>
            </div> 
            
        </div>
        <h4 class="title"> Feature Gallery</h4>
        <div class="product-upload-gallery row flex-wrap">
            <div class="col-12 mb-30">
                <p class="form-help-text mt-0">Upload Maximum 800 x 800 px & Max size 2mb.</p>
                <input class="file-pond" type="file" name='image' multiples <?php echo $image_required; ?>>
            </div>
        </div>
        
        <!-- Button Group Start -->
        <div class="row">
            <div class="d-flex flex-wrap justify-content-end col mbn-10">
                <button class="button button-outline button-primary mb-10 ml-10 mr-0" name='save' >Save</button>
            </div>
            <?php
            echo $error;
            ?>
        </div><!-- Button Group End -->

    </form>
</div>

</div><!-- Add or Edit Product End -->


<script>
    CKEDITOR.replace('description');

</script>
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