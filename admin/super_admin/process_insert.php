<?php

$name = $_POST['name'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$number_phone = $_POST['number_phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$level = $_POST['level'];

require '../connect.php';
if ($connect->connect_error) {
    echo "d";
    die("Connection failed: " . $connect->connect_error);
  }
$sql = "insert into admin(name, birthday , gender, address, number_phone, email,password, level)
values(' $name','$birthday','$gender','$address','$number_phone' ,'$email','$password','$level')";
//die($sql);

mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:index.php?success= Thêm thành công');