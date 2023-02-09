<?php
session_start();
$conn = mysqli_connect("localhost","root","","mrashwani_admin");
if (!$conn) {
    echo "error";
}
?>
