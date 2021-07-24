<?php
 $mytitle="店鋪頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-storelogin.php','請先登錄後查看');
 }
    $user = $_SESSION['userInfo']['account'];
    $fun = $_POST['fun'];
?>


<div class="content" align="center">

	<h1 class="mytitle">新增商品</h1>

  <table class="boomer">
    <?php
    if($fun == 'update'){
      $id = $_POST['id'];
      $name = trim($_POST['name']);
      $money = trim($_POST['money']);
      $items_up = "UPDATE items SET name='$name', money='$money' WHERE id='$id'";
      if(empty($name) || empty($money)){
        jump('./train-7-storeadd.php', '有數據未填，請重新修改');
      }

      if($sql->query($items_up) === TRUE){
        jump('./train-7-storeitems.php', '商品修改完成，跳轉到顯示頁面');
      }else{
        echo "Error:" . $items_add . "<br>" . $sql->error;
      }
    }elseif($fun == 'delete'){
      $id = $_POST['id'];
      $items_dl = "DELETE FROM items WHERE id='$id'";
      if($sql->query($items_dl) === TRUE){
        jump('./train-7-storeitems.php', '刪除完成，跳回顯示頁面');
      } else{
        echo "Error:" . $items_dl . "<br>" . $sql->error;
      }
    }

    ?>

  </table>
</div>
<?php
  include "footer.php";
?>
