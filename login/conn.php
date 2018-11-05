<?php
	header("Content-type:text/html;charset=utf-8");//设置编码
	$con = mysql_connect("localhost","root","admin") or die("数据库连接失败");
	mysql_select_db('login') or die("指定数据库的字符集");
	mysql_query("set names urf8");//设置数据库的字符集
?>