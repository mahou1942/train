<!DOCTYPE html>
<html>
<head>
<title>練習4</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
  <?php

    //取得資料並加密
    $account = $_POST["account"];
    $namekey = ($_POST["namekey"]);
    $birth = (isset($_POST["birth"]))?base64_encode($_POST['birth']):("");
    $phone = (isset($_POST["phone"]))?base64_encode($_POST['phone']):("");
    $postal = (isset($_POST["postal"]))?$_POST['postal']:("");
    $address = (isset($_POST["address"]))?base64_encode($_POST['address']):("");

    //轉換陣列
    $ary = array($account,$namekey,$birth,$phone,$postal,$address);

    //寫入檔案
    $text = implode(',', $ary);
    $file = fopen("train-4-list.xml","a+");
    fwrite($file,$text.PHP_EOL);
    fclose($file);

    //讀取檔案
    $str = fopen("train-4-list.xml",'r');

    //檔案讀取後解密
    print_r($ary);
    $j=1;
      if($str){
        while(!feof($str)){
          $line = fgets($str, 4096);
          for($i=0;$i<!feof($str);$i++){
            $value = explode(",",$line);
            echo '<a href="train-4-modify.php?key='.$j.'&name='.$value[0].'&ID='.$value[1].'&birthDay='.base64_decode($value[2]).'&tel='.base64_decode($value[3]).'&addrNum='.$value[4].'&addr='.base64_decode($value[5]).'" method="get" style="margin-left:30px;">';
      			echo '<button type="submit">修改</button>';
            echo '</a>';
            echo '<a href="train-4-delete.php?dkey='.$j.'" method="get" style="margin-left:30px;">';
            echo '<button type="submit">刪除</button>';
            echo '</a>';
            echo "<br>";
            echo "序號".$j;
            echo "<br>";
            echo "姓名：".($value[0]);
            echo "<br>";
            echo "身分證號：".($value[1]);
            echo "<br>";
            echo "生日：".base64_decode($value[2]);
            echo "<br>";
            echo "電話：".base64_decode($value[3]);
            echo "<br>";
            echo "郵遞區號：".($value[4]);
            echo "<br>";
            echo "住址：".base64_decode($value[5]);
            echo "<br>";
            echo "<br>";
          }
          $j++;
        }
      }else{
        echo "無此檔案";
      }
    fclose($str);





  ?>
</body>

</html>
