<?php
include './init.php';
include './main.php';
$smarty->assign('width', '80%');
$smarty->assign('title', '練習5 顯示頁面');
$smarty->assign('thd1', '名字');
$smarty->assign('thd2', '身分證號');
$smarty->assign('thd3', '生日');
$smarty->assign('thd4', '電話');
$smarty->assign('thd5', '郵遞區號');
$smarty->assign('thd6', '住址');
$smarty->assign('thd7', '功能<r><a href="train-5-adduser.php"><button type="submit">新增</button>');

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "store";

$conn = new mysqli($servername, $username, $password, $dbname);
  mysqli_query($conn,"SET NAMES 'UTF8'");
if($conn->connect_error){
  die("連結失敗：" . $conn->connect_error);
}

$rep = "SELECT * FROM contacts";
$repn = mysqli_query($conn,$rep);
$sqlrow = mysqli_num_rows($repn);

$smarty->assign('i', '1');
$smarty->assign('num', $sqlrow);
$arr =array();

for($i=1;$i<=mysqli_num_rows($repn);$i++){
  $sqlar=mysqli_fetch_row($repn);
  $function ='功能<r>
  <a href="train-5-updata.php?id='.base64_encode($sqlar[0]).'&name='.$sqlar[1].'&namekey='.$sqlar[2].'&birth='.$sqlar[3].'&phone='.$sqlar[4].'&postal='.$sqlar[5].'&address='.$sqlar[6].'"metod="get"><button type="submit">修改</button></a>
  <a href="train-5-delete.php?id='.base64_encode($sqlar[0]).'&name='.$sqlar[1].'&namekey='.$sqlar[2].'&birth='.$sqlar[3].'&phone='.$sqlar[4].'&postal='.$sqlar[5].'&address='.$sqlar[6].'"metod="get"><button type="submit">刪除</button></a>';
// 仿範例
  array_push($arr, [$sqlar[1], $sqlar[2], $sqlar[3], $sqlar[4], $sqlar[5], $sqlar[6], $function]);
}

 //範例陣列
 /**$smarty->assign('contacts', array(
                           array('phone' => '555-555-1234',
                                 'fax' => '555-555-5678',
                                 'cell' => '555-555-0357'),
                           array('phone' => '800-555-4444',
                                 'fax' => '800-555-3333',
                                 'cell' => '800-555-2222')
                           ));**/

$smarty->assign('myDatas', $arr);



$smarty->assign('td7' ,'<a href="train-5-updata.php?id='.base64_encode($sqlar[0]).'&name='.$sqlar[1].'&namekey='.$sqlar[2].'&birth='.$sqlar[3].'&phone='.$sqlar[4].'&postal='.$sqlar[5].'&address='.$sqlar[6].'"metod="get"><button type="submit">修改</button></a>
<a href="train-5-delete.php?id='.base64_encode($sqlar[0]).'&name='.$sqlar[1].'&namekey='.$sqlar[2].'&birth='.$sqlar[3].'&phone='.$sqlar[4].'&postal='.$sqlar[5].'&address='.$sqlar[6].'"metod="get"><button type="submit">刪除</button></a>');




$smarty->display('train-list.tpl')
?>
