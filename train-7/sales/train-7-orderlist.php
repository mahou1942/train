<?php
 $mytitle="業務頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-storelogin.php','請先登錄後查看');
 }

 $user = $_SESSION['userInfo']['account'];

 $cus = "SELECT * FROM store WHERE sales_account='$user'";
 $row = mysqli_query($sql,$cus);

 $a = "SELECT item_name,sum(num) ,sum(num*num_money*0.1) FROM sales,store,`order` WHERE sales.account='$user' AND sales_account='$user' AND store.store_name='A' AND order.store_name = 'A' AND PERIOD_DIFF( date_format( now( ) , '%Y%m' ) , date_format( order_date, '%Y%m' ) ) =1 GROUP by item_name ,num_money";
 $a_row = mysqli_query($sql,$a);
?>

<div class="content" align="center">

	<h1 class="mytitle">銷售數量</h1>

  <table class="boomer" >
  <?php
    echo "<tr>";
      echo  "<td>店家</td>";
      echo  "<td>商品</td>";
      echo  "<td>數量</td>";
      echo  "<td>獎金</td>";
      echo  "<td>訂購時間</td>";
    echo "</tr>";

    for($j=1;$j<=mysqli_num_rows($row);$j++){
      $list_row = mysqli_fetch_row($row);
      $sel_all = "SELECT * FROM `order` WHERE store_name = '$list_row[4]'";
      $sel_all_or = mysqli_query($sql,$sel_all);
      for($i=1;$i<=mysqli_num_rows($sel_all_or);$i++){
        $list_or =mysqli_fetch_row($sel_all_or);
        echo "<tr>";
        echo "<td>".$list_or[2]."</td>";
        echo "<td>".$list_or[1]."</td>";
        echo "<td>".$list_or[6]."</td>";
        echo "<td>".$list_or[7]*$list_or[6]*'0.1'."</td>";
        echo "<td>".$list_or[8]."</td>";
        echo "</tr>";
      }
    }

  ?>
  </table>

  <table>
    <tr>
      <td>品項</td>
      <td>數量</td>
      <td>獎金</td>
    </tr>
      <?php
      for($n=1;$n<=mysqli_num_rows($a_row);$n++){
        echo "<tr>";
        $list_a = mysqli_fetch_row($a_row);
        echo "<td>".$list_a[0]."</td>";
        echo "<td>".$list_a[1]."</td>";
        echo "<td>".$list_a[2]."</td>";
        echo "</tr>";
      }
      echo "$a";
      ?>
  </table>
</div>
<?php
  include "footer.php";
?>
