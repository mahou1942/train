<?php

$servername = "localhost";
$dbusername = "maho";
$dbpassword = "maho";
$dbname = "minisystem";

$sql = new mysqli($servername, $dbusername, $dbpassword, $dbname);
mysqli_query($sql,"SET NAMES 'UTF8'");
if($sql->connect_error){
  die("連結失敗：" . $sql->connect_error);
}
