<DOCTYPE html>

<html>
  <head>
    <title>練習</title>
  </head>
  <body>
    <?php
      echo "使用for";
      echo "<table width='300' >";
      for ($i=1;$i<=9;$i++) {
        echo "<tr>";
        for($j=2;$j<=5;$j++){
          echo "<td>$j"."x".$i."=".$j*$i."</td>";
        }
        echo "</tr>";
      }
      echo "</table>";
      echo "<br />";
      echo "<table width='300'>";
      for ($a=1;$a<=9;$a++){
        echo "<tr>";
        for($b=6;$b<=9;$b++){
          echo "<td>$b"."x".$a."=".$b*$a."</td>";
        }
        echo "</tr>";
      }
      echo "</table>";
    ?>

    <?php
    echo "使用while";
    $i=1;
    $j=1;
    $a=1;
    $b=1;
    echo "<table width='300' >";
    while($i<=9){
      $j=2;
      echo "<tr>";
      while($j<=5){
        echo "<td>";
        echo "<td>$j"."x".$i."=".$j*$i."</td>";
        echo "</td>";
        $j++;
      };
      echo "</tr>";
      $i++;
    }
    echo "</table>";
    echo "<br />";
    echo "<table width='300' >";
    while($a<=9){
      $b=6;
      echo "<tr>";
      while($b<=9){
        echo "<td>";
        echo "<td>$b"."x".$a."=".$b*$a."</td>";
        echo "</td>";
        $b++;
      };
      echo "</tr>";
      $a++;
    }
    echo "</table>";
    ?>

    <?php
      echo "使用do while";
      echo "<table width='300' >";
      $i = 0;
      do{
        $j = 1;
        $i++;
        echo "<tr>";
        do{
          $j++;
          echo "<td>";
          echo "<td>$j"."x".$i."=".$j*$i."</td>";
          echo "</td>";
        } while($j<5);
        echo "</tr>";
      } while($i<9);
      echo "</table>";
      echo "<br />";
      echo "<table width='300' >";
      $a = 0;
      do{
        $b = 5;
        $a++;
        echo "<tr>";
        do{
          $b++;
          echo "<td>";
          echo "<td>$b"."x".$a."=".$b*$a."</td>";
          echo "</td>";
        } while($b<9);
        echo "</tr>";
      } while($a<9);
      echo "</table>";
     ?>
  </body>

</html>
