<?php
error_reporting(E_ERROR | E_PARSE);
require('./include/db_conn.php');
require('./include/functions.php');
$order_id = get_safe_value($conn,$_GET['id']);
if (isset($_POST['update_order_status'])) {
   $update_order_status = $_POST['update_order_status'];
   mysqli_query($conn , "update product_order set order_status='$update_order_status' where id='$order_id'");  
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
                        <h3>Order Master</h3>
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
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qunatity</th>
                                    <!-- <th>Payment Type</th>
                                    
                                    <th>Payment Status</th>
                                    <th>Order Status</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                               
                            //    $u_id = $_SESSION['USER_ID'];
                               $result = mysqli_query($conn, "SELECT distinct(order_details.id),order_details.*,product.name,product.image from order_details,product where order_details.order_id='$order_id' and order_details.product_id=product.id");
                               $total_price = 0;
                              
                        $i=1;
                      while ($row = mysqli_fetch_assoc($result)) {
                        $total_price = $total_price+($row['qty']*$row['price']);
                            echo "
                                <tr>
                                    <td>".$i."</td>
                                    <td><img class='img-responsive' src='".PRODUCT_IMAGE_SITE_PATH."".$row['image']."' height='100px' width='100px' alt=''></td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['price']."</td>
                                    <td>".$row['qty']."</td>
                                    
                                    <td class='action h4'>
                                        <div class='table-action-buttons'>
                                            <a class='delete button button-box button-xs button-danger' href='?type=delete&operation=active&id=".$row['id']."'><i class='zmdi zmdi-delete'></i></a>
                                        </div>
                                    </td>
                                </tr>
                                ";
                                $i++;
                            }
                            ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total Price</td>
                                    <td><?php $s = "SELECT * FROM `product_order` WHERE id='$order_id'";
                                  $res = mysqli_fetch_assoc(mysqli_query($conn,$s));
                                  echo "".$res['total_amount']."/- "; 
                                  if ($total_price != $res['total_amount']) {
                                    echo " (With Discount of ".$total_price-$res['total_amount']."/-)";
                                  }else {
                                    echo "";
                                  }
                                  
                                  ?></td>
                                </tr>
                            </tbody>
                        </table>


<?php
 $address = mysqli_fetch_assoc(mysqli_query($conn ,"SELECT * FROM `product_order` WHERE id =$order_id"));
 $status = $address['order_status'];
$order_status_arr = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `order_status` WHERE id =$status"));
echo"
                        <div class='container'>
                            <h2>Address</h2>
                            <p> ".$address['address']."</p>
                            <p> City : ".$address['city']."</p>
                            <p> Pincode : ".$address['pincode']."</p>
                            <h4>Order Status : ".$order_status_arr['name']."</h4>
                        </div>
                        ";
                        ?>
                        <div class="col-lg-2 col-2 mb-30">
                            <form method="post">
                            <label for="name"><b>Update Status </b></label> 
                <select class="form-control nice-select" name='update_order_status' required>
                    <option value="">Update Status</option>
                    <?php
                    $result = mysqli_query($conn,"SELECT * from  order_status");
                    while ($row = mysqli_fetch_assoc($result) ){
                        if ($row['id'] == $row_display['categories_id']) {
                            echo "
                        <option selected value='".$row['id']."'>".$row['name']."</option>
                        ";
                        }else {
                        echo "
                        <option value='".$row['id']."'>".$row['name']."</option>
                        ";
                        }
                    }
                    ?>
                </select>
                <div class="m-5">
                <button type="submit">Update</button>
                </div>

                            </form>
                        </div>
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