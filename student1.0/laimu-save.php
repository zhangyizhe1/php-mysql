<?php
	header("content-type:text/html;charset=utf-8");
	include("conn1.php");
	//接受kecheng-input.php提交的数据保存到数据库中
	$laimu_name = $_REQUEST["laimu_name"];

	$sql = "insert into 栏目(栏目名称) value('$laimu_name')";
	//执行
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('数据添加成功')</script>";
		// echo "<script>window.history.go(-1);</script>";
		//Refresh:暂停时间
		// header("Refresh:1;url=kecheng-input.php");
	}else{
		echo "数据添加失败".mysqli_error($conn);
	}
	//关闭数据库
	mysqli_close($conn);
?>