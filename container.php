
    <div id="container" >
<?php include 'menu.php' ?>

<div class="search_bar">
                <input type="search" name="search" id="search">
                <i class="icon_search ti-search"></i>
            </div>


<div class="box_2">
    <?php 
        include('connect.php');

        $category = "select * from category ";

        $print_category = mysqli_query($connect,$category);
        
        $product = "select * from product";

        $print_product = mysqli_query($connect,$product);
    ?>

    <?php foreach($print_category as $each){ ?>
    <div class="category">

        <a href="">
        <?php echo $each['name']  ?>
        </a>

    </div>
    <?php } ?>

</div>
<?php include('footer.php') ?>

</div>
 <div class="box_3">

        <?php foreach($print_product as $eachh){ ?>
     <div class="product">
         <a href="http://localhost/%C4%91%E1%BB%93%20%C3%A1n%20web%201/main/product/index.php?id=<?php echo $eachh['id'] ?>">
             
            <img  src="<?php echo $eachh['images'] ?>" alt="chắc ảnh lỗi rồi không sao cứ mua đi" class="img_product">
            <h2><?php echo $eachh['name'] ?></h2>
            <p>Giá: <?php  echo number_format( $eachh['price'] , 0, '', ',') ?> đ</p>


         </a>
     </div>

            <?php } ?>

 </div>
 
</div>        

                    <!-- đăng nhập -->

        <div class="sign_in">
  
    <div class="form_sign_in">
  <button class="btn_close js_close" onclick="close_form()">X</button>
<form action="sign_in.php" method="post">
        <table cellpadding ="5" align = "center">
            <tr>
                <th colspan = "2">ĐĂNG NHẬP</th>
            </tr>
            <tr>
                <td style="width:30%;"> Email </td>
                <td>
                    <input type="email" name="email" size="30" placeholder ="Email đăng nhập">
                </td>
            </tr>
            <tr>
                <td> Mật khẩu</td>
                <td>
                    <input type="password" name="password" size="30" placeholder="Mật khẩu">
                </td>
            </tr>
        <tr> 
                <td colspan = "2" align="center">
                    &nbsp;
                    Ghi nhớ đăng nhập<input type="checkbox" name="remember">
                    <br>
                    <button>Đăng nhập</button>
                    <br>
                    <br>
                    <a href="">Quên mật khẩu?</a>
                    <br>
                    <br>
                    Bạn chưa có tài khoản? <button onclick="open_form_sign_up(), close_form()">Đăng ký</button>   
                </td>
            </tr>
        </table>
</form>

</div>

        </div>

            <!--đăng ký -->

        <div class="sign_up">
                
<div class="form_sign_up">

<button class="btn_close js_close" onclick="close_form_sign_up()">X</button>
<form action="sign_up.php" method="post">
        <table  cellpadding ="5" align = "center">
            <?php if(isset($_GET['erorr'])){
                echo $_GET['erorr'];
            } ?>
            <tr>
                <th colspan = "2"> ĐĂNG KÝ</th>
            </tr>
            <tr>
                <td> Tên của bạn </td>
                <td>
                    <input type="text " name="name" size="30" placeholder ="Tên của bạn">
                </td>
            </tr>
            <tr>
                <td> Email </td>
                <td>
                    <input type="text " name="email" size="30" placeholder ="Email đăng nhập">
                </td>
            </tr>
            <tr>
                <td> Mật khẩu</td>
                <td>
                    <input type="password" name="password" size="30" placeholder="Mật khẩu">
                </td>
            </tr>                   
            <tr>
                <td>Giới tính</td>
                <td>
                    <label>
                        <input type="radio" name="gender" id="boy" value="Nam">Nam
                    </label>
                    <label>
                        <input type="radio" name ="gender" id="nu" value="Nữ">Nữ
                    </label>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td>
                <input type="date" id="birthday" name="birthday">
                </td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td>
                    <input type="number" name="number_phone" size="30" placeholder ="">
                </td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td>
                    <input type="text" name="adress" >
                </td>
            </tr>
            <tr>
                <td colspan = "2" align="center">
                    &nbsp;
                    <button type="submit">Đăng ký</button>
                    <br>
                    <br>
                    Bản đã có tài khoản? <button onclick="open_form_sign_in(), close_form_sign_up()">Đăng nhập</button>
                </td>
            </tr>

        </table>

</form>

</div>  
        </div>