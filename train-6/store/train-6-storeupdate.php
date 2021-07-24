<?php
 $mytitle="店鋪頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-6-storelogin.php','請先登錄後查看');
 }

 $user = $_SESSION['userInfo']['account'];

?>


<div class="content" align="center">
	<h1 class="mytitle">店舖設定</h1>
  <table class="boomer">

<?php
  echo  "<form action='train-6-storeupdateok.php' method='post' onSubmit='return returnvalue'>";
  echo  "<table width='580' align='center' border='1'>";
  echo  "<input style='display:none' required='required' type='text' name='account' value='$user' />";
    echo "<td>店家名稱</td>";
    echo "<td><input type='int' name='name' maxlength='10' ></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan='2' align='center'><button onclick='Check_Item(this.form);' type='submit'>確認修改</button></td>";
    echo "</tr>";
?>
  </table>
</div>
<?php
  include "footer.php";
?>
