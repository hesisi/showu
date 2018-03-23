<?php
	session_start();
	require("config.php");
	header("Content-type: text/html; charset=utf-8"); 
	if(!isset($_SESSION['uid']) || $_SESSION['uid'] == "" || !isset($_SESSION['uname']) || $_SESSION['uname'] == "")
		exit("<script>alert('请先登录');location.href='index.php';</script>");
	$password = $_POST['password'];
	if(!$password)
		exit("<script>alert('密码不能为空');location.href='../setting.php';</script>");
	$password = md5($password."ShowU");
	$sql = mysql_query("update user set password = '$password' where user_id = ".$_SESSION['uid']);
	if(!$sql)
		exit("<script>alert('修改失败');location.href='../setting.php';</script>");
	echo "<script>alert('修改成功');location.href='logout.php';</script>";
?>