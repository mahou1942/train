<?php
 $mytitle="業務頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-saleslogin.php','請先登錄後查看');
 }


    //新增帳號功能


    $acc_select = "SELECT * FROM sales WHERE account='$account'";
    $sales_add = "INSERT INTO order VALUES(NULL, '$account', '$password')";
?>


<div class="content" align="center">

	<h1 class="mytitle">功能頁面</h1>

  <table class="boomer">
    <?php
      mysqli_query($sql,$acc_select);
      if(empty($account) || empty($password) || empty($password1) ){
        jump('./train-7-salesuseradd.php', '有數據未填，請重新修改');
      }
      if($password != $password1){
        jump('./train-7-salesuseradd.php', '密碼輸入不一致，請重新修改');
      }
      if(mysqli_affected_rows($sql) > 0){
        jump('./train-7-salesuseradd.php', '輸入的帳號已經存在，請重新輸入');
      }else{
        if($sql->query($sales_add) === TRUE){
          jump('./train-7-storeuser.php', '建立完成，跳轉到顯示頁面');
        }else{
          echo "Error:" . $store_add . "<br>" . $sql->error;
        }
      }
    ?>

  </table>
</div>
<?php
  include "footer.php";
?>
