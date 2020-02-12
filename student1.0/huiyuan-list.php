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
			<p class="sui-text-xxlarge my-padd">会员列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>id</th>
					<th>邮件</th>
					<th>名称</th>
					<th>密码提示问题</th>
					<th>操作</th>
				</tr>
				<?php
					$sql2 = "select id,email,nickname,question from user";
					$result = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($result)>0){
						while($b=mysqli_fetch_assoc($result)){
							$sql4 = "select * from question where id=".$b["question"];
							$result3 = mysqli_query($conn,$sql4);
							$d = mysqli_fetch_assoc($result3);
							//$b数组中临时添加一个键“班主任姓名”、赋值为上一步查询得到的姓名
							$b["姓名"]=$d["question"];
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
						echo "<tr><td>{$value['id']}</td><td>{$value['email']}</td><td>{$value['nickname']}</td><td>{$value['姓名']}</td><td><a href='huiyuan-edit.php?kid={$value['id']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='huiyuan-del.php?kid={$value['id']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
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