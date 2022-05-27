<?php
session_start();

$id = $_GET['id'];

if(!empty($_SESSION['cart'])){
    $_SESSION['cart'][$id]++;

}else{
    $_SESSION['cart'][$id] = 1;

}

header('location:cart.php');