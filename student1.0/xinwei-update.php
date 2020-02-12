<?php
	header("content-type:text/html;charset=utf-8");
	include("conn1.php");
	if($_FILES["file1"]["error"]>0){  //4
		$newname = $_REQUEST["oldphoto"];
		// echo "123";
		}else{
		if($_FILES["file1"]["type"]=="image/gif" || $_FILES["file1"]["type"]=="image/jpeg"|| $_FILES["file1"]["type"]=="image/png" && $_FILES["file1"]["size"]<2097152){
				$randomStr = date('YmdHis');//时间 精确到秒数
				$houzhui = substr($_FILES["file1"]["name"],-4,4);//后缀名

				$newname = "upload/".$randomStr.$houzhui;//相对路径
				$filename = __DIR__."/".$newname;
				//参数1：临时文件的路径，参数2：最终存放的路径
				move_uploaded_file($_FILES["file1"]["tmp_name"],$filename);
			}else{
				echo "上传的文件格式或大小不对";
			}
	}
	$xinwei_id = $_REQUEST["xinwei_id"];
	$biaoti = $_REQUEST["biaoti"];
	$jianti = $_REQUEST["jianti"];
	$laimu_id = $_REQUEST["laimu_id"];
	$zuozhe = $_REQUEST["zuozhe"];
	$time = $_REQUEST["time"];
	$neirong = $_REQUEST["neirong"];
	$sql1 = "update 新闻 set 标题='{$biaoti}',肩题='{$jianti}',栏目='{$laimu_id}',作者='{$zuozhe}',时间='{$time}',照片='$newname',内容='{$neirong}' where id='{$xinwei_id}'";
	$result = mysqli_query($conn,$sql1);
	if($result){
		echo "<script>alert('修改成功')</script>";
	}else{
		echo "<script>alert('修改失败')</script>".mysqli_error($conn);
	}
	// header("Refresh:1;url=banji-list.php");
	mysqli_close($conn);
?>