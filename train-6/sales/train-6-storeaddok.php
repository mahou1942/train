<?php
 $mytitle="業務頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-6-saleslogin.php','請先登錄後查看');
 }

    $fun = trim($_POST['fun']);

    //新增帳號功能
    $user = trim($_POST['salesname']);
    $account = trim($_POST['account']);
    $password = trim($_POST['password']);
    $storename = trim($_POST['storename']);

    $acc_select = "SELECT * FROM store WHERE account='$account'";
    $store_add = "INSERT INTO store VALUES(NULL, '$account', '$password', '$user', '$storename', '0')";
?>


<div class="content" align="center">

	<h1 class="mytitle">功能頁面</h1>

  <table class="boomer">
    <?php
    if($fun == "added"){
      mysqli_query($sql,$acc_select);
      if(empty($account) || empty($password) || empty($storename) ){
        jump('./train-6-storeadd.php', '有數據未填，請重新修改');
      }
      if(mysqli_affected_rows($sql) > 0){
        jump('./train-6-storeadd.php', '輸入的帳號已經存在，請重新輸入');
      }else{
        if($sql->query($store_add) === TRUE){
          jump('./train-6-storeuser.php', '建立完成，跳轉到顯示頁面');
        }else{
          echo "Error:" . $store_add . "<br>" . $sql->error;
        }
      }
    }else{
      jump('./train-6-storeuser.php', '請選擇功能');
    }


    ?>

  </table>
</div>
<?php
  include "footer.php";
?>
