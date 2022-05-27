<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>
    Đây là khu vực nhà sản xuất
  </h1>
  <a href="form_insert.php">
    Thêm
  </a>
  <?php
  include '../menu.php';
  ?>
  <?php
  require '../connect.php';
  $sql = "select * from manufacturers";
  $result = mysqli_query($connect, $sql);
  ?>
  
  <table border="1" width="100%">
    <tr>
      <th>Mã</th>
      <th>Tên hãng</th>
      <th>Xóa</th>
    </tr>                
    <?php foreach ($result as $each) : ?>
      <tr>
        <td><?php echo $each['id'] ?></td>
        <td><?php echo $each['name'] ?></td>
       
        <td>
          <a href="delete.php?id=<?php echo $each['id'] ?>">
            Xóa
          </a>
        </td>
      </tr>
    <?php endforeach  ?>
  </table>
</body>

</html>