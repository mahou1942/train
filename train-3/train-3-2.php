<!DOCTYPE html>
<html>
<head>
<title>練習3-2</title>
</head>

<body>
  <form action="train-3-2.php" method="get">
  一個輸入框：<input required="required" type=string name="str"><br>
  <input style:'center'; type=submit value="確定"><br>
  <?php
  $str1 = (isset($_GET["str"]))?$_GET['str']:("");

  $stren = array('i','you','am','are','stduent','koala');
  $strzh = array('我','你','是','是','學生','考拉');

  $strtmp = str_replace($stren,$strzh,$str1);
  $strtmp =  preg_replace('/\s/', '', $strtmp);
  echo $strtmp;

  ?>
</body>

</html>
