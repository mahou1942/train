<!DOCTYPE html>
<html>
<head>
<title>練習4</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
  <?php

  //修改功能
  //取得修改資料並加密
  $key = (isset($_POST["key"]))?$account =$_POST['key']:("");
  $name = (isset($_POST["name"]))?$account =$_POST['name']:("");
  $ID = (isset($_POST["ID"]))?$namekey =$_POST['ID']:("");
  $birthDay = (isset($_POST["birthDay"]))?$birth=base64_encode($_POST['birthDay']):("");
  $tel = (isset($_POST["tel"]))?$phone=base64_encode($_POST['tel']):("");
  $addrNum = (isset($_POST["addrNum"]))?$postal=$_POST['addrNum']:("");
  $addr = (isset($_POST["addr"]))?$address=base64_encode($_POST['addr']):("");

  $dkey = (isset($_POST["dkey"]))?$account =$_POST['dkey']:("");

  //轉換陣列
  $upary = array($name,$ID,$birthDay,$tel,$addrNum,$addr);
  $uptext = implode(',', $upary);

  //讀取修改行數
  $c = getLine('./train-4-list.xml', $key);

  function getLine($file, $line, $length = 4096){
  $returnTxt = null; // 初始化返回
  $i = 1; // 行數

  $handle = fopen($file, "r");
  if ($handle) {
      while (!feof($handle)) {
          $buffer = fgets($handle, $length);
          if($line == $i) $returnTxt = $buffer;
          $i++;
      }
      fclose($handle);
    }
  return $returnTxt;
  }

  //開啟檔案(寫入與讀取)
  $upstr = fopen("train-4-list.xml",'r');
  $upfile = fopen("train-4-list_w.xml",'w');

  $replaced = false;

  while(!feof($upstr)){
    $line = fgets($upstr);
    if(stristr($line,$c)){
      $line = $uptext.PHP_EOL;
      $replaced = true;
    }
    fputs($upfile,$line);
  }
  fclose($upstr); fclose($upfile);

	if($replaced){
		rename('train-4-list_w.xml', 'train-4-list.xml');
		//unlink('train-4-list_w.xml');
	}


  //讀取刪除行數內容
  $d = getLine('./train-4-list.xml', $dkey);

  $fn = 'train-4-list.xml';

  $arr = file($fn);
  $fp=fopen($fn,'w');
  foreach($arr as $del){
    if ($del <> $d) fputs($fp,$del);
  }
  fclose($fp);

  //最後讀取文件檔案
  $str = fopen("train-4-list.xml",'r');

  //檔案讀取後解密
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
