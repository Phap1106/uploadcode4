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
   $sql = "select * from products
   where id = '$id' " ;
   $result  = mysqli_query($connect , $sql);
    $each = mysqli_fetch_array($result);

   $sql = "select * from manufacturers";
   $manufacturers = mysqli_query($connect, $sql);

//$each = mysqli_query($connect , $sql);

  //if($number_rows == 1){
 
   ?>

  <form action="process_update.php"  method="post" enctype="multipart/form-data">
   
  <input type="hidden" name="id" value="<?php echo $each['id']?>">

    Tên
    <input type="text" name ="name" value="<?php echo $each['name']?>">
    <br> <br>
    Nội dung
    <input type="text" name ="description" value="<?php echo $each['description']?>" >
    <br> <br>
Đổi ảnh mới
<input type="file" name="images_new" value="">
<br> <br>
Hoặc giữ ảnh cũ
<img src="../images/<?php echo $each['images']?>" height='100'>
<input type="hidden" name="images_old" value="<?php echo $each['images']?> ">
<br><br>
Giá
<input type="text"name ="price" value="<?php echo $each['price']?>" > 
<br> <br>
Tình trạng
<select name ="status" value="<?php echo $each['status']?>">
  <option value="1">Còn hàng </option>
  <option value="2">Hết hàng </option>
</select>
<br> <br>
Nhà sản xuất
<select name="id_manufacturers">
    <?php foreach($manufacturers as $manufacturer):?>
        <option 
        value ="<?php echo $manufacturer['id'] ?>"
        <?php if($each['id_manufacturers'] ==  $manufacturer['id']){ ?> 
          selected
          <?php }?>>
            <?php  echo $manufacturer['name']?>
            </option>
      <?php endforeach ?>
</select>
<br> <br>

<button>Sửa</button>

  </form>

</body>
</html>