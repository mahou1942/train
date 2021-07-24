<?php
 $mytitle="店鋪頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-6-storelogin.php','請先登錄後查看');
 }
 $id = $_POST['id'];
 $itemsname = $_POST['itemsname'];
 $fun = $_POST['fun'];

 $sql_sel = "SELECT * FROM items WHERE name='$itemsname'";
 $items_sel = mysqli_fetch_row(mysqli_query($sql, $sql_sel));
?>


<div class="content" align="center">
	<h1 class="mytitle">商品管理</h1>
  <table class="boomer">

<?php
    if($fun == 'update'){
      echo  "<form action='train-6-storeitemsfunok.php' method='post' onSubmit='return returnvalue'>";
      echo  "<table width='580' align='center' border='1'>";
        echo "<input style='display:none' type='text' name='id' value='".$id."' >";
        echo "<td>商品</td>";
        echo "<td><input type='text' name='name' maxlength='10' value='".$items_sel[1]."' ></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>價格</td>";
        echo "<td><input type='int' name='money' value='".$items_sel[2]."'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2' align='center'><button onclick='Check_Item(this.form);' type='submit' name='fun' value='update'>修改商品</button></td>";
        echo "</tr>";
      echo "</form>";
    }elseif($fun == 'delete'){
      echo  "<form action='train-6-storeitemsfunok.php' method='post' onSubmit='return returnvalue'>";
      echo  "<table width='580' align='center' border='1'>";
        echo "<input style='display:none' type='text' name='id' value='".$id."' >";
        echo "<td>商品</td>";
        echo "<td><a type='text' name='name' maxlength='10' >".$items_sel[1]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>價格</td>";
        echo "<td><a type='int' name='money' >".$items_sel[2]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2' align='center'><button onclick='Check_Item(this.form);' type='submit' name='fun' value='delete'>刪除商品</button></td>";
        echo "</tr>";
      echo "</form>";
    }
?>
  </table>
</div>
<?php
  include "footer.php";
?>
