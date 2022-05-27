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

 $sql = "SELECT
customer.id,
customer.name,
customer.address,
customer.number_phone,
customer.email,
count(*) as tong
FROM customer
group by customer.id";
$result = mysqli_query($connect, $sql); 
?>

<table border="1" width="100%">
    <tr>
        <th>
            ID
        </th>
        <th>
            Tên khách hàng
        </th>
        <th>
            Địa chỉ
        </th>
        <th>
            Số điện thoại
        </th>
        <th>
            Email
        </th>
        <th>
            Đã mua 
        </th>
        <th>
            Tổng tiền 
        </th>
    </tr>
    <?php   foreach ($result as $each) : ?>
    <tr>
        <th>
        <?php echo $each['id'] ?>
        </th>
        <th>
        <?php echo $each['name'] ?>
        </th>
        <th>
        <?php echo $each['address'] ?>
        </th>
        <th>
        <?php echo $each['number_phone'] ?>
      </th>
      <th>
      <?php echo $each['email'] ?>
      </th>
      <th>
         <?php echo $each['tong'] ?>
      </th>
    </tr>
    <?php endforeach  ?>
    
</table>
</body>

</html>