<?php
	header("content-type:text/html;charset=utf-8");
	include("conn.php");
	$id = $_REQUEST["id"];
	$xuehao = $_REQUEST["xuehao"];
	$bianhao = $_REQUEST["bianhao"];
	$chengji = $_REQUEST["chengji"];
	$sql1 = "update 成绩 set id='{$id}',学号='{$xuehao}',课程编号='{$bianhao}',成绩={$chengji} where id='{$id}'";
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