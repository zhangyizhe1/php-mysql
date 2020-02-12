<?php
	include("head.php");

?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php
	include("leftmenu.php");
?>			  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻录入</p>
			<form class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data" action="xinwei-save.php">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" name="biaoti" class="input-large input-fat" placeholder="输入标题">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" name="jianti" class="input-large input-fat" placeholder="输入肩题">
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
			      <input type="text" name="zuozhe" class="input-large input-fat" placeholder="输入作者">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">时间：</label>
			    <div class="controls">
			      <input type="text" name="time" class="input-large input-fat" placeholder="输入时间">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">照片：</label>
			    <div class="controls">
			      <input type="file" name="file1" class="input-large input-fat">
			    </div>
			   </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">内容：</label>
			    <div class="controls">
			      <input type="text" name="neirong" class="input-large input-fat" placeholder="输入内容">
			    </div>
			  </div>	
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
	</div>
<?php
	include("foot.php");
?>