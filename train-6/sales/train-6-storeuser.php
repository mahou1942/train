<?php
 $mytitle="業務頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-6-saleslogin.php','請先登錄後查看');
 }

 $user = $_SESSION['userInfo']['account'];

 $sal = "SELECT * FROM store WHERE sales_account='$user'";
 $saln= mysqli_query($sql,$sal);

?>

<div class="content" align="center">

	<h1 class="mytitle">現有店家帳號</h1>

  <table class="boomer">
  <?php
    echo "<tr>";
      echo  "<td>帳號</td>";
      echo  "<td>功能</td>";
      echo  "<td>";
      echo    "<form action='train-6-storeadd.php' method='post' onSubmit='return returnvalue'>";
      echo    "<input style='display:none' required='required' name='sales_account' value='$user' />";
      echo    "<button style='font-size:20px' button type='submit'>新增</button></form>";
      echo  "</td>";
    echo "</tr>";

    for($i=1;$i<=mysqli_num_rows($saln);$i++){
      $salap=mysqli_fetch_row($saln);
      echo "<tr>";
      echo "<td>".$salap[1]."</td>";
      echo "<td colspan='2'>";
      echo "<form action='train-6-function.php' method='post' onSubmit='return returnvalue'>";
      echo "<input style='display:none'  name='storeaccount' value='$salap[1]' />";
      echo "<button type='submit' name='fun' value='1'>啟用</button></form>";
      echo "<form action='train-6-function.php' method='post' onSubmit='return returnvalue'>";
      echo "<input style='display:none'  name='storeaccount' value='$salap[1]' />";
      echo "<button type='submit' name='fun' value='2'>停用</button></form>";
      echo "<form action='train-6-function.php' method='post' onSubmit='return returnvalue'>";
      echo "<input style='display:none'  name='storeaccount' value='$salap[1]' />";
      echo "<button type='submit' name='fun' value='delete'>刪除</button></form>";
      echo "</td>";
      echo "</tr>";

    }
  ?>


  </table>
</div>
<?php
  include "footer.php";
?>
