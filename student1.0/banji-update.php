<?php
	header("content-type:text/html;charset=utf-8");
	include("conn.php");
	$banhao = $_REQUEST['kc_banhao'];
	$jiaoshi = $_REQUEST['kc_jiaoshi'];
	$banzhuren = $_REQUEST['kc_banzhuren'];
	$kouhao = $_REQUEST['kc_kouhao'];
	$banzhang = $_REQUEST['kc_banzhang'];
	$sql1 = "update 班级 set 教室='{$jiaoshi}',班主任='{$banzhuren}',班级口号='{$kouhao}',班长='{$banzhang}' where 班号='{$banhao}'";
	$result = mysqli_query($conn,$sql1);
	if($result){
		echo "<script>alert('修改成功')</script>";
	}else{
		echo "<script>alert('修改失败')</script>".mysqli_error($conn);
	}
	// header("Refresh:1;url=banji-list.php");
	mysqli_close($conn);
?>