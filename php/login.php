<?php
    //登录验证
	require 'config.php';
	session_start();
	//验证用户名、密码以及图片验证码是否正确
	$data =$_POST;
	
	$account = $data['account'];
	$password = $data['password'];
	$identifying = $data['identifying'];
	if(!$account || !$password || !$identifying) exit('参数错误');
	if($identifying != $_SESSION['authcode']) exit('验证码错误');
	$sql = mysql_query("select * from user where user_account = '$account'");
	$result = mysql_fetch_assoc($sql);
	if(!$result) exit('用户不存在');
	$password = md5($password.'ShowU');
	if($password != $result['password']) exit('密码错误');
	$_SESSION['uid'] = $result['user_id'];
	$_SESSION['uname'] = $result['user_name'];
	exit('登录成功');
	//account=1522330809&password=111111&identifying=2233
	
	
	
?>
