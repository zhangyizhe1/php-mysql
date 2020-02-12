<?php
	include("head.php");
	$kid = empty($_GET["kid"])?"null":$_GET["kid"];
	if($kid=="null"){
		die("请选择要修改的记录");
	}else{
		include("conn.php");
		$sql = "select id,学号,课程编号,成绩 from 成绩 where id='{$kid}'";
		$result = mysqli_query($conn,$sql);
		//判断有没有记录
		if(mysqli_num_rows($result)>0){
			$arrStudent = mysqli_fetch_assoc($result);
			// $arrClass
		}else{
			echo "<script>alert('找不到这条记录')</script>";
			header("Refresh:1;url=xuesheng-list.php");
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
			<p class="sui-text-xxlarge my-padd">成绩信息修改</p>
			<form class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data" action="chengji-update.php">
			  <div class="control-group">
			  	
			    <label for="inputEmail" class="control-label">id：</label>
			    <div class="controls">
			      <input type="text" readonly="readonly" value="<?php echo $arrStudent['id']; ?>" name="id" class="input-large input-fat" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" readonly="readonly" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" readonly="readonly" value="<?php echo $arrStudent['学号']; ?>" name="xuehao" class="input-large input-fat" placeholder="输入学号">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" readonly="readonly" class="control-label">课程编号：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrStudent['课程编号']; ?>" name="bianhao" class="input-large input-fat" placeholder="输入班主任">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">成绩：</label>
			    <div class="controls">
			     <input type="text" value="<?php echo $arrStudent['成绩']; ?>" name="chengji" class="input-large input-fat" placeholder="手机号">
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