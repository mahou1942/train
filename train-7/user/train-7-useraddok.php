<?php
  include '../init.php';
  include '../db.php';

  $account = trim($_POST['account']);
  $namekey =  trim($_POST['namekey']);
  $birth = trim($_POST['birth']);
  $phone = trim($_POST['phone']);
  $postal = trim($_POST['postal']);
  $address = trim($_POST['address']);
  $password = trim($_POST['password']);
  $password1 = trim($_POST['password1']);

  $repeat = trim($_POST['repeat']);


  $user_add="INSERT INTO customer VALUES(NULL, '$account', '$namekey', '$birth', '$phone', '$postal', '$address', '$password');";
  $namekey_sel = "SELECT * FROM customer where namekey='$namekey'";

  if(empty($account) || empty($namekey) || empty($birth) || empty($phone) || empty($postal) || empty($address) || empty($password)){
    jump('./train-7-useradd.php', '數據不能為空，請重新修改');
  }

  if(strlen($namekey) < 10 || strlen($namekey) > 10){
    jump('./train-7-useradd.php', '身分證號不能低於或高於10位之間，請重新修改');
  }

  if(!@ereg("^[A-Z]{1}[12ABCD]{1}[[:digit:]]{8}$",$namekey)){
    jump('./train-7-useradd.php', '身分證格式錯誤，請重新修改');
  }

  if($repeat=="keyfalse"){
      mysqli_query($sql,$namekey_sel);
    if(mysqli_affected_rows($sql) > 0){
      jump('./train-7-useradd.php', '您輸入的身分證號已經存在，請重新輸入');
    }else{
      if($sql->query($user_add) === TRUE){
        jump('./train-7-userlogin.php', '建立完成，請重新登入');
      } else{
        echo "Error:" . $sql . "<br>" . $conn->error;
      }
    }
  }

  $conn->close();


?>
