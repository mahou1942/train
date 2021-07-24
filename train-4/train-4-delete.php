<!DOCTYPE html>
<html>
<head>
<title>練習4</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
  <?php
  $dkey = $_GET["dkey"];

    echo '<form action="train-4-output.php" method="post" style="margin-left:30px;">';
    echo '<button type="submit">确定刪除？</button>';
    echo '<form action="train-4-output.php" style="margin-left:30px;">';
    echo '<button type="submit">取消</button>';
          echo "<br>";
          echo "<input style='display:none' type='text' name='dkey' value='".$dkey."' >";
          echo "<br>";
          echo "<br>";
    echo '</form>';

  ?>

</body>

</html>
