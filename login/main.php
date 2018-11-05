<?php
	require_once("conn.php");//首先连接数据库
	$name=$_POST['username'];
	$password=$_POST['userpassword'];
	$sql = "select * from user where username='$username' and password='$password'";
	$info = mysql_query($sql);
	$row = mysql_fetch_row($info);
	if($row){
		echo "<script>alert('登录成功')</script>";
	}else{
		echo "<script>alert('登录失败')</script>";
		echo "<script>location.href='login.php'</script>";
	}
?>