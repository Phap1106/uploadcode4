<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<?php include('../../head.php') ?>
<body>
    <?php include('../../header.php') ?>
   
    
    <!-- phần bài đăng -->
    <div id="container" >
 <?php include('../../menu.php') ?>

 <div class="search_bar">
                <input type="search" name="search" id="search">
                <i class="icon_search ti-search"></i>
            </div>


<div class="box_2">
    <?php 
        include('../../connect.php');

        $category = "select * from category ";

        $print_category = mysqli_query($connect,$category);
        $id = $_GET['id'];
       
        $product = "select product.*, category.name as name_category, manufacture.name as name_manufacture from product 
        join category on category.id = product.id_category 
        join manufacture on manufacture.id = product.id_manufacture
         WHERE product.id = '$id'";

        $print_product = mysqli_query($connect,$product);
        $print = mysqli_fetch_array($print_product);
    ?>

    <?php foreach($print_category as $each){ ?>
    <div class="category">

        <a href="">
        <?php echo $each['name']  ?>
        </a>

    </div>
    <?php } ?>

</div>
<?php include('../../footer.php') ?>

        </div>
        <div class="box_product">
           <div class="img_product" >
                <img style="height: 500px; width: 400px" src="<?php echo $print['images'] ?>" alt="chắc ảnh lỗi rồi không sao cứ mua đi">

                <p style="font-size: 2.5em;">Giá: <?php  echo number_format( $print['price'] , 0, '', ',') ?> đ</p>
                <br>    
                <?php if(!empty($_SESSION['id'])){ ?>
                <div class="add_to_cart">
                    <button>Mua ngay</button>
                    <button onclick="location.href='add_to_cart.php?id=<?php echo $print['id'] ?>'">Thêm vào giỏ hàng</button>
                </div>
                <?php } ?>
           </div>
            <div class="description">
                <h1><?php echo $print['name'] ?></h1>
                <br>
                <p><?php echo $print['description'] ?></p>
            </div>
                
            
        </div>
    </div>          
</body>
</html>
