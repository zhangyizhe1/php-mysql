<?php
	header("content-type:text/html;charset=utf-8");
	include("conn1.php");
	$laimu_id = $_REQUEST['laimu_id'];
	$laimu_name = $_REQUEST['laimu_name'];
	$sql1 = "update 栏目 set 栏目名称='{$laimu_name}' where id='{$laimu_id}'";
	$result = mysqli_query($conn,$sql1);
	if($result){
		echo "<script>alert('修改成功')</script>";
	}else{
		echo "<script>alert('修改失败')</script>".mysqli_error($conn);
	}
	// header("Refresh:1;url=banji-list.php");
	mysqli_close($conn);
?>