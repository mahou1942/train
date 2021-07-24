<!DOCTYPE html>
<html>
<head>
<title>練習3-1</title>
</head>

<body>
  <form action="train-3-1.php" method="get">
  輸入：<input required="required" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" type=int name="num"><br>
  <input type=submit value="確定"><br>
  <?php
    $num1 = (isset($_GET["num"]))?$_GET['num']:("0");

    $num = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $str = array("零", "壹", "兩", "參", "肆", "伍", "陸", "柒", "捌", "玖");
    $cName = array("", "", "拾", "佰", "千", "萬", "拾", "佰", "千", "億", "拾", "佰", "千");

    $conver = "";
    $cLast = "";
    $cZero = 0;
    $i = 0;

    $strtmp = str_replace($num, $str, $num1);

    for($j = strlen($num1); $j>=1 ; $j--){
      $cNum = substr($num1,$i,1);
      $cunit = $cName[$j]; //取出位數
      $conver = $conver.$str[$cNum].$cunit;
      $i++;
    }
    echo "$conver";
  ?>
</body>

</html>
