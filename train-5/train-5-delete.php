<!DOCTYPE html>
<html>
<head>
<title>練習5 修改通訊錄</title>
 <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />

</head>

<body>

<?php
  include './init.php';
  include './main.php';

  $id = base64_encode($_GET["id"]);
  $account = $_GET["name"];
  $namekey = $_GET["namekey"];
  $birth = $_GET["birth"];
  $phone = $_GET["phone"];
  $postal = $_GET["postal"];
  $address = $_GET["address"];


  echo "<table width='580' align='center' border='1'>";
        echo "<tr>";
        echo "<td>姓名</td>";
        echo "<td>".$account."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>身份證號</td>";
        echo "<td>".$namekey."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>生日</td>";
        echo "<td>".$birth."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>電話</td>";
        echo "<td>".$phone."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>郵遞區號</td>";
        echo "<td>".$postal."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>住址</td>";
        echo "<td>".$address."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center'>";
        echo '<form action="train-5-delete-ok.php" method="post" style="margin-left:30px;">';
        echo "<input style='display:none' type='text' name='id' value='".base64_decode($id)."' >";
        echo "<button type='submit'>确定刪除？</button>";
        echo '</form>';
        echo "</td>";
        echo "<td align='center'>";
        echo '<form action="train-5-list.php">';
        echo "<button type='submit'>取消</button>";
        echo '</form>';
        echo "</td>";
        echo "</tr>";

  echo '</table>';


?>


</body>
</html>
