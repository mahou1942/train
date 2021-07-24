<?php
 $mytitle="業務頁面";
 include "header.php";
 include "../db.php";

 session_start(); // 開啟session
 if(!isset($_SESSION['userInfo'])) {
   // 檢測是否有登入
   jump('./train-7-saleslogin.php','請先登錄後查看');
 }

 $user = $_SESSION['userInfo']['account'];

 $sal = "SELECT * FROM re_store WHERE re_sales_account='$user'";
 $saln= mysqli_query($sql,$sal);

 $a ="INSERT INTO `order` (`id`, `item_name`, `store_name`, `customer_name`, `customer_phone`, `customer_address`, `num`, `num_money`, `order_date`) VALUES (NULL, '魔法飛車', 'Maho魔法店', 'A', '0912345678', 'A', '5', '3000', '2018-03-28');";

?>

<div class="content" align="center">

	<h1 class="mytitle">第四第五題</h1>
  <a>INSERT INTO `order` (`id`, `item_name`, `store_name`, `customer_name`, `customer_phone`, `customer_address`, `num`, `num_money`, `order_date`) VALUES (NULL, '魔法飛車', 'Maho魔法店', 'A', '0912345678', 'A', '5', '3000', '2018-03-25');</a>
  <br>
  <br>
  <a>DELETE FROM `order` WHERE store_name='Maho魔法店' AND order_date>='2018-3-25' AND order_date<='2018-3-29'</a>
  <br>
  <table class="boomer">
    <form action="train-7-5.php" method="post" onSubmit="return returnvalue">
      <input style='display:none' type='text' name="fun" value="add" />
      <input style:'center'; type=submit onclick="Check_Item(this.form);" value="新增東西" />
    </form>
    <form action="train-7-5.php" method="post" onSubmit="return returnvalue">
      <input style='display:none' type='text' name="fun" value="del" />
      <input style:'center'; type=submit onclick="Check_Item(this.form);" value="砍死他們" />
    </form>

  </table>
</div>
<?php
  include "footer.php";
?>
