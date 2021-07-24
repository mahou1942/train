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

 $sal = "SELECT * FROM customer WHERE namekey='$user'";

 $sel_all = "SELECT * FROM items";
 $sel_all_it = mysqli_query($sql,$sel_all);

?>

<div class="content" align="center">

	<h1 class="mytitle">流覽商品</h1>

  <table class="boomer">
  <?php
    echo "<tr>";
      echo  "<td>販賣店家</td>";
      echo  "<td>產品名</td>";
      echo  "<td>價格</td>";
      echo  "<td>功能</td>";
    echo "</tr>";

    for($i=1;$i<=mysqli_num_rows($sel_all_it);$i++){
      $list_it =mysqli_fetch_row($sel_all_it);
      echo "<tr>";
      echo "<td>".$list_it[4]."</td>";
      echo "<td>".$list_it[1]."</td>";
      echo "<td>".$list_it[2]."</td>";
      echo "<td >";
      echo "<form action='train-6-itemorder.php' method='post' onSubmit='return returnvalue'>";
      echo "<input style='display:none' type='text' name='id' value='".$list_it[0]."' >";
      echo "<input style='display:none'  name='itemsname' value='$list_it[1]' />";
      echo "<button style='font-size:20px' type='submit' name='fun' value='update'>訂購商品</button></form>";
      echo "</td>";
      echo "</tr>";

    }
  ?>

  </table>
</div>
<?php
  include "footer.php";
?>
