<?php
 $mytitle="用戶頁面";
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

 $sel_all = "SELECT * FROM `order` WHERE customer_name = '$row[name]' AND customer_phone = '$row[phone]'";
 $sel_all_or = mysqli_query($sql,$sel_all);

 $a = "SELECT item_name,store_name,sum(num),sum(num*num_money) FROM `order` WHERE store_name='A' AND customer_name='A'AND DATE_FORMAT( order_date, '%Y%m' ) = DATE_FORMAT( CURDATE( ) , '%Y%m' ) GROUP by item_name";
 $a_row = mysqli_query($sql,$a);
?>

<div class="content" align="center">

	<h1 class="mytitle">訂購單</h1>

  <table class="boomer" >
  <?php
    echo "<tr>";
      echo  "<td>訂購商品</td>";
      echo  "<td>店家</td>";
      echo  "<td>價格</td>";
      echo  "<td>數量</td>";
      echo  "<td>地址</td>";
      echo  "<td>訂購時間</td>";
    echo "</tr>";

    for($i=1;$i<=mysqli_num_rows($sel_all_or);$i++){
      $list_or =mysqli_fetch_row($sel_all_or);
      echo "<tr>";
      echo "<td>".$list_or[1]."</td>";
      echo "<td>".$list_or[2]."</td>";
      echo "<td>".$list_or[7]*$list_or[6]."</td>";
      echo "<td>".$list_or[6]."</td>";
      echo "<td>".$list_or[5]."</td>";
      echo "<td>".$list_or[8]."</td>";
      echo "</tr>";

    }
  ?>
  </table>

  <table>
    <tr>
      <td>品項</td>
      <td>店家</td>
      <td>數量</td>
      <td>價格</td>
    </tr>
      <?php
      for($n=1;$n<=mysqli_num_rows($a_row);$n++){
        echo "<tr>";
        $list_a = mysqli_fetch_row($a_row);
        echo "<td>".$list_a[0]."</td>";
        echo "<td>".$list_a[1]."</td>";
        echo "<td>".$list_a[2]."</td>";
        echo "<td>".$list_a[3]."</td>";
        echo "</tr>";
      }
      echo $a;
      ?>
  </table>
</div>
<?php
  include "footer.php";
?>
