<?php
require('./include/db_conn.php');
require('./include/functions.php');

$reset = $_GET['id'];
if (isset($_POST['admin-reset'])) {
  $email = get_safe_value($conn, $_POST['email']);
  $password = get_safe_value($conn, $_POST['password']);
  $c_password = get_safe_value($conn, $_POST['c_password']);
  $sql ="SELECT * FROM `admin_user` WHERE username='$email' and reset_tokken='$reset'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  $id = $row['id'];
  $count = mysqli_num_rows($result);
  if($count == 1){
    if ($l_password == $c_l_password) {
    $sql = "UPDATE `admin_user` SET `password`='$password', `reset_tokken`='0' WHERE id='$id'";
    mysqli_query($conn,$sql);
     echo "<script>
    alert('Your Password is Changed, Now You can Login');
     window.location.href='http://localhost/rosecosmetics/admin';
     </script>";
    }
    else {
      echo "<script>alert('Password don't Matched.')</script>";
    }
     die();
  }else {
     echo "<script>alert('Please Enter Correct Email')</script>";
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
        <!-- Content Body Start -->
        <div class="content-body m-0 p-0">
            <div class="login-register-wrap">
                <div class="row">
                    <div class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12">
                        <div class="login-register-form-wrap">
                            <div class="content">
                                <h1>Reset Password</h1>
                            </div>
                            <div class="login-register-form">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-12 mb-20"><input class="form-control" type="email" name='email' placeholder="Email" required></div>                                        

                                        <div class="col-12 mb-20"><input class="form-control" type="password" name='password' placeholder="Password" required></div>

                                        <div class="col-12 mb-20"><input class="form-control" type="password" name='c_password' placeholder="Password" required></div>

                                        <div class="col-12 mt-10">
                                            <button name='admin-reset' type='submit' class="button button-primary button-outline">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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