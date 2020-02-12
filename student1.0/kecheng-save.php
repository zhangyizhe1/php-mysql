<?php
	header("content-type:text/html;charset=utf-8");
	include("conn.php");
	//接受kecheng-input.php提交的数据保存到数据库中
	$kc_name = $_REQUEST["kc_name"];
	$kc_sn = $_REQUEST["kc_sn"];

	$sql = "insert into 课程(课程编号,课程名) value('$kc_sn','$kc_name')";
	//执行
	$result = mysqli_query($conn,$sql);
	if($result){
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