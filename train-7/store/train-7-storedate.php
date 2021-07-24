<?php
  include '../init.php';

  include '../db.php';

  $account = trim($_POST['account']);
  $store_password = trim($_POST['store_password']);

  if(empty($account) || empty($store_password)){
    jump('./train-7-storelogin.php', '帳號密碼不能為空！');
  }

  $sel = "SELECT * FROM store WHERE account='$account'";
  $result = mysqli_query($sql,$sel);
  $enb = mysqli_fetch_row($result);

  if(mysqli_affected_rows($sql) == 0){
    jump('./train-7-storelogin.php', '帳號不存在！');
  }
  if($enb[5] == '0'){
    jump('./train-7-storelogin.php', '帳號尚未啟用！');
  }
  if($enb[5] == '2'){
    jump('./train-7-storelogin.php', '帳號已停用！');
  }

  $result_password = mysqli_query($sql,$sel);
  $row = mysqli_fetch_assoc($result_password);
  $true_password = $row['password'];

  if($store_password === $true_password){
    session_start();
    $_SESSION['userInfo'] = $row;
    jump('./train-7-store.php', '登入成功，跳轉到店家頁面');
  }else{
    jump('./train-7-storelogin.php', '輸入密碼錯誤');
  }


  $sql->close();
?>
