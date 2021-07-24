<?php
 $mytitle="業務頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-saleslogin.php','請先登錄後查看');
 }


    $storeaccount = trim($_POST['storeaccount']);
    $fun = trim($_POST['fun']);

    //啟用/停用 使用的功能
    $up = "UPDATE store SET enable='$fun' WHERE account='$storeaccount'";

    //刪除以及重新紀錄的功能
    $delete = "DELETE FROM store WHERE account='$storeaccount'";
    $re_select = "SELECT * FROM store WHERE account='$storeaccount'";
    $re_sel_query = mysqli_query($sql,$re_select);
    $re_arr = mysqli_fetch_row($re_sel_query);
    $re_add = "INSERT INTO re_store VALUES (NULL, '$re_arr[1]', '$re_arr[2]', '$re_arr[3]', '$re_arr[4]', '$re_arr[5]')";

?>


<div class="content" align="center">
	<h1 class="mytitle">功能頁面</h1>

  <table class="boomer">
    <?php
    if($fun == '1'){
      mysqli_query($sql,$up);
      jump('./train-7-storeuser.php', '帳號啟用完成');
    }elseif($fun == "2"){
      mysqli_query($sql,$up);
      jump('./train-7-storeuser.php', '帳號停用完成');
    }elseif($fun == "delete"){
      mysqli_query($sql,$re_add);
      mysqli_query($sql,$delete);
      jump('./train-7-storeuser.php', '刪除完成');
    }else{
      jump('./train-7-storeuser.php', '請選擇功能');
    }


    ?>

  </table>
</div>
<?php
  include "footer.php";
?>
