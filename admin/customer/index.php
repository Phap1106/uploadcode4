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
    require '../connect.php';
    $sql = "select 
    bill.*,
    customer.name,
    customer.gender,
    customer.address,
    customer.number_phone
    from bill
    join customer
    on customer.id = bill.id_customer";
    $result = mysqli_query($connect , $sql);
  
    ?>
    <table border="1" width="100%">
        <tr>
            <th>Mã </th>
            <th>Thời gian đặt hàng</th>
            <th>Thông tin người nhận</th>
            <th>Thông tin người đặt</th>
            <th>Ghi nhớ</th>
            <th>Trạng thái giao hàng</th>
            <th>Tổng tiền</th>
            <th>Xem</th>
            <th>Tình trạng</th>
            <th>Sửa</th>
        </tr>



    <?php   
  //if (is_array($result)) {
      
    foreach ($result as $each) : ?> 
      <tr>
        <td><?php echo $each['id'] ?></td>
        <td><?php echo $each['created_at'] ?></td>
        <td>
        <?php echo $each['name_receiver'] ?><br>
        <?php echo $each['number_phone_receiver'] ?><br>
        <?php echo $each['address_receiver'] ?>
        </td>
        <td>
            <?php echo $each['name'] ?><br>
            <?php echo $each['number_phone'] ?><br>
            <?php echo $each['address'] ?><br>
        </td>
        <td>
        <?php echo $each['notes'] ?>
        </td>
         <td>
                <?php 
                    switch($each ['id_status']){
                        case'1' :
                            echo"Đang chờ";
                            break;
                        case'2' :
                            echo"Đang giao hàng";
                               break;
                        case'3' :
                            echo"Giao thành công";
                             break;
                        case'4' :
                            echo"Đã hủy";
                             break;
                    }
                ?>
            </td>
            <td>
            <?php echo $each['total_price'] ?>
            </td>
            <td>
                <a href="detail.php?id=<?php echo $each['id'] ?>">
                    Xem
                </a>
            </td>
            <td>
            <?php 
                    switch($each ['id_status']){
                        case'1' :
                            echo"Duyệt";
                            break;
                        case'2' :
                            echo"Chưa duyệt";
                               break;
                    }
                ?>
            </td>
            <td>
                <a href="update.php?id=<?php echo $each['id'] ?>&status=1 ">
                    Duyệt
                </a>
                <a href="update.php?id=<?php echo $each['id'] ?>&status=2 ">
                    Hủy
                </a>
            </td>
      </tr>
    
       <?php endforeach ?>  
                <?php   ?>
    </table>
</body>
</html>