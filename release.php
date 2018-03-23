<?php
	session_start();
	header("Content-type: text/html; charset=utf-8"); 
	if(!isset($_SESSION['uid']) || $_SESSION['uid'] == "" || !isset($_SESSION['uname']) || $_SESSION['uname'] == "")
		exit("<script>alert('请先登录');location.href='index.php';</script>");
?>
<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>发布作品</title>
	<link rel="shortcut icon" href="su-logo.ico">
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/release.css">
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="wangeditor/dist/css/wangEditor.css"/>
</head>
<body>
	<div class="header">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="#" class="navbar-brand">SHOWU</a>
				</div>
				
				<p class="navbar-text"><span class="glyphicon glyphicon-pencil"></span> 设计作品</p>
				
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 分类 <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<a href="javascript:void(0);" onClick="change_type('摄影');"><span class="glyphicon glyphicon-facetime-video"></span> 摄影</a>
							</li>
							<li>
								<a href="javascript:void(0);" onClick="change_type('画画');"><span class="glyphicon glyphicon-blackboard"></span> 画画</a>
							</li>
							<li>
								<a href="javascript:void(0);" onClick="change_type('音乐');"><span class="glyphicon glyphicon-music"></span> 音乐</a>
							</li>
							<li>
								<a href="javascript:void(0);" onClick="change_type('诗词');"><span class="glyphicon glyphicon-edit"></span> 诗词</a>
							</li>
							<li>
								<a href="javascript:void(0);" onClick="change_type('美食');"><span class="glyphicon glyphicon-cutlery"></span> 美食</a>
							</li>
							<li>
								<a href="javascript:void(0);" onClick="change_type('旅游');"><span class="glyphicon glyphicon-plane"></span> 旅游</a>
							</li>
						</ul>
					</li>
				</ul> 
				
				<button onClick="submit_form();" class="btn btn-default navbar-btn navbar-right commit-button">发布作品</button>
			</div>
		</nav>
		
	</div>
	
	<div class="main-wrap">
		<div class="main">
			<input type="text" class="main-head" name="title" placeholder="请输入标题"/>
            <input type="hidden" name="type" value="" />
			<!-- <input type="file" multiple="multiple" name="file"/> -->
			<!-- 富文本编辑器 -->
			<div id="editor" style="height:450px;">
		   		<p>请输入内容...</p>
		   		
			</div> 
		</div>
	</div>
	 
	
	
	
	<!-- plupload-上传组件 -->
	<script type="text/javascript" src="plupload/plupload.full.min.js"></script>
	<!-- 富文本编辑器的js -->
	<script type="text/javascript" src="wangeditor/dist/js/lib/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="wangeditor/dist/js/wangEditor.min.js"></script>
	

	<script type="text/javascript" src="js/release.js"></script>


</body>
</html>













