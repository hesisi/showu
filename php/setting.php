<?php
	date_default_timezone_set("PRC");
	session_start();
	require("config.php");
	header("Content-type: text/html; charset=utf-8"); 
	if(!isset($_SESSION['uid']) || $_SESSION['uid'] == "" || !isset($_SESSION['uname']) || $_SESSION['uname'] == "")
		exit("<script>alert('请先登录');location.href='index.php';</script>");
	$user_name = $_POST['user_name'];
	$signature = $_POST['signature'];
	if(!$user_name)
		exit("<script>alert('请输入昵称');location.href='../setting.php';</script>");
	if(isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] != 4){
		if($_FILES['imageFile']['error']>0){
			switch($_FILES['imageFile']['error']){
				case 1: echo '<script>alert("文件大小超过配置文件的设置");location.href="../setting.php";</script>';break;
				case 2: echo '<script>alert("文件大小超过表单约定限制");location.href="../setting.php";</script>';break;
				case 3: echo '<script>alert("文件部分没有上传");location.href="../setting.php";</script>';break;
				case 4: echo '<script>alert("没有上传文件");location.href="../setting.php";</script>';break;
			}
			exit;
		}
		if(!in_array($_FILES['imageFile']['type'],array('image/jpeg','image/png','image/jpg','image/bmp'))){
			echo '<script>alert("文件类型不正确");location.href="../setting.php";</script>';
			exit;
		}
		if(is_uploaded_file($_FILES['imageFile']['tmp_name'])){
			$t = date('Y-m-d');
			$dir = dirname(__file__).'/upload/';
			if(!file_exists($dir)){
				if(!mkdir($dir)){
					echo '<script>alert("创建文件夹失败");location.href="../setting.php";</script>';
					exit;
				}
			}
$yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
$orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
			$file_name = $dir.$orderSn.".".substr(strrchr( $_FILES['imageFile']['name'], '.'), 1);
			if(!move_uploaded_file($_FILES['imageFile']['tmp_name'],$file_name)){
				echo '<script>alert("文件移动失败");location.href="../setting.php";</script>';
			}
			$head_picture = "php/upload/".$orderSn.".".substr(strrchr( $_FILES['imageFile']['name'], '.'), 1);
		}else{
			echo '<script>alert("上传非法文件,不是HTTP POST上传文件");location.href="../setting.php";</script>';
			exit;
		}
	}
	$sql = mysql_query("update user set user_name = '$user_name', head_picture = '".$head_picture."' , signature = '$signature' where user_id = ".$_SESSION['uid']);
	if(!$sql)
		exit("<script>alert('修改失败');location.href='../setting.php'</script>");
	echo "<script>alert('修改成功');location.href='../setting.php'</script>";
?>