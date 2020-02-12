<?php
	include("head.php");
	include ("conn.php");
	include("func.php");
	$pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
	//分页封装函数
	$pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];
	// $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];
	//封装获取总记录数的函数
?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php
	include("leftmenu.php");
?>			  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>序号</th>
					<th>学号</th>
					<th>班号</th>
					<th>性别</th>
					<th>出生日期</th>
					<th>手机号</th>
					<th>照片</th>
					<th>姓名</th>
					<th>操作</th>
				</tr>
				<?php
					// $pagesize = 5;//每页显示5条
					// $sql3 = "select * from 学生 limit ".($pagenum-1)*$pagesize.",".$pagesize;
					// $result2 = mysqli_query($conn,$sql3);
					// if(mysqli_num_rows($result2)>0){
					// 	while($c=mysqli_fetch_assoc($result2)){
					// 		$arrClass[]=$c;
					// 	}
					// }
				$pageAmout = ceil(allList("学生")/$pagesize);
				//最大页数=ceil(总页数/每页条数)
				$arrClass = pageList($pagenum,$pagesize,"学生");
					foreach ($arrClass as $key => $value) {
						// echo "<tr><td>{$value['学号']}</td><td>{$value['班号']}</td><td>{$value['性别']}</td><td>{$value['出生日期']}</td><td>{$value['手机号']}</td><td>{$value['照片']}</td><td>{$value['姓名']}</td><td><a href='xuesheng-edit.php?kid={$value['学号']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='xuesheng-del.php?kid={$value['学号']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
						echo "<tr>";
						echo "<td>".($key+1)."</td>";
							foreach ($value as $i => $item) {
								echo "<td>{$item}</td>";	
							}
							echo "<td><a href='xuesheng-edit.php?kid={$value['学号']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='xuesheng-del.php?kid={$value['学号']}' class='sui-btn btn-small btn-danger'>删除</a></td>";
						echo "</tr>";
					}

				?>
			</table>
			<p>总计：多少条<a href="?pagenum=1">首页</a>&nbsp;&nbsp;
				<a href="?pagenum=<?php echo $pagenum-1 ?>">上一页</a>&nbsp;&nbsp;
				<?php
					for($i=1;$i<=$pageAmout;$i++){
						echo "<a href='?pagenum={$i}'>{$i}</a>";
					}
				?>
				<a href="?pagenum=<?php echo($pagenum+1>$pageAmout)?$pageAmout:$pagenum+1 ?>">下一页</a>
				<a href="?pagenum=<?php echo $pageAmout; ?>">尾页</a></p>
		  </div>
		  
		</div>		
	</div>
<?php
	include("foot.php");
?>