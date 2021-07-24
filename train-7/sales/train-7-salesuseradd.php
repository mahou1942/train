<?php
 $mytitle="業務頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-saleslogin.php','請先登錄後查看');
 }


?>


<div class="content" align="center">
	<h1 class="mytitle">註冊新帳號</h1>
  <table class="boomer">

<?php
  echo  "<form action='train-7-salesuseraddok.php' method='post' onSubmit='return returnvalue'>";
  echo  "<table width='580' align='center' border='1'>";
    echo "<td>帳號</td>";
    echo "<td><input type='int' name='account' maxlength='10' ></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>密碼</td>";
    echo "<td><input type='password' name='password' ></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>再輸入一次</td>";
    echo "<td><input type='password' name='password1' ></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan='2' align='center'><button onclick='Check_Item(this.form);' type='submit'>註冊新業務帳號</button></td>";
    echo "</tr>";
?>
  </table>
</div>
<?php
  include "footer.php";
?>
