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
			<p class="sui-text-xxlarge my-padd">班级信息录入</p>
			<form class="sui-form form-horizontal sui-validate" method="post" action="banji-save.php">
			  <div class="control-group">
			    <label for="kcName" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" name="kc_banhao" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班长：</label>
			    <div class="controls">
			      <input type="text" name="kc_banzhang" class="input-large input-fat"  placeholder="输入班长姓名" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jiaoshi" class="control-label">教室：</label>
			    <div class="controls">
			      <input type="text" name="kc_jiaoshi" class="input-large input-fat"  placeholder="输入教室" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">班主任：</label>
			    <div class="controls">
			      <!-- <input type="text" name="kc_banzhuren" class="input-large input-fat"  placeholder="输入班主任姓名" data-rules="required|maxlength=10"> -->
			      <select id="banzhuren" name="banzhuren">
			      	<?php
			      		$sql1 = "select * from 班主任";
			      		$result1=mysqli_query($conn,$sql1);
			      		if(mysqli_num_rows($result1)>0){
			      			while($a=mysqli_fetch_assoc($result1)){
			      				$arrClass[]=$a;
			      			}
			      			foreach ($arrClass as $key => $value) {
			      				echo "<option value='{$value["班主任ID"]}'>{$value['班主任姓名']}</option>";
			      			}
			      		}
			      	?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">班级口号：</label>
			    <div class="controls">
			      <input type="text" name="kc_kouhao" class="input-large input-fat"  placeholder="输入班级口号" data-rules="required|minlength=2|maxlength=20">
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