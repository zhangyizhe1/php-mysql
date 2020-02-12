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
			<p class="sui-text-xxlarge my-padd">学生成绩录入</p>
			<form class="sui-form form-horizontal sui-validate" enctype="multipart/form-data" method="post" action="chengji-save.php">
			  <div class="control-group">
			    <label for="kcName" class="control-label">学号：</label>
			    <div class="controls">
			    	<select id="banzhuren" name="xuehao">
			      	<?php
			      		include("conn.php");
			      		$sql1 = "select 学号 from 学生";
			      		$result1=mysqli_query($conn,$sql1);
			      		if(mysqli_num_rows($result1)>0){
			      			while($a=mysqli_fetch_assoc($result1)){
			      				$arrClass[]=$a;
			      			}
			      			foreach ($arrClass as $key => $value) {
			      				echo "<option value='{$value['学号']}'>{$value['学号']}</option>";
			      			}
			      		}
			      	?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程编号：</label>
			    <div class="controls">
			      <select id="banzhuren" name="bianhao">
			      	<?php
			      		include("conn.php");
			      		$sql2 = "select 课程编号,课程名 from 课程";
			      		$result2=mysqli_query($conn,$sql2);
			      		if(mysqli_num_rows($result2)>0){
			      			while($a=mysqli_fetch_assoc($result2)){
			      				$arrClas[]=$a;
			      			}
			      			foreach ($arrClas as $key => $value) {
			      				echo "<option value='{$value['课程编号']}'>{$value['课程名']}</option>";
			      			}
			      		}
			      	?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">成绩：</label>
			    <div class="controls">
					<input type="text" name="chengji" class="input-large input-fat" placeholder="输入成绩">
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