<?php
	include("head.php");
	$kid = empty($_GET["kid"])?"null":$_GET["kid"];
	if($kid=="null"){
		die("请选择要修改的记录");
	}else{
		include("conn.php");
		$sql = "select 课程编号,课程名 from 课程 where 课程编号='{$kid}'";
		$result = mysqli_query($conn,$sql);
		//判断有没有记录
		if(mysqli_num_rows($result)>0){
			$arrClass = mysqli_fetch_assoc($result);
		}else{
			echo "<script>alert('找不到这条记录')</script>";
			header("Refresh:1;url=kecheng-list.php");
		}
		mysqli_close($conn);
	}
?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php
	include("leftmenu.php");
?>			  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程修改</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="kecheng-update.php">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程名：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['课程名']; ?>" name="kc_name" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程编号：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['课程编号']; ?>" name="kc_sn" class="input-large input-fat" placeholder="输入课程编号">
			    </div>
			  </div>	
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="修改" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
	</div>
<?php
	include("foot.php");
?>