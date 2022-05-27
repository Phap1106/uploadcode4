<?php
 require '../connect.php';
$max_date = $_GET['days'];
 $sql = "SELECT
  products.id as 'ma_san_pham',
 products.name as 'ten_san_pham',
 data_format(time, '%e-%m') AS 'ngay',
 SUM(quantity) AS 'so_san_pham_ban_duoc'
FROM
 'bill'
JOIN bill_detail ON bill.id = bill_detail.id_bill
JOIN products ON products.id = bill_detail.id_product
WHERE DATA
 (time) >= CURDATE() - INTERVAL $max_date DAY
GROUP BY
 products.id, DATE_FORMAT(TIME, '%e-%m')";
  $result = mysqli_query($connect , $sql);
//echo json_encode($arr);
$arr=[];
$today = date('d');
if($today < $max_date){
  $get_day_last_month = $max_date - $today;
  $last_month = date('m' , strtotime( "-1 month"));
  $last_month_date = date('Y-m-d' , strtotime( "-1 month"));
  $max_day_last_month = (new DateTime($last_month_date )) -> format('t');
  $start_day_last_month = $max_day_last_month - $get_day_last_month;
 /* for($i = $start_day_last_month ;$i <= $max_day_last_month;$i++){
    $key = $i . '-' . $last_month;
    $arr[$key] = 0;
  } */
  $start_date_this_month = 1;
} else{
  $start_date_this_month = $today -  $max_date  ;
}

//$this_month = date('m');

/*for($i = $start_date_this_month ;$i <= $today;$i++){
  $key = $i . '-' . $this_month;
  $arr[$key] = 0;
}*/

$arr = [];
foreach($result as $each){
    $ma_san_pham = $each['ma_san_pham'];
     if(empty($arr[$ma_san_pham ])) { 
         $arr['ma_san_pham'] = [
        'name' => $each['ten_san_pham'],
        'y' => $each['so_san_pham_ban_duoc'],
        'drilldown' => (int)$each['ma_san_pham']
         ];
    }else{
        $arr[$ma_san_pham] ['y'] += $each['so_san_pham_ban_duoc'];
    }
  }

  $arr2 = [];
  foreach($ar as $ma_san_pham => $each){
      $arr2 ['ma_san_pham'] = [
          'name' =>$each['name'],
          'id' => $ma_san_pham,
      ];
      $arr2[$ma_san_pham]['data'] =[];
      if($today < $max_date){
          for($i = $start_date_this_month ; $i <= $max_day_last_month;$i++){
              $key = $i . '-' . $last_month;
              $arr2[$ma_san_pham]['data']['key'] = [
                  $key,
                  0
              ];
          }
      }
  }
  foreach($result as $each){
      $ma_san_pham = $each['ma_san_pham'];
      $key = $each['ngay'];
      $arr2[$ma_san_pham]['data']['key'] =[
        $key,
       (int) $each['so_san_pham_ban_duoc']
    ];
  }
  $Object = json_encode([$arr , $arr2] );
 echo json_encode($Object);