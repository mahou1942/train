<?php
 $mytitle="用戶介面";
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

 $phone = trim($_POST['phone']);
 $address = trim($_POST['address']);
 $password = trim($_POST['password']);
 $password1 = trim($_POST['password1']);

 $up = "UPDATE customer SET password='$password',phone='$phone',address='$address' WHERE namekey='$row[namekey]'";

 $order_up = "UPDATE `order` SET customer_phone = '$phone',customer_address = '$address' WHERE customer_phone = '$row[phone]' AND customer_address='$row[address]'";

?>


<div class="content" align="center">
	<h1 class="mytitle">帳號管理</h1>
  <table class="boomer">

    <?php
      mysqli_query($sql,$up);
      if(empty($password) || empty($password1) || empty($phone) || empty($address)){
        jump('./train-7-userupdate.php', '有數據未填，請重新修改');
      }
      if($password != $password1){
        jump('./train-7-userupdate.php', '密碼輸入不一致，請重新修改');
      }

      if($sql->query($up) === TRUE && $sql->query($order_up) === TRUE){
        jump('./train-7-userloginout.php', '修改完成，請重新登入');
      }else{
        echo "Error:" . $order_up ."<br>" .$up. "<br>" . $sql->error;
      }

    ?>
  </table>
</div>
<?php
  include "footer.php";
?>
