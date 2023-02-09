<?php
error_reporting(E_ERROR | E_PARSE);
require('./include/db_conn.php');
require('./include/functions.php');
require('./include/constant.php');


$image_required = 'required';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $image_required = '';
$display_value = "SELECT * from product where id ='$id'";
$result_display = mysqli_query($conn,$display_value);
$row_display = mysqli_fetch_assoc($result_display);
}
if (isset($_POST['save'])) {
    $categories = get_safe_value($conn,$_POST['categories']);
    $name = get_safe_value($conn,$_POST['name']);
    $mrp = get_safe_value($conn,$_POST['mrp']);
    $selling_price = get_safe_value($conn,$_POST['selling_price']);
    $qty = get_safe_value($conn,$_POST['qty']);
    $short_desc = get_safe_value($conn,$_POST['short_desc']);
    $description = get_safe_value($conn,$_POST['description']);
    $meta_title = get_safe_value($conn,$_POST['meta_title']);
    $meta_desc = get_safe_value($conn,$_POST['meta_desc']);
    $meta_keywords = get_safe_value($conn,$_POST['meta_keywords']);
    $color = get_safe_value($conn,$_POST['color']);
    $size = get_safe_value($conn,$_POST['size']);
    $off = get_safe_value($conn,$_POST['off']);
    $brand = get_safe_value($conn,$_POST['brand']);
    $check_name_sql = "SELECT * from product where name='$name'";
    $check_query = mysqli_query($conn, $check_name_sql);
    $check_name_id = mysqli_fetch_assoc($check_query);
    $check_result = mysqli_num_rows($check_query);

    if ($check_result > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $id = $_GET['id'];
            $getData = $check_name_id['id'];
            if ($id == $getData) {
            }else {
                $error = "<div class='alert alert-danger' role='alert'>
        <strong>Oppsss!</strong> Product Name Alreday Exist
        <button class='close' data-dismiss='alert'><i class='zmdi zmdi-close'></i></button>
        </div>";
            }
        }
        else {
        $error = "<div class='alert alert-danger' role='alert'>
        <strong>Oppsss!</strong> Product Name Alreday Exist
        <button class='close' data-dismiss='alert'><i class='zmdi zmdi-close'></i></button>
        </div>";
        }
    }
    if($error == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if ($_FILES['image']['name'] == "") {
                $update_sql = "UPDATE `product` SET `categories_id`='
                $categories',`name`='$name',`mrp`='$mrp',`selling_price`='$selling_price',`qty`=' $qty',`short_desc`='$short_desc',`description`='$description',`meta_title`='$meta_title',`meta_desc`='$meta_desc',`meta_keywords`='$meta_keywords',`status`='1',`color`='$color',`brand`='$brand',`size`='$size',`off`='$off' WHERE id ='$id'";
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
    $update_sql = "UPDATE `product` SET `categories_id`='
    $categories',`name`='$name',`mrp`='$mrp',`selling_price`='$selling_price',`qty`=' $qty',`image`='$image',`short_desc`='$short_desc',`description`='$description',`meta_title`='$meta_title',`meta_desc`='$meta_desc',`meta_keywords`='$meta_keywords',`status`='1',`color`='$color',`brand`='$brand',`size`='$size',`off`='$off' WHERE id ='$id'";
    $result = mysqli_query($conn,$update_sql);
}
        }
        else {
                $image = rand (111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
    $insert_sql = "INSERT INTO `product`(`categories_id`, `name`, `mrp`, `selling_price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keywords`, `status`,`color`,`brand`,`size`,'off') VALUES ('$categories','$name','$mrp','$selling_price','$qty','$image','$short_desc','$description','$meta_title','$meta_desc','$meta_keywords','1','$color','$brand','$size','$off')";
    $result = mysqli_query($conn,$insert_sql);
    }
    header("location:./product.php");
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
        <form method="post" enctype="multipart/form-data">
            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">
                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Manage Product
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
        <h4 class="title">About Product</h4>
        <div class="row">
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Product Name</b></label>    
            <input class="form-control" id='name' name='name' type="text" value="<?php
            if (isset($_GET['id']) && $_GET['id'] != '') {
            echo $row_display['name'];
            } 
            ?>">
        </div>
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Product MRP</b></label>    
                <input class="form-control" type="text" name='mrp' value="<?php 
                if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['mrp']; 
                }
                ?>">
            </div>
            
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Product Selling Price</b></label>    
                <input class="form-control" type="text" name='selling_price' value="<?php 
                if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['selling_price']; 
                }
                ?>">
            </div>

            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Product Qty</b></label>    
                <input class="form-control" type="text" name='qty' value="<?php 
                if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['qty']; 
                }
                ?>">
            </div>
            
            <div class="col-12 mb-30">
            <label for="name"><b>Product Short Description</b></label> 
                <textarea class="form-control" name='short_desc'><?php
                if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['short_desc']; 
                }
                ?></textarea>
            </div>
            
            <div class="col-12 mb-30">
            <label for="name"><b>Product Description</b></label> 
                <textarea class="form-control" name='description' ><?php
                if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['description']; 
                }
                ?></textarea>
            </div>
           
            
            <div class="col-12 mb-30">
            <label for="name"><b>Product Meta Description</b></label> 
                <textarea class="form-control" name='meta_desc' ><?php
                if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['meta_desc']; 
                }
                ?></textarea>
            </div>
          
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Product Category </b></label> 
                <select class="form-control nice-select" name='categories' required>
                    <option value="">Select Categories</option>
                    <?php
                    $result = mysqli_query($conn,"SELECT id,categories from categories order by categories desc");
                    while ($row = mysqli_fetch_assoc($result) ){
                        if ($row['id'] == $row_display['categories_id']) {
                            echo "
                        <option selected value='".$row['id']."'>".$row['categories']."</option>
                        ";
                        }else {
                        echo "
                        <option value='".$row['id']."'>".$row['categories']."</option>
                        ";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Product Meta Title</b></label> 
                <input class="form-control" type="text" name='meta_title' value="<?php 
                 if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['meta_title']; 
                 }
                ?>">
            </div>
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Product Meta Keywords</b></label> 
                <input class="form-control" type="text" name='meta_keywords' value="<?php 
                 if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['meta_keywords'];
                 }
                ?>">
            </div>
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Product color</b></label> 
                <input class="form-control" type="text" name='color' value="<?php 
                 if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['color'];
                 }
                ?>">
            </div>
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Product Brnad</b></label> 
                <input class="form-control" type="text" name='brand' value="<?php 
                 if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['brand'];
                 }
                ?>">
            </div>
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Product size</b></label> 
                <input class="form-control" type="text" name='size' value="<?php 
                 if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['size'];
                 }
                ?>">
            </div>
            
            <div class="col-lg-6 col-12 mb-30">
            <label for="name"><b>Product Discount</b></label> 
                <input class="form-control" type="text" name='off' value="<?php 
                 if (isset($_GET['id']) && $_GET['id'] != '') {
                echo $row_display['off'];
                 }
                ?>">
            </div>
            
        </div>

        <h4 class="title">Main Image</h4>

        <div class="product-upload-gallery row flex-wrap">
            <div class="col-12 mb-30">
                <p class="form-help-text mt-0">Upload Maximum 800 x 800 px & Max size 2mb.</p>
                <input class="file-pond" type="file" name='image'  <?php echo $image_required; ?>>
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

<form method="post" action="image_upload.php" enctype="multipart/form-data">

<h4 class="title">Additional Product Images</h4>
        <div class="product-upload-gallery row flex-wrap">
            <div class="col-12 mb-30">
                <p class="form-help-text mt-0">Upload Only 2 Images.</p>
                <input class="file-pond" type="file" name='images[]' multiple required>
                <input type="hidden" name='id' value='<?php echo $row_display['id'];?>'>
                <button class="button button-outline button-primary mb-10 ml-10 mr-0" type="submit" name="add_image">Upload</button>
            </div>
        </div>
                </form>
                



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