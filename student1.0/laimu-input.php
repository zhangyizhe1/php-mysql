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
			<p class="sui-text-xxlarge my-padd">栏目录入</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="laimu-save.php">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">栏目名称：</label>
			    <div class="controls">
			      <input type="text" name="laimu_name" class="input-large input-fat" placeholder="输入栏目名称">
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