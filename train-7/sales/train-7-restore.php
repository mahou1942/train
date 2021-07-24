<?php
 $mytitle="業務頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-saleslogin.php','請先登錄後查看');
 }

 $user = $_SESSION['userInfo']['account'];

 $sal = "SELECT * FROM re_store WHERE re_sales_account='$user'";
 $saln= mysqli_query($sql,$sal);

?>

<div class="content" align="center">

	<h1 class="mytitle">已刪除帳號進行回復</h1>

  <table class="boomer">
    <tr>
      <td>帳號</td>
      <td align="center">功能</td>
    </tr>
  <?php
    for($i=1;$i<=mysqli_num_rows($saln);$i++){
      $salap=mysqli_fetch_row($saln);
      echo "<tr>";
      echo "<td>".$salap[1]."</td>";
      echo "<td align='center'>";
      echo "<form action='train-7-restoreok.php' method='post' onSubmit='return returnvalue'>";
      echo "<input style='display:none'  name='re_storeaccount' value='$salap[1]' />";
      echo "<button type='submit' name='fun' value='1'>回復</button></form>";
      echo "</td>";
      echo "</tr>";
    }
  ?>


  </table>
</div>
<?php
  include "footer.php";
?>
