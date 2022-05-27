<?php  
     session_start();
    if(isset($_COOKIE['remember'])){
            $token = $_COOKIE['remember'];
            require './connect.php';
            $sql = "select * from customer
            where token = '$token'
            limit 1";
            $redult = mysqli_query($connect,$sql);
            $each = mysqli_fetch_array($redult);
           
            $_SESSION['id'] = $each['id'];
            $_SESSION['name'] = $each['name'];

    }

?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php') ?>
<body>
    <!-- phần menu -->

    <?php include('header.php') ?>
   
    <!-- phần bài đăng -->
   
    <?php include('container.php') ?>
   
    <!-- phần chân web -->

    

</body>
</html>