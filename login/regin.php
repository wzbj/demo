<?php
	require_once("conn.php");
	$name=trim($_POST['username']);
	$password=$_POST['password'];
	$sql = "select * from user where username='$name'";
	$info=mysql_query($sql);
	$res=mysql_num_rows($info);
	if(empty($name)){
		echo "<script>alert('用户名不能为空');location.href='reg.php';</script>";
	}else if(empty($password)){
		echo "<script>alert('密码不能为空');location.href='reg.php';</script>";
	}else{
		if($res){
			echo "<script>alert('用户名已存在');location.href='reg.php';</script>";
		}else{
			$sql1="insert into user(username,password) values('".$name."','".md5($password)."')";
			$result = mysql_query($sql1);
			if($result){
				echo "<script>alert('注册成功');</script>";
				echo $result;
			}else{
				echo "<script>alert('注册失败');</script>";
				echo $result;
			}
		}
	}
?>