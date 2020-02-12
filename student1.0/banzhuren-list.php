<?php
	include("head.php");
	include ("conn.php");
?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php
	include("leftmenu.php");
?>			  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>班主任ID</th>
					<th>班主任姓名</th>
					<th>手机</th>
					<th>操作</th>
				</tr>
				<?php
					$sql3 = "select * from 班主任";
					$result2 = mysqli_query($conn,$sql3);
					if(mysqli_num_rows($result2)>0){
						while($c=mysqli_fetch_assoc($result2)){
							$arrClass[]=$c;
						}
					}
					foreach ($arrClass as $key => $value) {
						echo "<tr>";
							foreach ($value as $i => $item) {
								echo "<td>{$item}</td>";	
							}
							echo "<td><a href='banzhuren-edit.php?kid={$value['班主任ID']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='banzhuren-del.php?kid={$value['班主任ID']}' class='sui-btn btn-small btn-danger'>删除</a></td>";
						echo "</tr>";
					}
				?>
			</table>
		  </div>
		</div>		
	</div>
<?php
	include("foot.php");
?>