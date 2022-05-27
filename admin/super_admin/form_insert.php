<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php  
    include'../menu.php';
    require '../connect.php';
    $sql = "select * from admin";
    $result = mysqli_query($connect, $sql);
    ?>

  <form action="process_insert.php"  method="post" enctype="multipart/form-data">
  <h1>Thêm admin</h1>

    <br>
    Tên
    <input type="text" name ="name">
<br>
Sinh nhật
<input type="date" name ="birthday">
<br>
Giới tính
<select name ="gender">
  <option value="1">Nam </option>
  <option value="2">Nữ </option>
  <option value="3">Khác </option>
</select>
<br>
Địa chỉ 
<input type="text" name ="address">
<br>
Số điện thoại
<input type="text" name ="number_phone">
<br>
Email
<input type="text" name ="email">
<br>
Mật khẩu
<input type="password" name ="password">
Level
<select name ="level">
  <option > 0 </option>
 
</select>
<button>Thêm</button>

  </form>
</body>
</html>