﻿<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>注册</title>
        <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
        <meta content="yes" name="apple-mobile-web-app-capable"/>
        <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
        <meta content="telephone=no" name="format-detection"/>
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="js/jquery.min.js"></script>

    </head>
    <body>

       <?php
               

             ?>
        <iframe src=""  style="display:none" id="gotourl" ></iframe>
              <input value="" style="display:none" id="code"  />
        <section class="aui-flexView">
            <header class="aui-navBar aui-navBar-fixed b-line">
                <a href="javascript:;" class="aui-navBar-item" onclick="javascript:history.back(-1);">
                    <i class="icon icon-return"></i>
                </a>
                <div class="aui-center">
                    <span class="aui-center-title">重置密码</span>
                </div>
                <a href="login.html" class="aui-navBar-item">
                    <i class="icon icon-sys"></i>登录
                </a>
            </header>
            <section class="aui-scrollView">
                <div class="aui-code-box">
                    <form name="registerform" id="registerform" action="chongzhiset.php">
				<!--		<p class="aui-code-line">
						    <input type="text" class="aui-code-line-input" name="username" value="null" id="name"  placeholder="请输入头条/抖音名"/>
						</p>  -->
                        <p class="aui-code-line">
                            <input type="text" class="aui-code-line-input" name="phone1" value="" id="phone1" autocomplete="off" placeholder="请输入手机号"/>
                        </p>
						<p class="aui-code-line" style="display:none;"> 
						     <input type="text" class="aui-code-line-input" name="email" value="0@0.xx" id="email"  placeholder="请输入邮箱"/> 
						</p> 
                        <p class="aui-code-line">
                            <input type="password" id="psw" name="pass1" class="aui-code-line-input" placeholder="请输入密码" value="">
                        </p>
						<p class="aui-code-line">
						    <!-- <i class="aui-show  operate-eye-open"></i> -->
						    <input type="password" id="psw_ag" class="aui-code-line-input" placeholder="再次输入密码" value="">
						</p>
                        <!-- <p class="aui-code-line">
                            <input type="text" readonly="readonly" id="from" name="from" class="aui-code-line-input" placeholder="请输入邀请人(必填)" value="<?php  echo  $fromwho; ?>">
                        </p>  -->
						

                       <div class="aui-flex-links">                           
                            <input type="text" placeholder="输入验证码" class="erification-right" name="" id="yanzhengma">
 
							<button type="button" id="btnSendCode1" class="feachBtn" style="width: 35%;font-size: 13px;">获取验证码</button>
                        </div> 
						
                        <div class="aui-code-btn">
							
						
                            <button type="button" id="chongzhi">重置密码</button>
                        </div>
                    </form>
                </div>
               
            </section>
        </section>
		
		<script type="text/javascript" src="js/register.js"></script>
       

    </body>
</html>
