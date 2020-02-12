<?php
	header("content-type:text/html;charset=utf-8");
	include("conn.php");
	//接受kecheng-input.php提交的数据保存到数据库中
	$kc_banhao = $_REQUEST["kc_banhao"];
	$kc_banzhang = $_REQUEST["kc_banzhang"];
	$kc_jiaoshi = $_REQUEST["kc_jiaoshi"];
	$kc_banzhuren = $_REQUEST["banzhuren"];
	$kc_kouhao = $_REQUEST["kc_kouhao"];

	$sql1 = "insert into 班级(班号,教室,班主任,班级口号,班长) value('$kc_banhao','$kc_jiaoshi','$kc_banzhuren','$kc_kouhao','$kc_banzhang')";
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