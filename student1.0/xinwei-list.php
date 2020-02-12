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
					<th>标题</th>
					<th>肩题</th>
					<th>栏目</th>
					<th>作者</th>
					<th>时间</th>
					<th>照片</th>
					<th>内容</th>
					<th>操作</th>
				</tr>
				<?php
					$sql3 = "select * from 新闻";
					$result2 = mysqli_query($conn,$sql3);
					if(mysqli_num_rows($result2)>0){
						while($c=mysqli_fetch_assoc($result2)){
							
							$sql4 = "select * from 栏目 where id=".$c["栏目"];
							$result3 = mysqli_query($conn,$sql4);
							$d = mysqli_fetch_assoc($result3);
							//$b数组中临时添加一个键“班主任姓名”、赋值为上一步查询得到的姓名
							$c["栏目"]=$d["栏目名称"];
							$arrClass[]=$c;
						}
					}
					foreach ($arrClass as $key => $value) {
						echo "<tr>";
							foreach ($value as $i => $item) {
								echo "<td>{$item}</td>";	
							}
							echo "<td><a href='xinwei-edit.php?kid={$value['id']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='xinwei-del.php?kid={$value['id']}' class='sui-btn btn-small btn-danger'>删除</a></td>";
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