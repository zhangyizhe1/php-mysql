<?php
function pageList($pagenum=1,$pagesize=5,$tablename){
		global $conn;
			$sql3 = "select * from ".$tablename." limit ".($pagenum-1)*$pagesize.",".$pagesize;
			$result2 = mysqli_query($conn,$sql3);
			$arr = array();
			if(mysqli_num_rows($result2)>0){
				while($c=mysqli_fetch_assoc($result2)){
					$arr[]=$c;
				}
			}
			return $arr;
	}
	function allList($tablename){
		global $conn;
		$sql = "select count(*) as allnum from ".$tablename;
		$result=mysqli_query($conn,$sql);
		return mysqli_fetch_assoc($result)["allnum"];
	}
?>
