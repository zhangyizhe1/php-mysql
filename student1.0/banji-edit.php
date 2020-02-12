<?php
	include("head.php");
	$kid = empty($_GET["kid"])?"null":$_GET["kid"];
	if($kid=="null"){
		die("请选择要修改的记录");
	}else{
		include("conn.php");
		$sql = "select * from 班级 where 班号='{$kid}'";
		$result = mysqli_query($conn,$sql);
		//判断有没有记录
		if(mysqli_num_rows($result)>0){
			$arrClass = mysqli_fetch_assoc($result);
	
			print_r($arrClass);
			// $arrClass
		}else{
			echo "<script>alert('找不到这条记录')</script>";
			header("Refresh:1;url=banji-list.php");
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
			<p class="sui-text-xxlarge my-padd">班级修改</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="banji-update.php">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['班号']; ?>" name="kc_banhao" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">教室：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['教室']; ?>" name="kc_jiaoshi" class="input-large input-fat" placeholder="输入教室">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['班主任']; ?>" name="kc_banzhuren" class="input-large input-fat" placeholder="输入班主任">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班级口号：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['班级口号']; ?>" name="kc_kouhao" class="input-large input-fat" placeholder="输入班主任">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班长：</label>
			    <div class="controls">
			     <input type="text" value="<?php echo $arrClass['班长']; ?>" name="kc_banzhang" class="input-large input-fat" placeholder="输入班长">
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