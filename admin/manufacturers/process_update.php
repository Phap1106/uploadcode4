<?php

if(empty($_POST['id'])){
   header('location:index.php?error= Phải truyền mã để sửa');
  exit;
}
$id = $_POST['id'];
if (empty($_POST['name']) || empty($_POST['discription'])   || empty($_POST['images']) ||  empty($_POST['price']) || empty($_POST['status'])) {
  header("location:form_update.php?id=$id&error=Phải điền đủ thông tin");
  exit;
}
$name = $_POST['id'];
$name = $_POST['name'];
$disciption = $_POST['disciption'];
$images = $_POST['images'];
$price = $_POST['price'];
$status = $_POST['status'];

require '../connect.php ';
$sql = "update manufacturers
set
disciption = '$disciption',
images = '$images',
price = '$price',
status = '$status',
where id = '$id',
";

mysqli_query($connect , $sql);
$error = mysqli_error($connect);

mysqli_close($connect);
if(empty($error)){
header('location:index.php?success= Sửa thành công');
} else{
   header("location:form_update.php?id = $id & error=Lỗi truy vẫn");
} 