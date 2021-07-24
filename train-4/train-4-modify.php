<!DOCTYPE html>
<html>
<head>
<title>練習4</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
  <?php
  $key = $_GET["key"];
  $name = $_GET["name"];
  $ID = $_GET["ID"];
  $birthDay = $_GET["birthDay"];
  $tel = $_GET["tel"];
  $addrNum = $_GET["addrNum"];
  $addr = $_GET["addr"];

    echo '<form action="train-4-output.php" method="post" style="margin-left:30px;">';
    echo '<button type="submit">确定修改</button>';
          echo "<br>";
          echo "<input style='display:none' type='text' name='key' value='".$key."' >";
          echo "<br>";
          echo "姓名:<input type='text' name='name' value='".$name."'>";
          echo "<br>";
          echo "<br>";
          echo "身份證號:<input type='text' name='ID' value='".$ID."'>";
          echo "<br>";
          echo "<br>";
          echo "生日:<input type='text' name='birthDay' value='".$birthDay."'>";
          echo "<br>";
          echo "<br>";
          echo "電話:<input type='text' name='tel' value='".$tel."'>";
          echo "<br>";
          echo "<br>";
          echo "郵遞區號:<input type='text' name='addrNum' value='".$addrNum."'>";
          echo "<br>";
          echo "<br>";
          echo "住址:<input type='text' name='addr' value='".$addr."'>";
          echo "<br>";
          echo "<br>";
    echo '</form>';

  ?>

</body>

</html>
