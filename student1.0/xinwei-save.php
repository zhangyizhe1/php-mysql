<?php
	header("content-type:text/html;charset=utf-8");
	include("conn1.php");
	//接受kecheng-input.php提交的数据保存到数据库中
	if($_FILES["file1"]["error"]>0){
			//error>0 则该文件上传不成功 及错误详情
			echo "上传不成功".$_FILES["file1"]["error"];
		}else{
			if($_FILES["file1"]["type"]=="image/gif" || $_FILES["file1"]["type"]=="image/jpeg"||$_FILES["file1"]["type"]=="image/pjpeg" || $_FILES["file1"]["type"]=="image/png" && $_FILES["file1"]["size"]<2097152){
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
	$biaoti = $_REQUEST["biaoti"];
	$jianti = $_REQUEST["jianti"];
	$laimu_id = $_REQUEST["laimu_id"];
	$zuozhe = $_REQUEST["zuozhe"];
	$time = $_REQUEST["time"];
	$neirong = $_REQUEST["neirong"];

	$sql = "insert into 新闻(标题,肩题,栏目,作者,时间,照片,内容) value('$biaoti','$jianti','$laimu_id','$zuozhe','$time','$newname','$neirong')";
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