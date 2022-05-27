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
  $sql = "SELECT * 
/*  admin.id,
  admin.name,
  admin.email
  */
  from admin
  WHERE LEVEL = 0 ";
  $result = mysqli_query($connect, $sql);

  ?>
  <h1>
  Quản lý Admin
  </h1>
  <h3>
    <button>
  <a href="form_insert.php">
    Thêm Admin
  </a>
</button>
</h3>
  <table border="1" width="100%">
    <tr>
      <th>Mã</th>
      <th>Tên  </th>
      <th>Xóa</th>
    </tr>                
    <?php   foreach ($result as $each) : ?> 
      <tr>
        <td>
            <?php echo $each['id'] ?>
        </td>
        <td>
            <?php echo $each['name'] ?>
        </td>
        <td>
          <a href="delete.php?id=<?php echo $each['id'] ?>">
            Xóa
          </a>
        </td>
        <?php endforeach  ?>
      </tr>
    
  </table>
</body>

</html>