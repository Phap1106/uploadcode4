<?php

$name = $_POST['name'];

require '../connect.php ';
if ($connect->connect_error) {
  echo "d";
  die("Connection failed: " . $connect->connect_error);
}
$sql = "insert into manufacturers(name)
values('$name')";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location:index.php?success= Thêm thành công');