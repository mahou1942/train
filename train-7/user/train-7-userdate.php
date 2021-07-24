<?php
  include '../init.php';
  include '../db.php';

  $account = trim($_POST['account']);
  $user_password = trim($_POST['user_password']);

  if(empty($account) || empty($user_password)){
    jump('./train-7-userlogin.php', '身分證號 密碼不能為空！');
  }

  $sel = "SELECT * FROM customer WHERE namekey='$account'";
  $result = mysqli_query($sql,$sel);

  if(mysqli_affected_rows($sql) == 0){
    jump('./train-7-userlogin.php', '身分證號不存在！');
  }

  $row = mysqli_fetch_assoc($result);
  $true_password = $row['password'];

  if($user_password === $true_password){
    session_start();
    $_SESSION['userInfo'] = $row;
    jump('./train-7-user.php', '登入成功，跳轉頁面');
  }else{
    jump('./train-7-userlogin.php', '輸入密碼錯誤');
  }


  $sql->close();
?>
