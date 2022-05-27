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
 admin.id,
 admin.name,
 SUM(if(DATE(created_at) = CURDATE(), 1, 0)) as 'today',
 SUM(if(DATE(created_at) >= CURDATE() - INTERVAL 30 DAY, 1, 0)) as '30_days',
 count(*) as tong
 from admin
 LEFT join bill
 on (
     admin.id = bill.id_admin
     and bill.id_status > 1
 )
 where 
 level = 0
 group by admin.id";
$result = mysqli_query($connect, $sql); 
?>

<table border="1" width="100%">

    <tr>
    
      <th  colspan="6"> 
        <h2>
          Thống kê số lượng đơn ADMIN đã duyệt 
        </h2>
      </th>
    </tr>       
    <tr>
        <th>
            Mã Admin
        </th>
        <th>
            Hôm nay 
        </th>
      <th>
     Tháng nay
      </th>
      <th>
          Tổng đơn đã duyệt
      </th>
    </tr>
    <?php   foreach ($result as $each) : ?>
    <tr>
        <th>
        <?php echo $each['id'] ?>
        </th>
        
        <th>
        <?php echo $each['today'] ?>
        </th>
        <th>
        <?php echo $each['30_days'] ?>
      </th>
      <th>
      <?php echo $each['tong'] ?>
      </th>
    </tr>
    <?php endforeach  ?>
     
    
     
</table>
  
</body>

</html>