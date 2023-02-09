<?php
error_reporting(E_ERROR | E_PARSE);
require('./include/db_conn.php');
require('./include/functions.php');


if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = get_safe_value($conn,$_GET['type']);

    if ($type == 'delete') {
        $id = get_safe_value($conn,$_GET['id']);
        $delete = "DELETE FROM `services` WHERE id = '$id'"; 
        mysqli_query($conn, $delete);
    }
}


$sql = "SELECT * FROM `services`";
$result = mysqli_query($conn,$sql);
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
                        <h3>Service </h3>
                        <a class="button button-outline button-primary mt-5" href='./manage-services.php'>Add Service</a>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">

                <!--Order List Start-->
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-vertical-middle">
                            <thead>
                                <tr>
                                
                                    <th>S.No.</th>
                                    <th>Image</th>
                                    <th>Service Name</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <tr>
                                    <td>".$i."</td>
                                    <td>
                                    <img src='".PRODUCT_IMAGE_SITE_PATH."".$row['image']."' alt='' height='100px' width='100px' >
                                    </td>
                                    <td>".$row['name']."</td>
                                    <td class='action h4'>
                                        <div class='table-action-buttons'>
                                            <a class='edit button button-box button-xs button-info' href='./manage-services.php?id=".$row['id']."'><i class='zmdi zmdi-edit'></i></a>
                                            <a class='delete button button-box button-xs button-danger' href='?type=delete&operation=active&id=".$row['id']."'><i class='zmdi zmdi-delete'></i></a>
                                        </div>
                                    </td>
                                </tr>
                                ";
                                $i++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Order List End-->

            </div>

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

