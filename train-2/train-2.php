<!DOCTYPE html>
<html>
<head>
<title>練習2</title>
</head>

<body>
  <form action="train-2.php" method="get">
  年：<input required="required" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" type=int name="y"><br>
  月：<input required="required" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" type=int name="m"><br>
  日：<input required="required" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" type=int name="d"><br>
  <input type=submit value="確定">
  <?php
    /*
    1.獲取日期年和月和日
    2.計算當前月有多少天和本月1號是星期幾
    3.書出日期的標題和表頭
    4.循環輸出
    5.輸出查詢
    */
    $year = (isset($_GET["y"]))?$_GET['y']:("1");
    $mon = (isset($_GET["m"]))?$_GET['m']:("1");
    $day = (isset($_GET["d"]))?$_GET['d']:("1");

    $mon2 = array('1'=>31,'2'=>28,'3'=>31,'4'=>30,'5'=>31,'6'=>30,'7'=>31,'8'=>31,'9'=>30,'10'=>31,'11'=>30,'12'=>31);

    $Wx = array('1'=>0,'2'=>3,'3'=>3,'4'=>6,'5'=>1,'6'=>4,'7'=>6,'8'=>2,'9'=>5,'10'=>0,'11'=>3,'12'=>5);
    $Wxl = array('1'=>0,'2'=>3,'3'=>4,'4'=>0,'5'=>2,'6'=>5,'7'=>0,'8'=>3,'9'=>6,'10'=>1,'11'=>4,'12'=>6);

    //判斷閏年
    /*
    if($mon == 2){
      if(($year % 400 == 0 || ($year % 4 == 0)&&($year % 100 !=0))){
        $mon2['2'] = 29;
        $W = ($year+$year/4+$year/400-$year/100+($Wxl[$mon]+1)-1)%7;
      }else{
        $W = ($year+$year/4+$year/400-$year/100+($Wxl[$mon]+1)-1)%7;
      }
    }else{
      $W = ($year+$year/4+$year/400-$year/100+($Wx[$mon]+1)-1)%7;
    }
    */
    if(($year % 400 == 0 || ($year % 4 == 0)&&($year % 100 !=0))){
      $mon2['2'] = 29;
      $w = ($year+$year/4+$year/400-$year/100+($Wxl[$mon])-1)%7;
      $W = ($year+$year/4+$year/400-$year/100+($Wxl[$mon])-2)%7;
    }else{
      $w = ($year+$year/4+$year/400-$year/100+($Wx[$mon]+1)-1)%7;
      $W = ($year+$year/4+$year/400-$year/100+($Wx[$mon]+1)-2)%7;
    }

//test
    $day2 = $mon2[$mon]; //獲取對應月的天數
    //$w = date("w",mktime(0,0,0,$mon,1,$year)); //獲取當前月中1號是星期幾


    echo "<center>";
    echo "<h1>{$year}年{$mon}月{$day}日</h1>";
    echo "<table width='600' border='1'>";
    echo "<tr>";
    echo "<th style='color:red';>星期日</th>";
    echo "<th>星期一</th>";
    echo "<th>星期二</th>";
    echo "<th>星期三</th>";
    echo "<th>星期四</th>";
    echo "<th >星期五</th>";
    echo "<th style='color:blue';>星期六</th>";
    echo "</tr>";

    $dd=1; //定義一個循環的天數
    while($dd<=$day2){
      echo "<tr>";
      //輸出一周的訊息
      for($i=0;$i<7;$i++){
        //當還沒到該輸出日期的時候，或日期溢出時，輸出空格
        if(($w>$i && $dd==1) || $dd>$day2){
          echo "<td>&nbsp;</td>";
        }elseif($day == $dd){
          echo "<td><a style='color:red'>{$day}</a></td>";
          $dd++;
        }else{
          echo "<td>{$dd}</td>";
          $dd++;
        }
        /*
        //若沒有輸出完日期dd訊息
        if($dd<=$day && ($w<=$i || $dd!=1)){
          echo "<td>{$dd}</td>";
          $dd++;
        }else{
          echo "<td>&nbsp;</td>";
        }
        */
      }
      echo "</tr>";
    }
    echo "</table>";


    echo "<table width='600' border='1'>";
    echo "<tr>";
    echo "<th>星期一</th>";
    echo "<th>星期二</th>";
    echo "<th>星期三</th>";
    echo "<th>星期四</th>";
    echo "<th>星期五</th>";
    echo "<th style='color:blue';>星期六</th>";
    echo "<th style='color:red';>星期日</th>";
    echo "</tr>";

    $dd=1; //定義一個循環的天數
    while($dd<=$day2){
      echo "<tr>";
      //輸出一周的訊息
      for($i=0;$i<7;$i++){
        //當還沒到該輸出日期的時候，或日期溢出時，輸出空格
        if(($W>$i && $dd==1) || $dd>$day2){
          echo "<td>&nbsp;</td>";
        }elseif($day == $dd){
          echo "<td><a style='color:red'>{$day}</a></td>";
          $dd++;
        }else{
          echo "<td>{$dd}</td>";
          $dd++;
        }
        /*
        //若沒有輸出完日期dd訊息
        if($dd<=$day && ($w<=$i || $dd!=1)){
          echo "<td>{$dd}</td>";
          $dd++;
        }else{
          echo "<td>&nbsp;</td>";
        }
        */
      }
      echo "</tr>";
    }
    echo "</table>";

      //處理上一月和下一月的訊息
      $prey1=$year-1;
      $nexty1=$year+1;

      $prey=$nexty=$year;//年
      $prem=$nextm=$mon;//月
      $pred=$nextd=$day;//日
      if($year>=1){
        if($prem <= 1){
          $prem=12;
          $prey--;
        }else{
          $prem--;
        }
        if($nextm >= 12){
          $nextm=1;
          $nexty++;
        }else{
          $nextm++;
        }
      }else{
        echo "無數據";
        die();
      }

      echo "<a href='train-2.php?y={$prey1}&m={$mon}&d={$day}'>上一年</a>";
      echo "<a href='train-2.php?y={$nexty1}&m={$mon}&d={$day}'>下一年</a>";
      echo "<br />";
      echo "<a href='train-2.php?y={$prey}&m={$prem}&d={$day}'>上一月</a>";
      echo "<a href='train-2.php?y={$nexty}&m={$nextm}&d={$day}'>下一月</a>";

    echo "</center>";
  ?>

</body>

</html>
