<?php
	header("content-type:text/html;charset=utf-8");
	include("conn.php");
	if($_REQUEST['action']=='add'){
	$tcid = $_REQUEST["tcid"];
	$bzr = $_REQUEST["bzr-xm"];
	$shouji = $_REQUEST["shouji"];

	$sql1 = "insert into 班主任(班主任ID,班主任姓名,手机) value('{$tcid}','{$bzr}','{$shouji}')";
		$str="添加成功";
	}else{
		//否则就是修改
	$tcid = $_REQUEST["tcid"];
	$bzr = $_REQUEST["bzr-xm"];
	$shouji = $_REQUEST["shouji"];	

	$sql1 = "update 班主任 set 班主任姓名='$bzr',手机='$shouji' where 班主任ID='$tcid'";
		$str="修改成功";
}
	$result1 = mysqli_query($conn,$sql1);
	if($result1){
		echo "<script>alert('".$str."');</script>";
		echo "<script>window.history.go(-1);</script>";
		//Refresh:暂停时间
		// header("Refresh:1;url=kecheng-input.php");
	}else{
		echo "数据添加失败".mysqli_error($conn);
	}
	//关闭数据库
	mysqli_close($conn);
?>