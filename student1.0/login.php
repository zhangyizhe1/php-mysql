<?php
	session_start();
	include("conn.php");
	if(!empty($_REQUEST["submit"])){
		$uname = $_REQUEST["uname"];
		$password = $_REQUEST["password"];
		$sql = "select * from admin where uname='$uname' and password='$password'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$_SESSION['uname'] = $uname;
			header("Refresh:0;url=index.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form method="post" action="?">
		<label>账号：</label>
		<input type="text" name="uname">
		<br>
		<label>密码：</label>
		<input type="password  " name="password">
		<br>
		<input type="submit" name="submit" value="登录">
	</form>
</body>
</html>