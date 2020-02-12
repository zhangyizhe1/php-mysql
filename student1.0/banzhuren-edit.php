<?php
	include("head.php");
	$kid = empty($_GET["kid"])?"null":$_GET["kid"];
	if($kid=="null"){
		die("请选择要修改的记录");
	}else{
		include("conn.php");
		$sql = "select 班主任ID,班主任姓名,手机 from 班主任 where 班主任ID='{$kid}'";
		$result = mysqli_query($conn,$sql);
		//判断有没有记录
		if(mysqli_num_rows($result)>0){
			$arrClass = mysqli_fetch_assoc($result);
			// $arrClass
		}else{
			echo "<script>alert('找不到这条记录')</script>";
			// header("Refresh:1;url=banji-list.php");
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
			<p class="sui-text-xxlarge my-padd">班主任修改</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="banzhuren-save.php">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任ID：</label>
			    <div class="controls">
			    	<input type="hidden" name="action" value="update">
			      <input type="text" value="<?php echo $arrClass['班主任ID']; ?>" name="tcid" class="input-large input-fat" placeholder="输入班号">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任姓名：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['班主任姓名']; ?>" name="bzr-xm" class="input-large input-fat" placeholder="输入教室">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">手机：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['手机']; ?>" name="shouji" class="input-large input-fat" placeholder="输入班主任">
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