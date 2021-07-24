<?php
 $mytitle="用戶頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-6-userlogin.php','請先登錄後查看');
 }

 $user = $_SESSION['userInfo']['namekey'];

 $sal = "SELECT * FROM customer WHERE namekey='$user'";
 $saln= mysqli_query($sql,$sal);
 $salap=mysqli_fetch_row($saln);

?>

<div class="content" align="center">
  <table class="boomer">
    <h1 class="mytitle">用戶資料</h1>
    <?php

    echo "<tr>";
      echo "<td>姓名</td>";
      echo "<td>身分證號</td>";
      echo "<td>電話</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>".$salap[1]."</td>";
    echo "<td>".$salap[2]."</td>";
    echo "<td>".$salap[4]."</td>";
    echo "</tr>";
    ?>
  </table>
</div>
<?php
  include "footer.php";
?>
