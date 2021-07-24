<!DOCTYPE html>
<html>
<head>
<title>練習3-1</title>
</head>

<body>
  <form action="train-3-1.php" method="get">
  數字：<input required="required" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" type=int name="num"><br>
  <input type=submit value="確定"><br>
  <?php
    $num = (isset($_GET["num"]))?$_GET['num']:("1234");

    /*if( $num == 0 ) {
		return '零';
  }*/

    $zh = array("零", "壹", "兩", "參", "肆", "伍", "陸", "柒", "捌", "玖");
    $cName = array("", "", "拾", "佰", "千", "萬", "拾", "佰", "千", "億", "拾", "佰", "千");
    $conver = "";
    $cLast = "";
    $cZero = 0;
    $i = 0;

    for ($j = strlen($num); $j>=1 ; $j--){
      $cNum = intval(substr($num,$i,1));
      $cunit = $cName[$j]; //取出位數
      if($cNum == 0){ //判斷取出的數字是否為0,如果是0的話,紀錄有幾個0
        $cZero++;
        if (strpos($cunit,"萬億")>0 && ($cLast == "")){ //如果取出是萬,億,則數位以萬億來顯示
          $cLast = $cunit;
        }
      }else{
        if ($cZero >0){ //如果取出的0有n個,則以零代替所有的0
          if(strpos("萬億",substr($conver,strlen($conver)-2))>0){
            $conver =$cLast; //如果最後一位不是億也不是萬,就補上億萬
          }
          $conver = "零";
          $cZero = 0;
          $cLast ="";
        }
        $conver = $conver.$zh[$cNum].$cunit; //如果取出來的數字沒有0,則是中文數字+單位
      }
      $i++;
    }
    if(strpos("萬億",substr($conver,strlen($conver)-2))>0){
      $conver .=$cLast; // ‘如果最後一位不是億,萬,則最後一位補上”億萬”
    }

    echo $conver;


    $num_len = strlen($num);
    $num_ary = preg_split('//', $num, -1, PREG_SPLIT_NO_EMPTY);




  ?>
</body>

</html>
