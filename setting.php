<?php
	session_start();
	require("php/config.php");
	header("Content-type: text/html; charset=utf-8"); 
	if(!isset($_SESSION['uid']) || $_SESSION['uid'] == "" || !isset($_SESSION['uname']) || $_SESSION['uname'] == "")
		exit("<script>alert('请先登录');location.href='index.php';</script>");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>设置 - ShowU</title>
	<link rel="shortcut icon" href="su-logo.ico">
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/setting.css">
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/setting.js"></script>
</head>
<body>
	<!--摄影，诗词，画画，小说，音乐，舞蹈-->
	<div class="header">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- mobile display-->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigator" aria-expanded="false">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">SHOWU</a>
				</div>

				<!--正常显示的导航-->
				<div class="collapse navbar-collapse" id="navigator">
					<ul class="nav navbar-nav">
						<li><a href="index.php?type=摄影">摄影</a></li>
						<li><a href="index.php?type=画画">画画</a></li>
						<li><a href="index.php?type=音乐">音乐</a></li>
						<li><a href="index.php?type=诗词">诗词</a></li>
						<li><a href="index.php?type=舞蹈">舞蹈</a></li>
						<li><a href="index.php?type=旅游">旅游</a></li>
					</ul>

					<form class="navbar-form navbar-left sreach-from">
						<div class="form-group">
							<input type="text" class="form-control"style="width:300px;" placeholder="搜索你感兴趣的原创作品..."/>
						</div>
						<button type="submit" class="btn btn-default search-btn">搜索</button>
					</form>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-bell" style="color:#4C9ED9;"></span> 消息 <span class="badge">12</span></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">个人中心 <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href=""><span class="glyphicon glyphicon-user"></span> 我的主页</a>
								</li>
								<li>
									<a href=""><span class="glyphicon glyphicon-envelope"></span> 私信</a>
								</li>
								<li>
									<a href=""><span class="glyphicon glyphicon-cog"></span> 设置</a>
								</li>
								<li>
									<a href=""><span class="glyphicon glyphicon-off"></span> 退出</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			
		</nav>
	</div>
	<?php
    	$sql = mysql_query("select * from user where user_id = ".$_SESSION['uid']);
		$result = mysql_fetch_assoc($sql);
	?>
	<div class="main-wrap">
		<div class="main">
			<!-- <ul class="nav nav-tabs">
			  <li role="presentation" class="active"><a href="">基本资料</a></li>
			  <li role="presentation"><a href="#">账号和密码</a></li>
			  <li role="presentation"><a href="#">消息设置</a></li>
			</ul> -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab">基本资料</a></li>
				<li><a href="#tab2" data-toggle="tab">账号和密码</a></li>
				<li><a href="#tab3" data-toggle="tab">消息设置</a></li>
				<li><a href="#tab4" data-toggle="tab">屏蔽</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="tab1">
					<form action="php/setting.php" enctype="multipart/form-data" id="setting-profile-form" class="setting-profile" method="POST">
						<div class="setting-section">
							<!-- 修改头像-->
							<div class="setting-item">
								<label class="setting-item-title">头像</label>
								<div class="logo">
                                                                                                                   <?php if($result['head_picture'] == ""){ ?>
									            <img src="img/userimg2.jpg" />
                                                                                                                   <?php }else{ ?>
                                	                                                                                         <img src="<?php echo $result['head_picture']; ?>" />
								            <?php } ?>
								</div><label class="setting-item-title img_url" style="display:block; margin:0 auto; text-align:center; margin-top:10px;"></label>
								<div class="upload" style="margin-top:10px;">
						            <p>上传图片</p>
						            <div class="img-upload">
						            	<input type="file" name="imageFile" id="imageFile" onChange="show_url();" />
						            </div>
                                    
						        </div>
							</div>
							<div class="setting-item">
								<label class="setting-item-title">昵称</label>
								<input type="text" class="form-control" name="user_name" value="<?php echo $result['user_name']; ?>" />
							</div>
							<div class="setting-item" style="margin-top:10px;">
								<label class="setting-item-title">签名</label>
								<input type="text" class="form-control" name="signature" value="<?php echo $result['signature']; ?>" />
								
							</div>
							<div class="setting-item" style="margin-top:10px;">
                            <input type="submit" class="btn btn-default" value="修改" />
                            </div>
						</div>
					</form>
				</div>
				<div class="tab-pane" id="tab2">
					<form id="setting-account-form" action="php/setting_pass.php" class="setting-account" method="POST">
                    
							<div class="setting-item">
								<label class="setting-item-title">账号</label>
								<input type="text" class="form-control" disabled value="<?php echo $result['user_account']; ?>" />
							</div>
							<div class="setting-item" style="margin-top:10px;">
								<label class="setting-item-title">密码</label>
								<input type="text" class="form-control" name="password" value="" />
							</div>
							<div class="setting-item" style="margin-top:10px;">
                            <input type="submit" class="btn btn-default" value="修改" />
                            </div>
                    </form>
				</div>
				<div class="tab-pane" id="tab3">不想写了</div>
				<div class="tab-pane" id="tab4">不想写了</div>
			</div>
			
		</div>
		
	
	</div>
    <script>
	
	
	function show_url(){
		$(".img_url").html($("input[name='imageFile']").val());	
	}
	</script>
</body>
</html>