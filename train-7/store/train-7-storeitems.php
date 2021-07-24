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

 $sal = "SELECT * FROM items WHERE store_account='$user'";
 $saln= mysqli_query($sql,$sal);

?>

<div class="content" align="center">

	<h1 class="mytitle">商品管理</h1>

  <table class="boomer">
  <?php
    echo "<tr>";
      echo  "<td>產品名</td>";
      echo  "<td>價格</td>";
      echo  "<td>功能</td>";
      echo  "<td>";
      echo    "<form action='train-7-storeitemsadd.php' method='post' onSubmit='return returnvalue'>";
      echo    "<input style='display:none' required='required' name='sales_account' value='$user' />";
      echo    "<button style='font-size:20px' button type='submit'>新增商品</button></form>";
      echo  "</td>";
    echo "</tr>";

    for($i=1;$i<=mysqli_num_rows($saln);$i++){
      $salap=mysqli_fetch_row($saln);
      echo "<tr>";
      echo "<td>".$salap[1]."</td>";
      echo "<td>".$salap[2]."</td>";
      echo "<td colspan='2'>";
      echo "<form action='train-7-storeitemsfun.php' method='post' onSubmit='return returnvalue'>";
      echo "<input style='display:none' type='text' name='id' value='".$salap[0]."' >";
      echo "<input style='display:none'  name='itemsname' value='$salap[1]' />";
      echo "<button style='font-size:20px' type='submit' name='fun' value='update'>修改商品</button></form>";
      echo "<form action='train-7-storeitemsfun.php' method='post' onSubmit='return returnvalue'>";
      echo "<input style='display:none' type='text' name='id' value='".$salap[0]."' >";
      echo "<input style='display:none'  name='itemsname' value='$salap[1]' />";
      echo "<button style='font-size:20px' type='submit' name='fun' value='delete'>刪除商品</button></form>";
      echo "</td>";
      echo "</tr>";

    }
  ?>


  </table>
</div>
<?php
  include "footer.php";
?>
