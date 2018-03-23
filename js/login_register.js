//登录注册
$(function(){
	$('[data-toggle="tooltip"]').tooltip({
		delay:{
			show : 200,
			hide : 200
		},
		container : 'body',
		height : '40px'
	});
	
	//获取验证码图片
	/*
	 * function getCode(){
		$.ajax({
			url : 'php/getCodePic.php',
			type : 'GET',
			success : function(data){
				$(".identifying img").attr('src','php/img/'+data);
				//$(".identifying img").attr('src',data);
			},
			error : function(){
				//错误信息处理
				console.log();
			}
			
		});
	}
	getCode();
	
	//获取下一张
	$(".identifying img").on('click',function(){
		getCode();
	});
	*/
	

	//*****选项卡****
	$(".index-tab-navs .login").on('click',function(){
		$(this).addClass("active").siblings(".register").removeClass("active");
		$(".login-form-wrap").css("display","block").siblings(".register-form-wrap").css("display","none");
	});

	$(".index-tab-navs .register").on('click',function(){
		$(this).addClass("active").siblings(".login").removeClass("active");
		$(".register-form-wrap").css("display","block").siblings(".login-form-wrap").css("display","none");
	});

	//动态监听input
	$("input").on("focus",function(){
		$(this).parent().find(".icon").show();
		$(this).parent().find(".error").hide();
	});

	//点击clear按钮
	$(".clear").on("click",function(){
		$(this).parent().find("input").val("");
	});

	//点击eye按钮
	$(".eye").on("click",function(){
		if($(this).css("opacity") == 0.5){
			$(this).parent().find("input").attr("type","text");
			$(this).css("opacity",1);
		}else if($(this).css("opacity") == 1){
			$(this).parent().find("input").attr("type","password");
			$(this).css("opacity",0.5);
		}
	});

	//*****登录验证*****
	//点击登录按钮验证
	$(".login-button").on('click',function(e){
	
		e.preventDefault();
		var login_flag = true;
		var account = $.trim($(".login-form .account").find("input").val());
		var password = $.trim($(".login-form .password").find("input").val());
		var identifying = $.trim($(".login-form .identifying").find("input").val());

		if(account==""){
			$(".login-form .account-error").css("display","block").html("账号不能为空");
			$(".login-form .account-icon").css("display","none");
			login_flag = false;
		}else{
			$(".login-form .account-error").css("display","none").html("");
			$(".login-form .account-icon").css("display","block");
		}

		if(password==""){
			$(".login-form .password-error").css("display","block").html("密码不能为空");
			$(".login-form .password-icon").css("display","none");
			login_flag = false;
		}else{
			$(".login-form .password-error").css("display","none").html("");
			$(".login-form .password-icon").css("display","block");
		}

		if(identifying==""){
			$(".login-form .identifying-error").css("display","block").html("验证码不能为空");
			$(".login-form .identifying-icon").css("display","none");
			login_flag = false;
		}else{
			$(".login-form .identifying-error").css("display","none").html("");
			$(".login-form .identifying-icon").css("display","block");
		}

		if(login_flag){ //登录验证只验证不为空就行
			$.ajax({
				type : 'POST',
				url : 'php/login.php',
				data : $(".login-form").serialize(),
				success : function(data){
					alert(data);
					if(data == '登录成功')
						location.href='index.php';
					//window.location.href = "index.html";
				},
				error : function(){
					//错误信息处理
					console.log();
				}

			});
		}


		return false;
	});


	//*********注册验证*********
	var name_c = /^[\w\u4e00-\u9fa5]{4,12}$/;
	var phone_c = /^1[34578]\d{9}$/;
	var email_c = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var password_c = /^[a-zA-Z]\w{5,11}$/;
	var verifcode_c = /^\d{4}$/;
	
	//获取短信验证码
	$(".get-verifcode").on('click',function(){
		if($.trim($(".register-form .account").find("input").val()) == ""){
			alert("手机号不能为空!");
		}else{
			var send_code = Math.round(Math.random()*10000,0);
			var mobile = $(".register-form .account").find("input").val();
			//alert(mobile+"-"+send_code);
			$.post('php/shortMessage.php',{'mobile':mobile,'send_code':send_code},function(result){
				alert("短信发送成功！");
			});
			
			return false;
		}
		
	});

	$(".register-button").on('click',function(e){
		e.preventDefault();
		var register_flag = true;
		var name = $.trim($(".register-form .name").find("input").val());
		var account = $.trim($(".register-form .account").find("input").val());
		var password = $.trim($(".register-form .password").find("input").val());
		var confirm_pwd = $.trim($(".register-form .confirm-pwd").find("input").val());
		var verification_code = $.trim($(".register-form .verification-code").find("input").val());
		
		//用户名
		if(name==""){  
			$(".register-form .name-error").css("display","block").html("用户名不能为空");
			$(".register-form .name-icon").css("display","none");
			register_flag = false;
		}else if(!name_c.test(name)){
			$(".register-form .name-error").css("display","block").html("用户名格式错误");
			$(".register-form .name-icon").css("display","none");
			register_flag = false;
		}
		
		//账号
		if(account==""){
			$(".register-form .account-error").css("display","block").html("账号不能为空");
			$(".register-form .account-icon").css("display","none");
			register_flag = false;
		}else if(!(phone_c.test(account) || email_c.test(account))){
			$(".register-form .account-error").css("display","block").html("账号格式错误");
			$(".register-form .account-icon").css("display","none");
			register_flag = false;
		}

		//密码
		if(password==""){
			$(".register-form .password-error").css("display","block").html("密码不能为空");
			$(".register-form .password-icon").css("display","none");
			register_flag = false;
		}else if(!password_c.test(password)){
			$(".register-form .password-error").css("display","block").html("密码格式错误");
			$(".register-form .password-icon").css("display","none");
			register_flag = false;
		}

		//再次输入密码
		if(confirm_pwd==""){
			$(".register-form .confirm-pwd-error").css("display","block").html("请再次输入密码");
			$(".register-form .confirm-pwd-icon").css("display","none");
			register_flag = false;
		}else if(confirm_pwd !== password){
			$(".register-form .confirm-pwd-error").css("display","block").html("两次输入密码不一致");
			$(".register-form .confirm-pwd-icon").css("display","none");
			register_flag = false;
		}

		//验证码
		if(verification_code==""){
			$(".register-form .verification-code-error").css("display","block").html("验证码不能为空");
			register_flag = false;
		}else if(!verifcode_c.test(verification_code)){
			$(".register-form .verification-code-error").css("display","block").html("验证码格式错误");
			register_flag = false;
		}
		
		
		if(register_flag){ //注册信息都正确
			$.ajax({
				type : 'POST',
				url : 'php/register.php',
				data : $('.register-form').serialize(),  //序列化的字符串
				success : function(data){
					//window.location.href = "index.html";
					alert(data);
					if(data == "注册成功")
						location.reload();
				},
				error : function(){
					//错误信息处理
					console.log();
				}

			});			

		}


		return false;

	});








});