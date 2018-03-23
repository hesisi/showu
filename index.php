<?php
	session_start();
	require("php/config.php");
	date_default_timezone_set("PRC");
	$type = "摄影";
	$keyword = "";
	if(isset($_GET['type']) && $_GET['type']!= "")
		$type = $_GET['type'];
	if(isset($_GET['keyword']) && $_GET['keyword'] != ""){
		$type = "";
		$keyword = $_GET['keyword'];
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>首页 - ShowU</title>
	<link rel="shortcut icon" href="su-logo.ico">
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/index.css">
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/index.js"></script>
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
						<li <?php if($type == "摄影"){ ?> class="active" <?php } ?>><a href="index.php?type=摄影">摄影</a></li>
						<li <?php if($type == "画画"){ ?> class="active" <?php } ?>><a href="index.php?type=画画">画画</a></li>
						<li <?php if($type == "音乐"){ ?> class="active" <?php } ?>><a href="index.php?type=音乐">音乐</a></li>
						<li <?php if($type == "诗词"){ ?> class="active" <?php } ?>><a href="index.php?type=诗词">诗词</a></li>
						<li <?php if($type == "舞蹈"){ ?> class="active" <?php } ?>><a href="index.php?type=舞蹈">舞蹈</a></li>
						<li <?php if($type == "旅游"){ ?> class="active" <?php } ?>><a href="index.php?type=旅游">旅游</a></li>
					</ul>

					<form class="navbar-form navbar-left sreach-from">
						<div class="form-group">
							<input type="text" value="<?php echo $keyword; ?>" class="form-control"style="width:300px;" placeholder="搜索你感兴趣的原创作品..."/>
						</div>
						<button type="submit" class="btn btn-default search-btn">搜索</button>
					</form>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-bell" style="color:#4C9ED9;"></span> 消息 <span class="badge">12</span></a></li>
						<li class="dropdown">
						<?php if(!isset($_SESSION['uid']) || $_SESSION['uid'] == "" || !isset($_SESSION['uname']) || $_SESSION['uname'] == ""){ ?>
                            <a href="javascript:void(0);" onClick="location.href='login_register.php';" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">登录</a>	
						<?php }else{?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">个人中心 <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href=""><span class="glyphicon glyphicon-user"></span> 我的主页</a>
								</li>
								<li>
									<a href=""><span class="glyphicon glyphicon-envelope"></span> 私信</a>
								</li>
								<li>
									<a href="setting.php"><span class="glyphicon glyphicon-cog"></span> 设置</a>
								</li>
								<li>
									<a href="php/logout.php"><span class="glyphicon glyphicon-off"></span> 退出</a>
								</li>
							</ul>
                        <?php } ?>
						</li>
					</ul>
				</div>
			</div>
			
		</nav>
	</div>
	
	<!--主体部分-->
	<div class="main">
		<!-- 用户信息 -->
        <?php if(isset($_SESSION['uid']) && $_SESSION['uid'] != "" && isset($_SESSION['uname']) && $_SESSION['uname'] != ""){ ?>
		<div class="main-header">
			<div class="info-wrapper">
				<div class="media pull-left">
					<div class="media-left media-middle">
						<a href="#">
                        	<?php
                            	$sql = mysql_query("select * from user where user_id = ".$_SESSION['uid']);
								$result = mysql_fetch_assoc($sql);
								if($result['head_picture'] == ""){
							?>
									<img class="media-object" src="img/userimg2.jpg" alt="...">
							<?php }else{ ?>
                            		<img class="media-object" src="<?php echo $result['head_picture']; ?>" />
							<?php } ?>
                        </a>
						<!-- <form id="upfile-form">
							<input class="upfile" type="file" style="display:block;" onChange="changeImg()"/>
						</form> -->
						
					</div>
					
					<div class="media-body">
						<h4 class="media-heading"><?php echo $_SESSION['uname']; ?></h4>
						<p><?php if($result['signature'] == ""){ ?>TA很懒,什么都没有留下……<?php }else{ ?><?php echo $result['signature']; ?><?php } ?></p>
					</div>
				</div>
				<div class="pull-left">
					<div class="commit-work">
						<button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> 发布作品</button>
					</div>
				</div>
				<div class="person-wrapper pull-right">
					<div class="aggrement-box">
						<p>获得赞</p>
						<p class="aggrement-num num">455</p>
					</div>
					<div class="follow-box">
						<p>关注</p>
						<p class="follow-num num">102</p>
					</div>
					<div class="follower-box">
						<p>粉丝</p>
						<p class="follower-num num">87</p>
					</div>
				</div>
			</div>
		</div>
		<?php }else{ ?>
			<div class="main-header">
				<div class="info-wrapper">
                </div>
            </div>
        <?php } ?>
		<!--内容部分-->
		<div class="contents-wrapper">
			<div class="container-fluid">
				<div class="row">
					<!--左侧布局-->
					<div class="col-md-8 row-left">
						<div class="content-left">
						<?php
							if($keyword != "")
								$sql = mysql_query("select * from news where title like '%$keyword%' order by time desc");
							else
								$sql = mysql_query("select * from news where type = '$type' order by time desc");
							while($result = mysql_fetch_assoc($sql)){ //每遍历一次，索引就会下移一位
								$user_sql = mysql_query("select * from user where user_id = ".$result['uid']);
								$user_result = mysql_fetch_assoc($user_sql);
						?>
							<!--第二条内容-->
							<div class="content-item">
								<div class="media">
									<div class="media-left media-top">
										<a href="#">
                                        <?php if($user_result['head_picture'] == ""){?>
											<img class="media-object" src="img/userimg2.jpg" alt="...">
										<?php }else{ ?>
                                        	<img class="media-object" src="<?php echo $user_result['head_picture']; ?>" />
										<?php } ?>
                                        </a>
									</div>
									<div class="media-body">
										<h4 class="media-heading"><?php echo $user_result['user_name']; ?></h4>
										<p><?php if($user_result['signature'] == ""){ ?>TA很懒,什么都没有留下……<?php }else{ ?><?php echo $user_result['signature']; ?><?php } ?></p>
									</div>
								</div>

								<!--主体内容-->
								<div class="richcontent">
                                <?php echo $result['title']; ?>
									<!--内容-->
									<div class="richcontent-inner">
										<?php echo $result['content']; ?>
									</div>
									<!--时间-->
									<div class="richcontent-timer">
										<a href="">发表于 <?php echo date("Y-m-d H:i:s",$result['time']);?></a>
									</div>
									<!--赞同收藏等-->
									<div class="richcontent-action">
										<span>
											<button>
												<span class="glyphicon glyphicon-thumbs-up"></span> 赞同</button>
											<button>
												<span class="glyphicon glyphicon-thumbs-down">
												</span> 反对</button>
										</span>
										<button>
											<span class="glyphicon glyphicon-comment"> </span> 6条评论
										</button>
										<button><span class="glyphicon glyphicon-send"></span> 分享
										</button>
										<button><span class="glyphicon glyphicon-star"></span> 收藏
										</button>
										<button><span class="glyphicon glyphicon-heart"></span> 感谢
										</button>
									</div>
								</div>
							
								<!--评论-->
								<div class="comments-container"></div>
							</div>
						<?php } ?>
						</div>
					</div>

					<!--右侧布局-->
					<div class="col-md-4 row-right">
						<div class="content-right">
							<div class="recommed-work">
								<div class="recommed-work-header">
									<h2>相关推荐</h2>
								</div>
								<div class="recommed-work-section">
									<div class="recommed-work-section-item">
										<a href="">推荐内容一</a>
									</div>
									<div class="recommed-work-section-item">
										<a href="">推荐内容二</a>
									</div>
									<div class="recommed-work-section-item">
										<a href="">推荐内容三</a>
									</div>
									<div class="recommed-work-section-item">
										<a href="">推荐内容四</a>
									</div>
									<div class="recommed-work-section-item">
										<a href="">推荐内容五</a>
									</div>
									<div class="recommed-work-section-item">
										<a href="">推荐内容一</a>
									</div>
									<div class="recommed-work-section-item">
										<a href="">推荐内容二</a>
									</div>

								</div>
							</div>
						</div>

						<div class="content-right">
							<div class="recommed-author">
								<div class="recommed-author-header">
									<h2>高人气原创作者</h2>
								</div>
								<div class="recommed-author-section">
									<div class="recommed-author-section-item">
										<!--推荐作者信息-->
										<div class="media">
											<div class="media-left media-top">
												<a href="#">
													<img class="media-object" src="img/userimg5.jpg" alt="...">
												</a>
											</div>
											<div class="media-body">
												<h4 class="media-heading">赵六六</h4>
												<p>我的个性签名有个性吧？</p>
											</div>
										</div>
									</div>
									<div class="recommed-author-section-item">
										<div class="media">
											<div class="media-left media-top">
												<a href="#">
													<img class="media-object" src="img/userimg8.jpg" alt="...">
												</a>
											</div>
											<div class="media-body">
												<h4 class="media-heading">王雨娃</h4>
												<p>一个聪明、睿智、机智的女纸~</p>
											</div>
										</div>
									</div>
									<div class="recommed-author-section-item">
										<!--推荐作者信息-->
										<div class="media">
											<div class="media-left media-top">
												<a href="#">
													<img class="media-object" src="img/userimg11.jpg" alt="...">
												</a>
											</div>
											<div class="media-body">
												<h4 class="media-heading">强迫症患者</h4>
												<p>热爱生活就是热爱吃吃吃吃吃吃...</p>
											</div>
										</div>
									</div>
									<div class="recommed-author-section-item">
										<div class="media">
											<div class="media-left media-top">
												<a href="#">
													<img class="media-object" src="img/userimg12.jpg" alt="...">
												</a>
											</div>
											<div class="media-body">
												<h4 class="media-heading">图样图森破</h4>
												<p>爱过，不约，就我妈</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>