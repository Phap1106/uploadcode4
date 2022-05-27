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
if(empty($_GET['id'])){
   header ('location:index.php?error= Phải điền mã để sửa ');
}
  $id = $_GET['id'];
   include '../menu.php';
   require  '../connect.php';
   $sql = "select * from manufacturers
   where id = '$id' " ;
   $result  = mysqli_query($connect , $sql);
   $number_rows = mysqli_num_rows($result);  
  if($number_rows == 1){
   $each = mysqli_fetch_array($result);
    ?>

  <form action="process_update.php"  method="post" >

    Tên
    <input type="text" name ="name" value="<?php echo $each['name']?>">
    <br> <br>
    Nội dung
    <input type="text" name ="description" value="<?php echo $each['description']?>" >
    <br> <br>
Ảnh
<input type="text" name="images" value="<?php echo $each['images']?>">
<br> <br>
Giá
<input type="text"name ="price" value="<?php echo $each['price']?>" > 
<br> <br>
Tình trạng
<input type="text"name ="status" value="<?php echo $each['status']?>" > 
<br> <br>
<button>Sửa</button>

  </form>
  <?php } else{ ?>
<h1>Không tìm thấy theo mã</h1>
    <?php }?>
</body>
</html>