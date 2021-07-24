<?php
 $mytitle="店鋪頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-storelogin.php','請先登錄後查看');
 }

?>


<div class="content" align="center">
	<h1 class="mytitle">新增商品</h1>
  <table class="boomer">

<?php
  echo  "<form action='train-7-storeitemsaddok.php' method='post' onSubmit='return returnvalue'>";
  echo  "<table width='580' align='center' border='1'>";
    echo "<td>商品</td>";
    echo "<td><input type='text' name='name' maxlength='10' ></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>價格</td>";
    echo "<td><input type='int' name='money'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan='2' align='center'><button onclick='Check_Item(this.form);' type='submit'>新增商品</button></td>";
    echo "</tr>";
?>
  </table>
</div>
<?php
  include "footer.php";
?>
