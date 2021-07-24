<DOCTYPE html>

<html>
  <head>
    <title>練習</title>
  </head>
  <body>
    <?php
      echo "使用for";
      echo "<table width='300' cellpadding='2'>";
        echo "<td> x </td>";
      for($c=1;$c<=9;$c++){
        echo "<td> $c </td>";
      }
        for($i=1;$i<=9;$i++){
        echo "<tr>";
        echo "<td> $i </td>";
          for($j=1;$j<=9;$j++){
            echo "<td>".$i*$j."</td>";
          }
        echo "</tr>";
      }
      echo "</table>";
     ?>

    <?php
      echo "使用while";
      $i=1;
      $j=1;
      $c=1;
      echo "<table width='300' cellpadding='2'>";
      echo "<td> x </td>";
      while($c<=9){
        echo "<td> $c </td>";
        $c++;
      };
      while($i<=9){
        $j=1;
        echo "<tr>";
        echo "<td> $i </td>";
        while($j<=9){
          echo "<td>";
          echo $i*$j;
          echo "</td>";
          $j++;
        };
        echo "</tr>";
        $i++;
      }
      echo "</table>";
    ?>

    <?php
      echo "使用do while";
      echo "<table width='300' cellpadding='2' >";
      echo "<td> x </td>";
      $c = 0;
      do{
        $c++;
        echo "<td> $c </td>";
      }while($c<9);
      $i = 0;
      do{
        $j = 0;
        $i++;
        echo "<tr>";
        echo "<td> $i </td>";
        do{
          $j++;
          echo "<td>";
          echo $i*$j;
          echo "</td>";
        } while($j<9);
        echo "</tr>";
      } while($i<9);
      echo "</table>";
     ?>

  </body>

</html>
