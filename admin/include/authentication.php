<?php
require('./include/db_conn.php');
if (!isset($_POST['ADMIN_LOGIN']) && $_SESSION['ADMIN_USERNAME'] ==''){
    header('location:login.php');
    die();
}
?>