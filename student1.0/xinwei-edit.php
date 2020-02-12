<?php
	include("head.php");
	$kid = empty($_GET["kid"])?"null":$_GET["kid"];
	if($kid=="null"){
		die("请选择要修改的记录");
	}else{
		include("conn1.php");
		$sql = "select * from 新闻 where id='{$kid}'";
		$result = mysqli_query($conn,$sql);
		
		//判断有没有记录
		if(mysqli_num_rows($result)>0){
			$arrStudent = mysqli_fetch_assoc($result);
			// $arrClass
		}else{
			echo "<script>alert('找不到这条记录')</script>";
			header("Refresh:1;url=laimu-list.php");
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
			<p class="sui-text-xxlarge my-padd">新闻修改</p>
			<form class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data" action="xinwei-update.php">
				<div class="control-group">
			    <label for="inputEmail" class="control-label">id：</label>
			    <div class="controls">
			      <input type="text" name="xinwei_id" value="<?php echo $arrStudent['id']; ?>" class="input-large input-fat" placeholder="输入标题">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" name="biaoti" value="<?php echo $arrStudent['标题']; ?>" class="input-large input-fat" placeholder="输入标题">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" name="jianti" value="<?php echo $arrStudent['肩题']; ?>" class="input-large input-fat" placeholder="输入肩题">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">栏目：</label>
			    <div class="controls">
			      <select name="laimu_id">
			      	<?php
			      		include("conn1.php");
			      		$sql1 = "select * from 栏目";
			      		print_r($sql1);
			      		$result1=mysqli_query($conn,$sql1);
			      		if(mysqli_num_rows($result1)>0){
			      			while($a=mysqli_fetch_assoc($result1)){
			      				$arrClass[]=$a;
			      			}
			      			foreach ($arrClass as $key => $value) {
			      				echo "<option value='{$value["id"]}'>{$value['栏目名称']}</option>";
			      			}
			      		}
			      	?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">作者：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrStudent['作者']; ?>" name="zuozhe" class="input-large input-fat" placeholder="输入作者">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">时间：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrStudent['时间']; ?>" name="time" class="input-large input-fat" placeholder="输入时间">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">照片：</label>
			    <div class="controls">
			    	<img src="<?php echo $arrStudent['照片']; ?>" width="100" alt="">
			      <input type="file" value="<?php echo $arrStudent['照片']; ?>" name="file1" class="input-large input-fat">
			        <input type="hidden" value=	"<?php echo $arrStudent['照片'] ?>" name="oldphoto">
			    </div>
			   </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">内容：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrStudent['内容']; ?>" name="neirong" class="input-large input-fat" placeholder="输入内容">
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