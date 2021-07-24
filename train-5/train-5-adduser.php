<!DOCTYPE html>
<html>
<head>

<title>練習5 新增通訊錄</title>
 <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />

<script language="JavaScript">
function Check_Item(form) {
returnvalue = true;
errormsg="";

if (form.namekey.value == "") { errormsg+="請填寫【身分證號】\n"; returnvalue = false; }
if (returnvalue == false) { alert(errormsg); form.namekey.focus(); return true;}

var namekey = form.namekey.value;
var numberRegxp = /^[A-Z]{1}[0-9]{9}$/; //格式需為英文1碼 數字9碼
if (numberRegxp.test(namekey) != true){ errormsg+="身分證號格式錯誤\n格式需為英文1碼 數字9碼"; returnvalue = false; }
if (returnvalue == false) { alert(errormsg); form.namekey.focus(); return true;}

if (returnvalue == true) form.sumbit();

}
</script>
</head>

<body>
  <form action="train-5-adduser-ok.php" method="post" onSubmit="return returnvalue">
  <table width="580" align="center" border='1'>
  <tr>
    <td colspan="2" >新通訊綠</td>
  </tr>
  <tr>
    <td><span>姓名</span></td>
    <td><input required="required" type="text" name="account" size="25" maxlength="30" style="width:160px"  /></td>
  </tr>
  <tr>
    <td><span>身分證號</span></td>
    <td>
      <input required="required" type=text name="namekey" size="25" style="width:160px" min="8" maxlength="10" />
      <input required="required" type="radio" name="repeat" value="keyture">可重複
      <input required="required" type="radio" name="repeat" value="keyfalse">不可重複
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
    <td width="25%"><span >&nbsp;</span></td>
    <td><input style:'center'; type=submit onclick="Check_Item(this.form);" value="確定"></td>
  </tr>


</body>

</html>
