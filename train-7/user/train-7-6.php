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

 $sal = "SELECT * FROM re_store WHERE re_sales_account='$user'";
 $saln= mysqli_query($sql,$sal);

?>

<div class="content" align="center">

	<h1 class="mytitle">第四第六題</h1>

  <table class="boomer">
    <a>UPDATE `order` SET order_date = '2018-03-30' WHERE order_date='2018-4-01'</a>
    <br>
    <form action="train-7-6ok.php" method="post" onSubmit="return returnvalue">
      <input style='display:none' type='text' name="fun" value="up" />
      <input style:'center'; type=submit onclick="Check_Item(this.form);" value="修改" />
    </form>


  </table>
</div>
<?php
  include "footer.php";
?>
