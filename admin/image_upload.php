<?php
include("./include/db_conn.php");
include("./include/functions.php");
include("./include/constant.php");
if(isset($_POST['add_image'])){
    $images = $_FILES['images'];
    $id = $_POST['id'];

    $i = $_FILES['images']['name'];    
    $r = implode(",",$i);

    $num_of_img = count($images['name']);
    
    for ($i=0; $i <  $num_of_img ; $i++) { 
    $image_name = $images['name'][$i];
    $image_name_s = $images['name'][$i].',';
    $tmp_name = $images['tmp_name'][$i];
    $error = $images['error'][$i];
    if ($error === 0) {
        $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array('jpg','jpeg','png');

        if (in_array($img_ex_lc,$allowed_exs)) {
          

             move_uploaded_file($tmp_name,PRODUCT_IMAGE_SERVER_PATH.$image_name);
            header("Location:./product.php");

            
        }else {
            $er = "You can't upload files of this type";
            header("Location:./product.php?error=$er");
        }

    }else {
        $er = "Unknown Error Occurred while Uploading";
        header("Location:./product.php");
    }
}
if ($error === 0) { 
    $sql = "UPDATE `product` SET `a_image`='$r' WHERE id ='$id'";
    $result = mysqli_query($conn,$sql);
}
}
 ?>
