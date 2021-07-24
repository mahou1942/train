<?php
 $mytitle="店鋪頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-storelogin.php','請先登錄後查看');
 }

 $user = $_SESSION['userInfo']['account'];

 $sal = "SELECT * FROM store WHERE account='$user'";
 $saln= mysqli_query($sql,$sal);
 $salap=mysqli_fetch_row($saln);

?>

<div class="content" align="center">
  <table class="boomer">
    <h1 class="mytitle">店鋪資料</h1>
    <?php

    echo "<tr>";
      echo "<td>帳號</td>";
      echo "<td>店名</td>";
      echo "<td>業務人員</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>".$salap[1]."</td>";
    echo "<td>".$salap[4]."</td>";
    echo "<td>".$salap[3]."</td>";
    echo "</tr>";
    ?>
  </table>
</div>
<?php
  include "footer.php";
?>
