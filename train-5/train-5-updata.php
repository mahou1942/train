<!DOCTYPE html>
<html>
<head>
<title>練習5 修改通訊錄</title>
 <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />

</head>

<body>

<?php
  include './init.php';

  $id = base64_encode($_GET["id"]);
  $account = $_GET["name"];
  $namekey = $_GET["namekey"];
  $birth = $_GET["birth"];
  $phone = $_GET["phone"];
  $postal = $_GET["postal"];
  $address = $_GET["address"];

  echo '<form action="train-5-updata-ok.php" method="post" style="margin-left:30px;">';
  echo "<table width='580' align='center' border='1'>";
  echo "<input style='display:none' type='text' name='id' value='".base64_decode($id)."' >";
        echo "<tr>";
        echo "<td>姓名</td>";
        echo "<td><input type='text' name='account' maxlength='4' value='".$account." '></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>身份證號</td>";
        echo "<td><input type='text' name='namekey' maxlength='10' value='".$namekey." '></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>生日</td>";
        echo "<td><input type='date' name='birth' value='".$birth." min='1930-01-01' max='2012-01-01''></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>電話</td>";
        echo "<td><input type='int' name='phone' maxlength='10' value='".$phone."'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>郵遞區號</td>";
        echo "<td><input type='int' name='postal' value='".$postal."'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>住址</td>";
        echo "<td><input type='text' name='address' value='".$address."'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2' align='center'><button onclick='Check_Item(this.form);' type='submit'>确定修改</button></td>";
        echo "</tr>";
  echo '</table>';
  echo '</form>';

?>


</body>
</html>
