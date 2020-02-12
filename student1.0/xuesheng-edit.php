<?php
	include("head.php");
	$kid = empty($_GET["kid"])?"null":$_GET["kid"];
	if($kid=="null"){
		die("请选择要修改的记录");
	}else{
		include("conn.php");
		$sql = "select 学号,班号,性别,出生日期,手机号,照片,姓名 from 学生 where 学号='{$kid}'";
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
			<p class="sui-text-xxlarge my-padd">学生信息修改</p>
			<form class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data" action="xuesheng-save.php">
			  <div class="control-group">
			  	
			    <label for="inputEmail" class="control-label">学号：</label>
			    <div class="controls">
			    	<input type="hidden" name="action" value="update">
			      <input type="text" readonly="readonly" value="<?php echo $arrStudent['学号']; ?>" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" readonly="readonly" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrStudent['班号']; ?>" name="banhao" class="input-large input-fat" placeholder="输入班号">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">性别：</label>
			    <div class="controls">
			      <select name="sex">
			      	<option value="1" <?php if($arrStudent['性别']==1){echo "checked";} ?>>男</option>
			      	<option value="0" <?php if($arrStudent['性别']==0){echo "checked";} ?>>女</option>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">出生日期：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrStudent['出生日期']; ?>" name="chusheng" class="input-large input-fat" placeholder="输入班主任">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">手机号：</label>
			    <div class="controls">
			     <input type="text" value="<?php echo $arrStudent['手机号']; ?>" name="shouji" class="input-large input-fat" placeholder="手机号">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">照片：</label>
			    <div class="controls">
			    	<img src="<?php echo $arrStudent['照片']; ?>" width="100" alt="">
			    	<input type="file" id="file1" name="file1" class="input-large input-fat">
			   <!--   <input type="file" name="file1" class="input-large input-fat" placeholder="手机号"> -->
			     <input type="hidden" value=	"<?php echo $arrStudent['照片'] ?>" name="oldphoto">
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="inputEmail" class="control-label">姓名：</label>
			    <div class="controls">
			     <input type="text" value="<?php echo $arrStudent['姓名']; ?>" name="xingming" class="input-large input-fat" placeholder="输入姓名">
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