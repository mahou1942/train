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

 $password = trim($_POST['password']);
 $password1 = trim($_POST['password1']);

 $up = "UPDATE store SET password = '$password' WHERE account='$user'";

?>


<div class="content" align="center">
	<h1 class="mytitle">店家帳號管理</h1>
  <table class="boomer">

    <?php
      mysqli_query($sql,$up);
      if(empty($password) || empty($password1)){
        jump('./train-7-storeuserupdate.php', '有數據未填，請重新修改');
      }
      if($password != $password1){
        jump('./train-7-storeuserupdate.php', '密碼輸入不一致，請重新修改');
      }

      if($sql->query($up) === TRUE){
        jump('./train-7-store.php', '修改完成，跳轉到顯示頁面');
      }else{
        echo "Error:" . $store_add . "<br>" . $sql->error;
      }

    ?>
  </table>
</div>
<?php
  include "footer.php";
?>
