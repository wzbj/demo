<?php
	include 'conn.inc.php';
	$mysqli = new mysqli(HOST,USER,PWD,DBNAME);
	if($mysqli->connect_errno){
		die('数据库连接出错'.$mysqli->connect_error);
	}

?>