<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>ShowU</title>
<link rel="shortcut icon" href="su-logo.ico">
<script src="js/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css"/> 
<script src="js/login_register.js"></script>
<link rel="stylesheet" media="screen" href="particles/css/style.css">
<link rel="stylesheet" href="css/login_register.css">
</head>
<body>
      <!-- particles.js container -->
      <div id="particles-js"></div>

      <!--主体部分-->
      <div class="index-main">
            <div class="index-main-body">
                  <div class="index-header">
                        <h1 class="logo"></h1>
                        <h2 class="subtitle">向世界展现最真实的你、最好的你</h2>
                  </div>
            
                  <div class="login-register-box">
                        <div class="index-tab-navs">
                              <a class="register">注册</a>
                              <a class="login  active">登录</a>
                              <!-- <span class="slider-bar"></span>  -->
                        </div>
                  </div>
                   
                   <!-- 登录 form-->
                   <div class="login-form-wrap" style="display:block">
                         <form method="POST" class="login-form">
                               <div class="group-inputs">
                                     <div class="account input-wrapper">
                                           <input type="text" name="account" placeholder="手机号">
                                           <div class="clear account-icon icon"></div>
                                           <label class="error account-error"></label>
                                     </div>
                                     <div class="password input-wrapper">
                                           <input type="password" name="password" placeholder="密码">
                                           <div class="eye password-icon icon"></div>
                                           <label class="error password-error"></label>
                                     </div>
                                     <div class="identifying input-wrapper">
                                           <input type="text" name="identifying" placeholder="验证码">
                                           <div class="img-wrapper">
                                                 <img src="php/getCodePic.php" onClick="this.src='php/getCodePic.php?rand='+Math.random()*5" alt="验证码"  width="120px" height="30px" data-toggle="tooltip" title="看不清，换一张？" data-placement="top"/>
                                           </div>
                                           <label class="error identifying-error"></label>
                                     </div>
                               </div>

                               <div class="button-wrap">
                                     <button class="login-button submit" type="submit">登录</button>
                               </div>

                               <div class="bottom-wrapper">
                                     <a href="#" class="forget-pwd">忘记密码？</a>
                                     <a href="#" class="otherl-login">社交账号登录</a>
                               </div>

                               <div class="icon-wrapper">
                                     <span>第三方登录平台</span>
                                     <div class="icon-group">
                                           <a href="#" title="微信登录"><i class="icon icon-wechat"></i></a>
                                           <a href="#" title="github登录"><i class="icon icon-github"></i></a>
                                           <a href="#" title="QQ登录"><i class="icon icon-qq"></i></a>
                                           <a href="#" title="微博登陆"><i class="icon icon-weibo"></i></a>
                                     </div>  
                               </div>
                         </form>
                   </div>  

                   <!-- 注册 form-->
                   <div class="register-form-wrap"  style="display:none">
                         <form method="POST" class="register-form">
                               <div class="group-inputs">
                                     <div class="name input-wrapper">
                                           <input type="text" name="name" placeholder="昵称(4-12位)"/>
                                           <div class="clear icon name-icon"></div>
                                           <label class="error name-error"></label>
                                     </div>
                                     <div class="account input-wrapper">
                                           <input type="text" name="account" placeholder="手机号"/>
                                           <div class="clear icon account-icon"></div>
                                           <label class="error account-error"></label>
                                     </div>
                                     <div class="verification-code input-wrapper">
                                           <input type="text" name="verification-code" placeholder="验证码"/>
                                           <button class="button get-verifcode" type="submit">获取验证码</button>
                                           <label class="error verification-code-error"></label>
                                     </div>
                                     <div class="password input-wrapper">
                                           <input type="password" name="password" placeholder="密码(字母开头 , 6-12位)"/>
                                           <div class="eye icon password-icon"></div>
                                           <label class="error password-error"></label>
                                     </div>
                                     <div class="confirm-pwd input-wrapper">
                                           <input type="password" name="confirm-pwd" placeholder="再次输入密码"/>
                                           <div class="eye icon confirm-pwd-icon"></div>
                                           <label class="error confirm-pwd-error"></label>
                                     </div>
                               </div>

                               <div class="reg-agreement">
                                     <span>点击「注册」按钮，即代表你同意<a href="agreement.html">《showU协议》</a></span>
                               </div>

                               <div class="button-wrap">
                                     <button class="register-button submit" type="submit" name="submit">注册</button>
                               </div>
                         </form>
                   </div>             
            
            </div>
      </div>

      <div class="footer">
            <p>© 2017 知乎 · 知乎圆桌 · 发现 · 移动应用 · 使用机构帐号登录 · 联系我们 · 来知乎工作</p>
            <p>京 ICP 证 110745 号 · 京公网安备 11010802010035 号 · 出版物经营许可证</p>
      </div>

      <!-- scripts -->
      <script src="particles/particles.js"></script>
      <script src="particles/js/app.js"></script>
      <!-- stats.js -->
      <script src="particles/js/lib/stats.js"></script>
</body>
</html>