<?php

    session_start();
	require 'config.php';
	//require 'shortMessage.php';
	
	//name=hesisi&account=15223306809&verification-code=2333&password=hss123456&confirm-pwd=hss123456
	$data =$_POST; //数组
	$name = $data['name'];
	$account =$data['account'];
	$verifcode = $data['verification-code'];
	$password = $data['password'];
	$confirmpwd = $data['confirm-pwd'];
	
	$mobile_code = $_SESSION['mobile_code'];
	$mobile = $_SESSION['mobile'];
	if($account != $mobile) exit("手机号不正确");
	//echo $mobile_code;
	//$account = 1522330680;


	$sql = mysql_query("SELECT * from user WHERE user_account='$account'");
	$result = mysql_fetch_assoc($sql);
	
	if($result) exit("该手机号已经注册");
	
	//$row=mysqli_fetch_array($result,MYSQLI_NUM);
	//printf ("%s : %s",$row[0],$row[1]);
	if($password != $confirmpwd) exit('两次密码不一致');
	
	if($verifcode != $mobile_code){//手机验证码错误
	    exit("手机验证码错误！");

	}else{
	    $password = md5($password."ShowU");
	    $insert = "INSERT INTO user(user_name,password,user_account) VALUES('$name','$password','$account')";
	    mysql_query($insert);
	    exit('注册成功');
	}
	

	
	

?>