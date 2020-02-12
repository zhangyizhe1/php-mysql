<?php
	header("content-type:text/html;charset=utf-8");
	include("conn.php");
	//接受kecheng-input.php提交的数据保存到数据库中
	$xuehao = $_REQUEST["xuehao"];
	$bianhao = $_REQUEST["bianhao"];
	$chengji = $_REQUEST["chengji"];
	$sql1 = "insert into 成绩(学号,课程编号,成绩) value('$xuehao','$bianhao',$chengji)";
	//执行
	$result1 = mysqli_query($conn,$sql1);
	if($result1){
		echo "<script>alert('数据添加成功')</script>";
		echo "<script>window.history.go(-1);</script>";
		//Refresh:暂停时间
		// header("Refresh:1;url=kecheng-input.php");
	}else{
		echo "数据添加失败".mysqli_error($conn);
	}
	//关闭数据库
	mysqli_close($conn);
?>