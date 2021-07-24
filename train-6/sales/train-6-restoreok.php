<?php
 $mytitle="業務頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-6-saleslogin.php','請先登錄後查看');
 }


    $re_storeaccount = trim($_POST['re_storeaccount']);
    $fun = trim($_POST['fun']);

    //刪除舊紀錄以及重新恢復帳號功能
    $delete = "DELETE FROM re_store WHERE re_account='$re_storeaccount'";
    $select = "SELECT * FROM re_store WHERE re_account='$re_storeaccount'";
    $sel_query = mysqli_query($sql,$select);
    $arr = mysqli_fetch_row($sel_query);
    $add = "INSERT INTO store VALUES (NULL, '$arr[1]', '$arr[2]', '$arr[3]', '$arr[4]', '$arr[5]')";

    $account = "SELECT * FROM store WHERE account='$re_storeaccount'";
    
?>


<div class="content" align="center">

	<h1 class="mytitle">功能頁面</h1>

  <table class="boomer">
    <?php
    if($fun == "1"){
      mysqli_query($sql,$account);
      if(mysqli_affected_rows($sql) >0){
        jump('./train-6-restore.php', '準備恢復的帳號已有重複，請重新選擇');
      }else{
        mysqli_query($sql,$add);
        mysqli_query($sql,$delete);
        jump('./train-6-storeuser.php', '恢復完成');
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
