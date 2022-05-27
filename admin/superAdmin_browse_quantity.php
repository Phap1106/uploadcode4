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
          Hiện thị thống kê số lượng đơn ADMIN đã duyệt 
        </h2>
      </th>
    </tr>       
    <tr>
        <th>
            Mã Admin
        </th>
        <th>
          Tên Admin
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
      <th>
          KPI / Tháng
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
        <?php echo $each['today'] ?>
        </th>
        <th>
        <?php echo $each['30_days'] ?>
      </th>
      <th>
      <?php echo $each['tong'] ?>
      </th>
      <th>
         <?php 
            $a = $each['30_days'];
            if($a < "200"){
              echo "Chưa đạt";
            } else{
              echo "Đạt";
            }
         ?>
      </th>
    </tr>
    <?php endforeach  ?>
    
     <th  colspan="6"> 
        <h4>
          KPI / Tháng > 200 đơn : Đạt
          <br>
          KPI / Tháng < 200 đơn : Chưa đạt
        </h4>
      </th>
      
     </tr>
     
</table>
  
</body>

</html>