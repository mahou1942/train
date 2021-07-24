<?php
  include '../init.php';

  include '../db.php';

  $account = trim($_POST['account']);
  $sales_password = trim($_POST['sales_password']);

  if(empty($account) || empty($sales_password)){
    jump('./train-6-saleslogin.php', '帳號密碼不能為空！');
  }

  $sel = "SELECT * FROM sales WHERE account='$account'";
  $result = mysqli_query($sql,$sel);

  if(mysqli_affected_rows($sql) == 0){
    jump('./train-6-saleslogin.php', '帳號不存在！');
  }

  $row = mysqli_fetch_assoc($result);
  $true_password = $row['password'];

  if($sales_password === $true_password){
    session_start();
    $_SESSION['userInfo'] = $row;

    jump('./train-6-storeuser.php', '登入成功，跳轉到業務頁面');
  }else{
    jump('./train-6-saleslogin.php', '輸入密碼錯誤');
  }


  $sql->close();
?>
