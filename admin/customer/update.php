<?php

$id = $_GET['id'];
$id_status = $_GET['id_status'];

require '../connect.php';

$sql = "update bill set id_status = '$id_status' where id = '$id' ";

mysqli_query($connect , $sql); 


die("$sql");