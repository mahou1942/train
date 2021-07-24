<?php
 $mytitle="業務頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-storelogin.php','請先登錄後查看');
 }
    $user = $_SESSION['userInfo']['account'];
    $store_name = $_SESSION['userInfo']['store_name'];

    //新增商品
    $name = trim($_POST['name']);
    $money = trim($_POST['money']);

    $items_add = "INSERT INTO items VALUES(NULL, '$name', '$money', '$user','$store_name')";
?>


<div class="content" align="center">

	<h1 class="mytitle">新增商品</h1>

  <table class="boomer">
    <?php

      if(empty($name) || empty($money)){
        jump('./train-7-storeadd.php', '有數據未填，請重新修改');
      }

      if($sql->query($items_add) === TRUE){
        jump('./train-7-storeitems.php', '商品建立完成，跳轉到顯示頁面');
      }else{
        echo "Error:" . $items_add . "<br>" . $sql->error;
      }

    ?>

  </table>
</div>
<?php
  include "footer.php";
?>
