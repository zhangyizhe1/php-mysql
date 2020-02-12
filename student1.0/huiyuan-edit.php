<?php
	include("head.php");
	$kid = empty($_GET["kid"])?"null":$_GET["kid"];
	if($kid=="null"){
		die("请选择要修改的记录");
	}else{
		include("conn.php");
		$sql = "select id,email,nickname,question from user where id='{$kid}'";
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
			<p class="sui-text-xxlarge my-padd">id</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="huiyuan-update.php">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">id：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['id']; ?>" name="id" class="input-large input-fat">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">邮件：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['email']; ?>" name="email" class="input-large input-fat">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">用户名：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['nickname']; ?>" name="nickname" class="input-large input-fat">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">密码提示问题：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['question']; ?>" name="question" class="input-large input-fat">
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