<?php
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$images_new = $_FILES['images_new'];
$price = $_POST['price'];
$id_status = $_POST['status'];
$id_manufacturers = $_POST['id_manufacturers'];

if($images_new['size'] > 0){
    $folder = 'images/';
    $file_extension= explode('.' , $images['name']) [1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;

    move_uploaded_file($images["tmp_name"] , $path_file);
} else{
    $file_name = $_POST['images_old'];
}

require '../connect.php';
$sql = "update products
set
name='$name'
description='$description'
images='$file_name'
price='$price'
id_status='$id_status'
id_manufacturers='$id_manufacturers'
where
id='$id';
";
//die("$sql");
mysqli_query($connect, $sql);
mysqli_close($connect);