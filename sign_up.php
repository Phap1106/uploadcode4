<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$number_phone = $_POST['number_phone'];
$adress = $_POST['adress'];


require 'connect.php';

$sql = "select count(*) from customer
where email = '$email'";

$result = mysqli_query($connect,$sql);
$num_row = mysqli_num_rows($result)['count(*)'];
if( $num_row == 1){
    header('location:index.php');
    exit;
}

$sql = "insert into customer(name,email,password,gender,birthday,number_phone,adress)
values('$name','$email','$password','$gender','$birthday','$number_phone','$adress')";

mysqli_query($connect,$sql);


$sql = "select id from customer
where email = '$email'";
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];

session_start();
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $token = uniqid('user_',true);
        $sql = "update custumer
        set
        token = '$token'
        where
        id = '$id'";
        mysqli_query($connect,$sql);

        setcookie('remember',$token,time() + 60*60*24*30);


    header('location:index.php');
mysqli_close($connect);