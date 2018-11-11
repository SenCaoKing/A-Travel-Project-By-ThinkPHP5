<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"E:\WWW\mytest\github\lvyou/application/admin\view\login\login.html";i:1541517555;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="favicon.ico" >
<link rel="Shortcut Icon" href="favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/public/lib/html5.js"></script>
<script type="text/javascript" src="/public/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/css/H-ui.login.css" />
<link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>H-ui.admin v3.0</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        <form class="form form-horizontal" action="<?php echo url('login/login'); ?>" method="post" id="form-login">
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input  name="username" type="text" placeholder="账户" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input  name="password" type="password" placeholder="密码" class="input-text size-L">
                </div>
            </div>
            <!--<div class="row cl">-->
                <!--<div class="formControls col-xs-8 col-xs-offset-3">-->
                    <!--<input name="captcha" id="captcha" class="input-text size-L" type="text" placeholder="验证码" value="" style="width:150px;">-->
                    <!--<img width="100" height="40" src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>'" alt="captcha" /> <span>点击图片切换</span>-->
                <!--</div>-->
            <!--</div>-->
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <label for="remember">
                        <input type="checkbox" name="remember" id="remember" value="1">
                        记住我</label>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                    <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">Copyright 你的公司名称 by H-ui.admin v3.1</div>
<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<script type="text/javascript">
    $(function(){
        $("#form-login").validate({
            rules:{
                username:{required:true},
                password:{required:true}
            },
            submitHandler:function(form){
                var options = {
                    success: function(data){
                        if(data.code == 0){
                            layer.msg('登陆成功', {icon:1, time:1000});
                            setTimeout("jump()", 1000);
                        }else{
                            layer.msg(data.msg, {icon:5, time:2000});
                        }
                    }
                };
                $(form).ajaxSubmit(options);
            }
        });
    });
    function jump(){
        location.href = "/admin/index/index.html";
    }

</script>
</body>
</html>