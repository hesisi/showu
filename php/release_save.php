<?php
	session_start();
	require("config.php");
	if(!isset($_SESSION['uid']) || $_SESSION['uid'] == "" || !isset($_SESSION['uname']) || $_SESSION['uname'] == "")
		exit("请先登录");
	$title = $_POST['title'];
	$content = $_POST['content'];
	$type = $_POST['type'];
	if(!$title || !$content || !$type)
		exit('参数错误');
	$time = time();
	$sql = mysql_query("insert into news set title = '$title' , content = '$content' , type = '$type' , time = $time , uid = ".$_SESSION['uid']." , uname = '".$_SESSION['uname']."'");
	if(!$sql)
		exit('发布失败');
	echo '发布成功';
?>