<?php
error_reporting(E_ERROR | E_PARSE);
require('./include/db_conn.php');
require('./include/functions.php');
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($conn,$_GET['id']);
    $sql = "SELECT * FROM `discount` WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $check = mysqli_num_rows($result);
    if ($check == 1) {
        
    $row = mysqli_fetch_assoc($result);   
    }else {
        header("location:./discount.php");
        die();
    }
    }
if (isset($_POST['submit'])) {
    print_r($_POST);
    $code = get_safe_value($conn,$_POST['code']);
    $amount = get_safe_value($conn,$_POST['amount']);
    $post_id = get_safe_value($conn,$_POST['post_id']);
    $exist_sql ="SELECT * FROM `discount` WHERE code='$code' AND amount='$amount'";
    $result = mysqli_query($conn , $exist_sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($result);
            if ($id == $getData['id']) {
            }else {
                $error = "<div class='alert alert-danger' role='alert'>
        <strong>Oppsss!</strong> Discount Name Alreday Exist
        <button class='close' data-dismiss='alert'><i class='zmdi zmdi-close'></i></button>
                                    </div>";
            }
        }
        else {
        $error = "<div class='alert alert-danger' role='alert'>
        <strong>Oppsss!</strong> Discount Name Alreday Exist
        <button class='close' data-dismiss='alert'><i class='zmdi zmdi-close'></i></button>
                                    </div>";
        }
    }
    if($error == '') {
    $sql = "UPDATE `discount` SET `code`='$code',`amount`='$amount' WHERE id=$post_id";
    $result = mysqli_query($conn,$sql);
    // print_r($result);
    header("location:./discount.php");
    die();
    }
}
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
            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">
                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Update Discount<span></span></h3>
                    </div>
                </div><!-- Page Heading End -->
            </div><!-- Page Headings End -->
             <!-- Add or Edit Product Start -->
             <div class="add-edit-product-wrap col-12">
<div class="add-edit-product-form">
    <form method='POST'>
        <h4 class="title">Update Discount</h4>
        <div class="row">
            <div class="col-lg-6 col-12 mb-30">
                <input type="text" class='form-control' name="code" placeholder="Discount Name" required value='<?php echo $row['code']; ?>'>
                <input type="text" class='form-control' name="amount" placeholder="Discount Amount" required value='<?php echo $row['amount']; ?>'>
                <input type="hidden" class='form-control' name="post_id" placeholder="Discount" required value='<?php echo $row['id']; ?>'>
                <button class="button button-outline button-primary mt-5" type="submit" name="submit" > Update Discount</button>
                <?php
                echo $error;
                ?>
            </div>
        </div>
    </form>
</div>
</div>
<

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