<?php
require('./include/db_conn.php');
require('./include/functions.php');
if (isset($_POST['sign_in'])) {
     $username = get_safe_value($conn, $_POST['username']);
     $password = get_safe_value($conn, $_POST['password']);
     $sql ="SELECT * FROM `admin_user` WHERE username='$username' and password='$password'";
     $result = mysqli_query($conn,$sql);
     $count = mysqli_num_rows($result);
     if($count == 1){
        $_SESSION['ADMIN_LOGIN'] = 'yes';
        $_SESSION['ADMIN_USERNAME'] = $username;
        header('location:./index.php');
        die();
     }else {
        $error = "Please Enter Correct Login Details";
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
                                <h1>Sign in</h1>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>

                            <div class="login-register-form">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-12 mb-20"><input class="form-control" type="text" name='username' placeholder="User ID / Email" required></div>
                                        <div class="col-12 mb-20"><input class="form-control" type="password" name='password' placeholder="Password" required></div>
                                        <div class="col-12 mb-20"><label for="remember" class="adomx-checkbox-2"><input id="remember" type="checkbox"><i class="icon"></i>Remember.</label></div>
                                        <div class="col-12">
                                            <div class="row justify-content-between">
                                                <div class="col-auto mb-15"><a href="./forget_p.php">Forgot Password?</a></div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-10"><button name='sign_in' class="button button-primary button-outline">sign in</button></div>
                                        <?php
                                        echo " <div class='alert alert-danger' role='alert'>
                                        <strong>Oppsss!</strong> ".$error."
                                        <button class='close' data-dismiss='alert'><i class='zmdi zmdi-close'></i></button>
                                    </div>
                                ";
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="login-register-bg order-1 order-lg-2 col-lg-7 col-12">
                        <div class="content">
                            <h1>Sign in</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- Content Body End -->

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