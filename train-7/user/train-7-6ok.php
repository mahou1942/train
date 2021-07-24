<?php
  include '../init.php';
  include '../db.php';

  $fun = trim($_POST['fun']);



  $up = "UPDATE `order` SET order_date = '2018-03-30' WHERE order_date='2018-4-01'";

  if($fun =="up"){
      if($sql->query($up) === TRUE){
        jump('./train-7-6.php', '神奇的事情發生了');
      } else{
        echo "Error:" . $sql . "<br>" . $conn->error;
      }
  }

  $conn->close();


?>
