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
    $id_bill = $_GET['id']; 
    require '../connect.php';
    $sql = "select * from 
    bill_detail
    join products on products.id = bill_detail.id_product
    where id_bill = '$id_bill'";
    $result = mysqli_query($connect , $sql);

    $sum = 0 ;
  //  die("$sql");
    ?>
    <table border="1" width="100%">
        <tr>
            <th>Ảnh </th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th> 
            <th>Tổng tiền</th>           
        </tr>
        <?php foreach($result as $each):?>
            <tr>
                <td>
                    <img height='100' src="../images/<?php echo $each['images']?> ">
                </td>
                <td><?php echo $each['name']?></td>
                <td><?php echo $each['price']?></td>
                <td>
                <?php echo $each['quantity']?>
                </td>
                <td>
                    <?php 
                        $result = $each['price'] * $each['quantity'];
                        echo $result;
                        $sum += $result;
                    ?>
                </td>
            </tr>
         <?php endforeach ?>
    </table>
    <h1>
        Tổng tiền đơn này là <?php echo $sum ?>
    </h1>
</body>
</html>