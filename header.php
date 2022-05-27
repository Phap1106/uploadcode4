
    <!-- phần đầu -->
    <div id="header">

        <div class="menu_top">

            <div class="home">
                <caption>
                <a href="http://localhost/%C4%91%E1%BB%93%20%C3%A1n%20web%201/index.php">
                        SugarBaby
                </a>
            </caption>
            </div>

            
            <div class="account">
                <?php if(empty($_SESSION['id'])){ ?>
                <button class="outline" onclick="open_form_sign_in()">Đăng nhập</button>
                |
                <button class="outline" onclick="open_form_sign_up()">Đăng ký</button>
                    <?php  }else{ ?>
                <a style=" color :red;" href="http://localhost/%C4%91%E1%BB%93%20%C3%A1n%20web%201/sign_out.php">Đăng xuất</a>
                |
                <a href="http://localhost/%C4%91%E1%BB%93%20%C3%A1n%20web%201/main/customer/profile.php">
                    <?php echo $_SESSION['name'] ?>
                    <i class="ti-user profile_icon"></i>
                </a>
                <br>
                <a href="http://localhost/%C4%91%E1%BB%93%20%C3%A1n%20web%201/main/customer/cart.php">
                    Giỏ hàng
                    <i class="ti-shopping-cart-full profile_icon"></i>
                </a>
                <?php } ?>
            </div>
        </div>

        </div>

    </div>
