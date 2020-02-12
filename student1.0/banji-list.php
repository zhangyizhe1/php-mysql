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
					<th>班号</th>
					<th>教室</th>
					<th>班主任</th>
					<th>班级口号</th>
					<th>班长</th>
					<th>操作</th>
				</tr>
				<?php
					$sql3 = "select 班号,教室,班主任,班级口号,班长 from 班级";
					$result2 = mysqli_query($conn,$sql3);
					if(mysqli_num_rows($result2)>0){
						while($c=mysqli_fetch_assoc($result2)){
							print_r($c);
							$sql4 = "select * from 班主任 where 班主任ID=".$c["班主任"];
							$result3 = mysqli_query($conn,$sql4);
							$d = mysqli_fetch_assoc($result3);
							//$b数组中临时添加一个键“班主任姓名”、赋值为上一步查询得到的姓名
							$c["班主任姓名"]=$d["班主任姓名"];
							$arrClass[]=$c;
						}
					}
					foreach ($arrClass as $key => $value) {
						echo "<tr><td>{$value['班号']}</td><td>{$value['教室']}</td><td>{$value['班主任姓名']}</td><td>{$value['班级口号']}</td><td>{$value['班长']}</td><td><a href='banji-edit.php?kid={$value['班号']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='banji-del.php?kid={$value['班号']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
					}

				?>
			</table>
		  </div>
		</div>		
	</div>
<?php
	include("foot.php");
?>