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

 $sql = " SELECT
products.id,
products.name,
(
SELECT
    IFNULL(SUM(quantity),
    0)
FROM
    bill_detail
JOIN bill ON bill.id = bill_detail.id_bill
WHERE
    bill_detail.id_product = products.id AND bill.id_status = 1
) AS quantity_sales
FROM
products
ORDER BY
quantity_sales
DESC
;";

$result = mysqli_query($connect, $sql); 
?>

  <h1>
  Thống kê số lượng bán
  </h1>

  <table border="1" width="100%">
    <tr>
      <th>Mã</th>
      <th>Tên sản phẩm</th>
      <th>Số lượng </th>
    </tr>                
    
<?php   foreach ($result as $each) : ?> 
  <tr>
    <td><?php echo $each['id'] ?></td>
    <td><?php echo $each['name'] ?>
    </td>
    <td><?php  echo $each['quantity_sales'] ?>
  </td>
  </tr>
<?php endforeach  ?>
  </table>

  <h1>
    
  </h1>
</body>

</html>

