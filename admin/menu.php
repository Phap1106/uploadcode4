<ul>
  <li>
    <a href = "../manufacturers"> 
     <h3>
       Quản lý nhà sản xuất
     </h3>
    </a>
  </li>
</ul>

<ul>
  <li>
    <a href = "../admin_browse_quantity.php"> 
     <h3>
       Thống kê nhà chế tạo(Admin)
     </h3>
    </a>
  </li>
</ul>


<ul>
  <li>
    <a href = "../products"> 
     <h3>
       Quản lý sản phẩm 
     </h3>
    </a>
  </li>
</ul>

<ul>
  <li>
    <a href="../customer">
      <h3>
        Quản lý khách hàng
      </h3>
    </a>
  </li>
</ul>

<ul>
  <li>
    <a href="../bill">
    <h3>
      Quản lý đơn hàng
    </h3>
    </a>
  </li>
</ul>

<ul>
  <li>
    <a href="../quantity_sales.php">
      <h3>
        Thống kê sản phẩm
      </h3>
  </li>
</ul>

<ul>
  <li>
    <a href="../superAdmin_browse_quantity.php">
      <h3>
        Thống kê nhà sản xuất(Supper Admin)
      </h3>
  </li>
</ul>
<ul>
  <li>
    <a href="../list_of_customers.php">
      <h3>
        Thông tin cá nhân của khách hàng
      </h3>
  </li>
</ul>

<ul>
  <li>
    <a href="../super_admin">
    <h3>
      Quản lý admin
    </h3>
    </a>
  </li>
</ul>

<?php  
    if ( isset ( $_GET['error'] ) ) {
      ?>
         <span style = 'color : red'>
             <?php echo $_GET['error']  ?>
         </span>
      <?php   
    }
    ?>

    <?php  
    if ( isset ( $_GET['success'] ) ) {
      ?>
         <span style = 'color : green'>
             <?php echo $_GET['success']  ?>
         </span>
      <?php   
    }
    ?>