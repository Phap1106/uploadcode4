<?php
 require '../connect.php';
$max_date = $_GET['days'];
 $sql = "select
  DATA_FORMAT(time , '%e-%m')  as 'ngay', 
 sum(total_price) as 'doanh_thu' 
  from 'bill' 
  where date(time) >= curdate() - interval $max_date DAY
  group by DATA_FORMAT(time , '%e-%m'); ";
  $result = mysqli_query($connect , $sql);
//echo json_encode($arr);

$arr=[];
$today = date('d');
if($today < $max_date){
  $get_day_last_month = 
  $last_month = date('m' , strtotime( "-1 month"));
  $last_month_date = date('Y-m-d' , strtotime( "-1 month"));
  $max_day_last_month = (new DateTime($last_month_date )) -> format('t');
  $start_day_last_month = $max_day_last_month - $get_day_last_month;
  for($i = $start_day_last_month ;$i <= $max_day_last_month;$i++){
    $key = $i . '-' . $last_month;
    $arr[$key] = 0;
  }
  $start_date_this_month = 1;
} else{
  $start_date_this_month = $today -  $max_date  ;
}

$this_month = date('m');

for($i = $start_date_this_month ;$i <= $today;$i++){
  $key = $i . '-' . $this_month;
  $arr[$key] = 0;
}
foreach($result as $each){
  $arr[$each['ngay'] ] = (float)$each['doanh_thu'];
 }
 echo json_encode($arr);