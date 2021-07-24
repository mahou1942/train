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

 $sal = "SELECT * FROM store WHERE account='$user'";
 $saln= mysqli_query($sql,$sal);

 $account = trim($_POST['account']);
 $name = trim($_POST['name']);

 $up = "UPDATE store SET store_name = '$name' WHERE account='$user'";

?>


<div class="content" align="center">
	<h1 class="mytitle">新增店家帳號</h1>
  <table class="boomer">

<?php
  if(empty($name)){
    jump('./train-7-storeupdate.php', '店鋪名空白，請重新修改');
  }

  if($sql->query($up) === TRUE){
    jump('./train-7-storeloginout.php', '修改完成，請重新登入');
  }else{
    echo "Error:" . $up . "<br>" . $sql->error;
  }
?>
  </table>
</div>
<?php
  include "footer.php";
?>
