<?php
	session_start();
	//检测session是否为空，是空的话跳转到登录页面
	if(empty($_SESSION["uname"])){
		echo "<script>alert('无权限访问')</script>";
		header("Refresh:0;url=login.php");
	}
	include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>班级信息录入</title>
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">	

</head>
<body>
	<div class="sui-container">
		<div class="my-head">北京网络职业学院学生管理系统 V1.0
			<p style="display: inline-block;float: right;">欢迎<span style="color: red;"><?php echo $_SESSION["uname"] ?></span>登录&nbsp;&nbsp;<a href="loginout.php">注销</a></p>
		</div>