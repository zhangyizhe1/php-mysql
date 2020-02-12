<?php
	$host="localhost";
	$user="root";
	$password="168168";
	$db="xinwen";
	$conn= mysqli_connect($host,$user,$password);
	mysqli_select_db($conn,$db);
	mysqli_query($conn,"set names utf8");
?>