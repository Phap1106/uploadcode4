<?php

$name = $_POST['name'];
$description = $_POST['description'];
$images = $_FILES['images'];
$price = $_POST['price'];
$status = $_POST['status'];
$id_manufacturers = $_POST['id_manufacturers'];
$id_category = $_POST['id_category'];
$folder = '../images/';
$file_extension= explode('.' , $images['name']) [1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($images["tmp_name"] , $path_file);


require '../connect.php';
$sql = "insert into products(name, description , images, price, id_status, id_manufacturers,id_category)
values(' $name','$description','$file_name','$price','$status' ,'$id_manufacturers','$id_category')";


mysqli_query($connect, $sql);
mysqli_close($connect);