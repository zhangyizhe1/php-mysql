<?php
	header("content-type:text/html;charset=utf-8");
	include("conn.php");
	$kc_name = $_REQUEST['kc_name'];
	$kc_sn = $_REQUEST['kc_sn'];
	$sql = "update 课程 set 课程名='{$kc_name}' where 课程编号='{$kc_sn}'";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('修改成功')</script>";
	}else{
		echo "<script>alert('修改失败')</script>";
	}
	header("Refresh:1;url=kecheng-list.php");
	mysqli_close($conn);
?>