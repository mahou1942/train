<?php
 $mytitle="用戶頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-userlogin.php','請先登錄後查看');
 }
    $user = $_SESSION['userInfo']['namekey'];
    $cus = "SELECT * FROM customer WHERE namekey='$user'";

    $row = mysqli_fetch_assoc(mysqli_query($sql,$cus));
    //新增商品
    $itemname = trim($_POST['itemname']);
    $storename = trim($_POST['storename']);
    $username = trim($_POST['username']);
    $itemmoney = trim($_POST['itemmoney']);
    $num = trim($_POST['num']);
    $phone = $row['phone'];
    $addr = $row['address'];
    $date = date("Y-m-d");


    $order_add = "INSERT INTO `order`(`id`,`item_name`, `store_name`, `customer_name`, `customer_phone`, `customer_address`, `num`, `num_money`, `order_date`)
    VALUES(NULL, '$itemname', '$storename', '$username','$phone','$addr','$num','$itemmoney', '$date')";
?>


<div class="content" align="center">

	<h1 class="mytitle">新增訂購單</h1>

  <table class="boomer">
    <?php

      if(empty($num)){
        jump('./train-7-itemorder.php', '訂購數量未填，請重新修改');
      }

      if($sql->query($order_add) === TRUE){
        jump('./train-7-itemslist.php', '訂購單建立完成，跳轉到顯示頁面');
      }else{
        echo "Error:" . $order_add . "<br>" . $sql->error;
      }

    ?>

  </table>
</div>
<?php
  include "footer.php";
?>
