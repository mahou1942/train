<!DOCTYPE html>
<?php
include '../init.php';
 ?>
<html >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>業務人員登出</title>
	<meta name="keywords" content="登出" />
	<meta name="description" content="登出" />
	<link rel="stylesheet" href="../css/login.css" type="text/css" />

</head>
<body>
	<?php
	session_start();
	$_SESSION = array();
	session_destroy();

	jump('../index.php', '登出完成');

	 ?>
	</form>
</body>
</html>
