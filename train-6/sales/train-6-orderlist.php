<?php
 $mytitle="業務頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-6-storelogin.php','請先登錄後查看');
 }

 $user = $_SESSION['userInfo']['account'];

 $cus = "SELECT * FROM store WHERE sales_account='$user'";
 $row = mysqli_query($sql,$cus);



?>

<div class="content" align="center">

	<h1 class="mytitle">銷售數量</h1>

  <table class="boomer" >
  <?php
    echo "<tr>";
      echo  "<td>商品</td>";
      echo  "<td>數量</td>";
      echo  "<td>獎金</td>";
    echo "</tr>";

    for($j=1;$j<=mysqli_num_rows($row);$j++){
      $list_row = mysqli_fetch_row($row);
      $sel_all = "SELECT * FROM `order` WHERE store_name = '$list_row[4]'";
      $sel_all_or = mysqli_query($sql,$sel_all);
      for($i=1;$i<=mysqli_num_rows($sel_all_or);$i++){
        $list_or =mysqli_fetch_row($sel_all_or);
        echo "<tr>";
        echo "<td>".$list_or[1]."</td>";
        echo "<td>".$list_or[6]."</td>";
        echo "<td>".$list_or[7]*$list_or[6]*'0.1'."</td>";
        echo "</tr>";
      }
    }

  ?>

  </table>
</div>
<?php
  include "footer.php";
?>
