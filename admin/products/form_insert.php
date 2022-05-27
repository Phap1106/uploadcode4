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
  include '../menu.php';
  require '../connect.php';
 // $sql = "select * from manufacturers";
   $sql = "select * from products";
  $result = mysqli_query($connect, $sql);
  ?>

<form action="process_insert.php"  method="post" enctype="multipart/form-data">
  Hãng sản xuất
    <select name="id_manufacturers">
        <?php foreach($result as $each) :  ?>
            <option value="<?php echo $each['id'] ?> ">
                <?php echo $each['name']?>
            </option>
        <?php endforeach ?>
    </select>
    <br> <br>
Thể loại
  <select name="id_category">
    <option value="1">Áo</option>
    <option value="2">Quần</option>
    <option value="3">Váy</option>
    <option value="4">Túi</option>
    <option value="5">Dày</option>
    <option value="6">Phụ kiện</option>
  </select>
    <br> <br>
    Tên
    <input type="text" name ="name_product">

    <br> <br>
    Nội dung
    <input type="text" name ="description">
   <br> <br>
Ảnh
<input type="file" name="images">
<br> <br>
Giá
<input type="text"name ="price">
<br> <br>
Tình trạng
<select name ="status">
  <option value="1">Còn hàng </option>
  <option value="2">Hết hàng </option>
</select>
<br> <br>
<button>Thêm</button>

  </form>

</body>
</html>