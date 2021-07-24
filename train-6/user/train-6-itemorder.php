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

  $id =$_POST['id'];
  $itemsname =$_POST['itemsname'];

  $cus = "SELECT * FROM customer WHERE namekey='$user'";
  $row = mysqli_fetch_assoc(mysqli_query($sql,$cus));

  $sel_all = "SELECT * FROM items WHERE id='$id' ";
  $it_sel_arr =mysqli_fetch_row(mysqli_query($sql,$sel_all));

?>

<div class="content" align="center">
	<h1 class="mytitle">新增訂購單</h1>
  <table class="boomer">

<?php
  echo  "<form action='train-6-itemorderok.php' method='post' onSubmit='return returnvalue'>";
  echo  "<table width='580' align='center' border='1'>";
    echo "<tr>";
    echo "<td>商品</td>";
    echo "<td>店家</td>";
    echo "<td>購買者</td>";
    echo "<td>單價價格</td>";
    echo "<td>數量</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><a type='text' name='itemname' >".$it_sel_arr[1]."</a>";
    echo "<input style='display:none' type='text' name='itemname' value='".$it_sel_arr[1]."' ></td>";
    echo "<td><a type='text' name='storename' >".$it_sel_arr[4]."</a>";
    echo "<input style='display:none' type='text' name='storename' value='".$it_sel_arr[4]."' ></td>";
    echo "<td><a type='text' name='username' >".$row['name']."</a>";
    echo "<input style='display:none' type='text' name='username' value='".$row['name']."' ></td>";
    echo "<td><a type='text' name='itemmoney' >".$it_sel_arr[2]."</a>";
    echo "<input style='display:none' type='text' name='itemmoney' value='".$it_sel_arr[2]."' ></td>";
    echo "<td><input type='int' name='num'></input></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan='5' align='center'><button onclick='Check_Item(this.form);' type='submit'>訂購確認</button></td>";
    echo "</tr>";
  echo "</form>"
?>
  </table>
</div>
<?php
  include "footer.php";
?>
