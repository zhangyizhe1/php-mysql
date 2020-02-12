<?php
	header("content-type:text/html;charset=utf-8");
	include("conn.php");
	$id = $_REQUEST['id'];
	$email = $_REQUEST['email'];
	$nickname = $_REQUEST['nickname'];
	$question = $_REQUEST['question'];
	$sql1 = "update user set id='{$id}',email='{$email}',nickname='{$nickname}',question='{$question}' where id='{$id}'";
	print_r($sql1);
	$result = mysqli_query($conn,$sql1);
	if($result){
		echo "<script>alert('修改成功')</script>";
	}else{
		echo "<script>alert('修改失败')</script>".mysqli_error($conn);
	}
	// header("Refresh:1;url=banji-list.php");
	mysqli_close($conn);
?>