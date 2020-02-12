<?php
	include("head.php");
	include ("conn1.php");
?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php
	include("leftmenu.php");
?>			  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">栏目列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>id</th>
					<th>栏目名称</th>
					<th>操作</th>
				</tr>
				<?php
					$sql3 = "select * from 栏目";
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
							echo "<td><a href='laimu-edit.php?kid={$value['id']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='laimu-del.php?kid={$value['id']}' class='sui-btn btn-small btn-danger'>删除</a></td>";
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