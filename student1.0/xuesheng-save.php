<?php
	header("content-type:text/html;charset=utf-8");
	include("conn.php");
	if($_REQUEST['action']=='add'){
		//判断哪个网页传过来的
		if($_FILES["file1"]["error"]>0){
			//error>0 则该文件上传不成功 及错误详情
			echo "上传不成功".$_FILES["file1"]["error"];
		}else{
			//否则上传成功
			// echo "上传文件的名称".$_FILES["file1"]["name"];
		// echo "上传文件的类型".$_FILES["file1"]["type"];
		// echo "上传文件的大小".$_FILES["file1"]["size"]; 
		// echo "临时文件的路径".$_FILES["file1"]["tmp_name"];
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
	$xuehao = $_REQUEST["xuehao"];
	$banhao = $_REQUEST["banhao"];
	$sex = $_REQUEST["sex"];
	$chusheng = $_REQUEST["chusheng"];
	$shouji = $_REQUEST["shouji"];
	$xingming = $_REQUEST["xingming"];

	$sql1 = "insert into 学生(学号,班号,性别,出生日期,手机号,照片,姓名) value('{$xuehao}','{$banhao}','{$sex}','{$chusheng}',{$shouji},'{$newname}','{$xingming}')";
		$str="添加成功";
	}else{
		//否则就是修改
		// die ($_FILES["file1"]["error"]);
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
	$xuehao = $_REQUEST["xuehao"];
	$banhao = $_REQUEST["banhao"];
	$sex = $_REQUEST["sex"];
	$chusheng = $_REQUEST["chusheng"];
	$shouji = $_REQUEST["shouji"];
	$xingming = $_REQUEST["xingming"];

	$sql1 = "update 学生 set 班号='$banhao',性别='$sex',出生日期='$chusheng',手机号='$shouji',照片='$newname',姓名='$xingming' where 学号='$xuehao'";
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