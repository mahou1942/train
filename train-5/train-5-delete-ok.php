<?php
  include './init.php';

  $id = $_POST["id"];
  $id02 = base64_decode($id);

  $servername = "localhost";
  $username = "maho";
  $password = "maho";
  $dbname = "store";

  $conn = new mysqli($servername, $username, $password, $dbname);
  mysqli_query($conn,"SET NAMES 'UTF8'");
  if($conn->connect_error){
    die("連結失敗：" . $conn->connect_error);
  }

  $rep = "DELETE FROM contacts WHERE id='$id02'";

    if($conn->query($rep) === TRUE){
      jump('./train-5-list.php', '刪除完成，跳回顯示頁面');
    } else{
      echo "Error:" . $sql . "<br>" . $conn->error;
    }

  $conn->close();


?>
