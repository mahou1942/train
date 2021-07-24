<?php
  include './init.php';

  $account = (trim($_POST["account"]))?$_POST['account']:("");
  $namekey = (trim($_POST["namekey"]))?$_POST['namekey']:("");
  $birth = (trim($_POST["birth"]))?($_POST['birth']):("");
  $phone = (trim($_POST["phone"]))?($_POST['phone']):("");
  $postal = (trim($_POST["postal"]))?$_POST['postal']:("");
  $address = (trim($_POST["address"]))?($_POST['address']):("");

  $repeat = (isset($_POST["repeat"]))?($_POST['repeat']):("");

  $servername = "localhost";
  $username = "maho";
  $password = "maho";
  $dbname = "store";

  $conn = new mysqli($servername, $username, $password, $dbname);
  mysqli_query($conn,"SET NAMES 'UTF8'");
  if($conn->connect_error){
    die("連結失敗：" . $conn->connect_error);
  }

  $sql="INSERT INTO contacts VALUES(NULL, '$account', '$namekey', '$birth', '$phone', '$postal', '$address');";
  $rep = "SELECT * FROM contacts where namekey='$namekey'";

  if(empty($account) || empty($namekey) || empty($birth) || empty($phone) || empty($postal) || empty($address)){
    jump('./train-5-adduser.php', '數據不能為空，請重新修改');
  }

  if(strlen($namekey) < 10 || strlen($namekey) > 10){
    jump('./train-5-adduser.php', '身分證號不能低於或高於10位之間，請重新修改');
  }

//  if(!@ereg("^[A-Z]{1}[12ABCD]{1}[[:digit:]]{8}$",$namekey)){
//    jump('./train-5-adduser.php', '身分證格式錯誤，請重新修改');
//  }

  if($repeat=="keyture"){
    if($conn->query($sql) === TRUE){
      jump('./train-5-list.php', '建立完成，跳轉到顯示頁面');
    } else{
      echo "Error:" . $sql . "<br>" . $conn->error;
    }
  }elseif($repeat=="keyfalse"){
      mysqli_query($conn,$rep);
    if(mysqli_affected_rows($conn) > 0){
      jump('./train-5-adduser.php', '您輸入的身分證號已經存在，請重新輸入');
    }else{
      if($conn->query($sql) === TRUE){
        jump('./train-5-list.php', '建立完成，跳轉到顯示頁面');
      } else{
        echo "Error:" . $sql . "<br>" . $conn->error;
      }
    }
  }else{
    jump('./train-5-adduser.html', '請點選身分證號是否需要重複檢查');
  }

  $conn->close();


?>
