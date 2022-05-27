<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
<?php
  include '../menu.php';
  require '../connect.php';
//  $sql = "select * from manufacturers";
  $sql = "select products.*,manufacturers.name as name_manufacturers from products
  join manufacturers on manufacturers.id = products.id_manufacturers ";
  $result = mysqli_query($connect, $sql);

  ?>
  <h1>
  Quản lý sản phẩm
  </h1>
  <a href="form_insert.php">
    Thêm
  </a>
  <table border="1" width="100%">
    <tr>
      <th>Mã</th>
      <th>Tên Hãng </th>
      <th>Tên sản phẩm</th>
      <th>Nội dung </th>
      <th>Ảnh </th>
      <th>Giá </th>
      <th>Tình trạng</th>
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>                
    <?php   foreach ($result as $each) : ?> 
      <tr>
        <td><?php echo $each['id'] ?></td>
        <td><?php  echo $each['name_manufacturers'] ?></td>
        <td><?php echo $each['name'] ?>
        </td>
        <td><?php 
         echo $each['description']
         ?>
         </td> 
        <td>
            <img height ="100" src="../images/<?php echo $each['images'] ?>">
        </td>
        <td><?php 
         
        echo $each['price'] ?></td>
        
        <td>
          <?php 
       
          echo $each['id_status'] ?>
      </td>
      <td>
          <a href="form_update.php?id=<?php echo $each['id'] ?>">
            Sửa
          </a>
        </td>
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