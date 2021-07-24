<!DOCTYPE html>

<html>
<head>
  <title>用戶註冊</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
  <form action="train-6-useraddok.php" method="post" onSubmit="return returnvalue">
  <table width="580" align="center" border='1'>
  <tr>
    <td colspan="2" >用戶註冊</td>
  </tr>
  <tr>
    <td><span>姓名</span></td>
    <td><input required="required" type="text" name="account" size="25" maxlength="30" style="width:160px"  /></td>
  </tr>
  <tr>
    <td><span>身分證號</span></td>
    <td>
      <input required="required" type=text name="namekey" size="25" style="width:160px" min="8" maxlength="10" />
      <input style='display:none' type='text' name="repeat" value="keyfalse" />
    </td>
  </tr>
  <tr>
    <td><span>生日</span></td>
    <td><input required="required" type=date name="birth" size="25" style="width:160px" min="1930-01-01" max="2012-01-01" /></td>
  </tr>
  <tr>
    <td><span>電話</span></td>
    <td><input required="required" type=int name="phone" size="25" style="width:160px" maxlength="10" min="8" /></td>
  </tr>
  <tr>
    <td><span>郵遞區號：</span></td>
    <td><input required="required" type=int name="postal" size="25" style="width:160px" /></td>
  </tr>
  <tr>
    <td><span>住址：</span></td>
    <td><input required="required" type=text name="address" size="25" style="width:160px" /></td>
  </tr>
  <tr>
    <td><span>密碼：</span></td>
    <td><input required="required" type=password name="password" size="25" style="width:160px" /></td>
  </tr>
  <tr>
    <td><span>請再輸入一次：</span></td>
    <td><input required="required" type=password name="password1" size="25" style="width:160px" /></td>
  </tr>
  <tr>
    <td width="25%"><span >&nbsp;</span></td>
    <td><input style:'center'; type=submit onclick="Check_Item(this.form);" value="確定" /></td>
  </tr>
  </form>

</body>

</html>
