<!DOCTYPE html>
<html >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>用戶登入</title>
	<meta name="keywords" content="登入" />
	<meta name="description" content="用戶登入" />
	<link rel="stylesheet" href="../css/login.css" type="text/css" />

</head>
<body>
	<form action = "./train-6-userdate.php" method="POST">
		<h1>用戶登入</h1>
		<input type="text" id="account" name="account" placeholder="身分證號"/>
		<input type="password" id="password" name="user_password" placeholder="密碼"/>
		<input type="submit" id="subit" value="提交"/>

		<a  href="./train-6-useradd.php">用戶註冊</a>
	</form>
</body>
</html>
