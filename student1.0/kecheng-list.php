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
			<p class="sui-text-xxlarge my-padd">课程列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>序号</th>
					<th>课程编号</th>
					<th>课程名</th>
					<th>操作</th>
				</tr>
				<?php
					$sql2 = "select 课程编号,课程名 from 课程";
					$result = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($result)>0){
						while($b=mysqli_fetch_assoc($result)){
							$arrClass[]=$b;
						}
					}
					// var_dump($arrClass);
					//根据结果生成表格页面
					/*
						array{
							0=array(
								"课程编号"=>"B01";
								"课程名"=>"HTML+Css基础"
							),
							1=array(),
							...
						}
					*/
					foreach ($arrClass as $key => $value) {
						echo "<tr><td>".($key+1)."</td><td>{$value['课程编号']}</td><td>{$value['课程名']}</td><td><a href='kecheng-edit.php?kid={$value['课程编号']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='kecheng-del.php?kid={$value['课程编号']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
					}

				?>
			<!-- 	<tr>
					<td>1</td>
					<td>B01</td>
					<td>HTML+CSS基础</td>
					<td><a class="sui-btn btn-small btn-warning">编辑</a>&nbsp;<a class="sui-btn btn-small btn-danger">删除</a></td>
				</tr> -->
			</table>
		  </div>
		</div>		
	</div>
<?php
	include("foot.php");
?>