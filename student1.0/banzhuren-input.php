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
			<p class="sui-text-xxlarge my-padd">班主任信息录入</p>
			<form class="sui-form form-horizontal sui-validate" enctype="multipart/form-data" method="post" action="banzhuren-save.php">
			  <div class="control-group">
			    <label for="kcName" class="control-label">班主任ID：</label>
			    <div class="controls">
			    	<input type="hidden" name="action" value="add">
			      <input type="text" name="tcid" class="input-large input-fat" placeholder="输入ID">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任姓名：</label>
			    <div class="controls">
			      <input type="text" name="bzr-xm" class="input-large input-fat"  placeholder="输入班主任姓名" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">手机：</label>
			    <div class="controls">
			      <input type="text" name="shouji" class="input-large input-fat"  placeholder="输入手机">
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