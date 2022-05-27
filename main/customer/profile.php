<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<?php include('../../head.php') ?>
<body>
    <?php include('../../header.php') ?>
   
    
    <!-- phần bài đăng -->
    <div id="container" >
 <?php include('../../menu.php') ?>
        <div class="profile">
            <div class="update_profile">
               <button class="" onclick="open_form_update()">Sửa</button>
            </div>
            <!--     -->

            <?php 
            $id = 
                include('../../connect.php');
                $token = $_COOKIE['remember'];
                $sql = "select * from customer
                        where token = '$token'";
                $print = mysqli_query($connect,$sql);
                $profile = mysqli_fetch_array($print)
            ?>

            <!--    -->
            <table class="table_profile">
                        <p>Hồ sơ cá nhân</p>
                <tr>
                    <td style="width:30%; height: 30px">
                        Tên của bạn
                    </td>
                    <td>
                        <?php echo $profile['name'] ?>
                    </td>
                </tr>
                <tr>
                    <td style="width:30%; height: 30px">
                        Ngày sinh
                    </td>
                    <td>
                        <?php echo $profile['birthday'] ?>
                    </td>
                </tr>
                <tr>
                    <td style="width:30%; height: 30px">
                     Giới tính
                    </td>
                    <td>
                        <?php echo $profile['gender'] ?>
                    </td>
                </tr>
                <tr>
                    <td style="width:30%; height: 30px">
                        Số điện thoại
                    </td>
                    <td>
                        <?php echo $profile['number_phone'] ?>
                    </td>
                </tr>
                <tr>
                    <td style="width:30%; height: 30px">
                        Địa chỉ
                    </td>
                    <td>
                        <?php echo $profile['adress'] ?>
                    </td>
                </tr>
                <tr>
                    <td style="width:30%; height: 30px">
                        Email
                    </td>
                    <td>
                        <?php echo $profile['email'] ?>
                    </td>
                </tr>
               
            </table>
        </div>
</div>
        <div class="update">
       
        <div class="form_update_profile">
 <button class="btn_close js_close" onclick="close_form_update   ()">X</button>
<form action="update_profile.php" method="post">
      <table>
              <p>>Bạn muốn thay đổi hồ sơ của mình à?<</p>
          <tr>
              <td style="width: 30%; height:50px">
                  Tên của bạn
              </td>
              <td>
                  <input type="text" name="name">
              </td>
          </tr>
          <tr>
              <td style="width: 30%; height:50px">
                  Ngày sinh
              </td>
              <td>
                  <input type="date" name="birthday">
              </td>
          </tr>
          <tr>
              <td style="width: 30%; height:50px">
                  Giới tính
              </td>
              <td>
                  <input type="radio" name="gender" checked>Nam
                  <input type="radio" name="gender" >Nữ
              </td>
          </tr>
          <tr>
              <td style="width: 30%; height:50px">
                  Số điện thoại
              </td>
              <td>
                  <input type="number" name="number_phone">
              </td>
          </tr>
          <tr>
              <td style="width: 30%; height:50px">
                  Địa chỉ 
              </td>
              <td>
                  <input type="text" name="adress">
              </td>
          </tr>
          <tr>
              <td style="width: 30%; height:50px">
                  Email
              </td>
              <td>
                  <input type="email" name="email">
              </td>
          </tr>
          <tr>
              <td style="width: 30%; height:50px">
                  Mật khẩu
              </td>
              <td>
                  <input type="password" name="password">
              </td>
              
          </tr>                
              
      </table>
              <button>Cập nhật</button>
</form>

</div>
        </div>
    

    
    </div>
    
</body>
</html>