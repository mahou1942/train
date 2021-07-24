<?php
 $mytitle="店鋪頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-6-storelogin.php','請先登錄後查看');
 }

 $user = $_SESSION['userInfo']['store_name'];

 $cus = "SELECT * FROM items WHERE store_account='$user'";
 $row = mysqli_fetch_assoc(mysqli_query($sql,$cus));


 $sel_all = "SELECT * FROM `order` WHERE store_name = '$user'";
 $sel_all_or = mysqli_query($sql,$sel_all);

?>

<div class="content" align="center">

	<h1 class="mytitle">銷售數量</h1>

  <table class="boomer" >
  <?php
    echo "<tr>";
      echo  "<td>訂購商品</td>";
      echo  "<td>購買者</td>";
      echo  "<td>電話</td>";
      echo  "<td>地址</td>";
      echo  "<td>價格</td>";
      echo  "<td>數量</td>";
      echo  "<td>訂購時間</td>";
    echo "</tr>";

    for($i=1;$i<=mysqli_num_rows($sel_all_or);$i++){
      $list_or =mysqli_fetch_row($sel_all_or);
      echo "<tr>";
      echo "<td>".$list_or[1]."</td>";
      echo "<td>".$list_or[3]."</td>";
      echo "<td>".$list_or[4]."</td>";
      echo "<td>".$list_or[5]."</td>";
      echo "<td>".$list_or[7]*$list_or[6]."</td>";
      echo "<td>".$list_or[6]."</td>";
      echo "<td>".$list_or[8]."</td>";
      echo "</tr>";

    }
  ?>

  </table>
</div>
<?php
  include "footer.php";
?>
