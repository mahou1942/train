<?php
 $mytitle="用戶介面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-userlogin.php','請先登錄後查看');
 }

 $user = $_SESSION['userInfo']['namekey'];
 $cus = "SELECT * FROM customer WHERE namekey='$user'";
 $row = mysqli_fetch_assoc(mysqli_query($sql,$cus));

?>


<div class="content" align="center">
	<h1 class="mytitle">帳號管理</h1>
  <table class="boomer">

<?php
  echo  "<form action='train-7-userupdateok.php' method='post' onSubmit='return returnvalue'>";
  echo  "<table width='580' align='center' border='1'>";
  echo  "<input style='display:none' required='required' type='text' name='salesname' value='$user' />";
    echo "<tr>";
    echo "<td>電話</td>";
    echo "<td><input type='text' name='phone' value=".$row['phone']."></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>地址</td>";
    echo "<td><input type='text' name='address' value=".$row['address']."></td>";
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
    echo "<td colspan='2' align='center'><button onclick='Check_Item(this.form);' type='submit'>確認</button></td>";
    echo "</tr>";
?>
  </table>
</div>
<?php
  include "footer.php";
?>
