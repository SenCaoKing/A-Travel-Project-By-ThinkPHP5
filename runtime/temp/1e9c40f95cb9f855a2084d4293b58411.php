<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"E:\WWW\mytest\github\lvyou/application/admin\view\system\base.html";i:1541943100;s:66:"E:\WWW\mytest\github\lvyou\application\admin\view\public\base.html";i:1541769015;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <?php
    $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
?>

    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->

    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link rel="Bookmark" href="favicon.ico">
    <link rel="Shortcut Icon" href="favicon.ico">
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/public/lib/html5.js"></script>
    <script type="text/javascript" src="/public/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/public/static/h-ui/css/H-ui.min.css">
    <link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/css/H-ui.admin.css">
    <link rel="stylesheet" type="text/css" href="/public/lib/Hui-iconfont/1.0.8/iconfont.css">
    <link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/skin/default/skin.css" id="skin">
    <link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/css/style.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>后台管理中心</title>
    <meta name="keywords" content="后台管理中心">
    <meta name="description" content="后台管理中心">
</head>
<body>
<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="">lvyou</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="">LY</a> <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;"></a>
            <!--<nav class="nav navbar-nav">
                <ul class="cl">
                    <li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
                            <li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
                            <li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
                            <li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>-->
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>超级管理员</li>
                    <li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo cookie('login'); ?> <i class="Hui-iconfont"></i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="<?php echo url('login/logout')?>">退出</a></li>
                        </ul>
                    </li>
                    <!--<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>-->
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px"></i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
        <?php foreach($button as $k => $v){?>
        <dl id="menu-article">
            <dt><i class="Hui-iconfont"><!--&<?php echo $v['icon']?>;--></i> <?php echo $v['title']?><i class="Hui-iconfont menu_dropdown-arrow"></i></dt>
            <dd <?php if($parent_title == $v['title']) echo 'style="display:block"';?>>
                <ul>
                    <?php foreach($v['child'] as $k1 => $v1){?>
                        <li <?php if($v1['name'] == $rule) echo 'class="current"'?>><a href="<?php echo $v1['name']?>" title="<?php echo $v1['title'];?>"><?php echo $v1['title'];?></a></li>
                    <?php } ?>
                </ul>
            </dd>
        </dl>
        <?php } ?>
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onclick="displaynavbar(this)"></a></div>

<section class="Hui-article-box">
    <nav class="breadcrumb">
        <i class="Hui-iconfont"></i>
        首页 <span class="c-gray en">&gt;</span>
        <?php echo $parent_title; ?><span class="c-gray en">&gt;</span>
        <?php echo $son_title; ?>
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="" title="刷新"><i class="Hui-iconfont"></i></a>
    </nav>

    <div class="Hui-article">
        
<div class="page-container">
    <form class="form form-horizontal" id="form" method="post">
        <div id="tab-system" class="HuiTab">
            <div class="tabBar cl">
                <span>App配置</span>
                <span>公司设置</span>
                <span>优惠券设置</span>
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>App名称：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="app_name" value="<?php echo $config['app_name']; ?>" class="input-text" name="app_name">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>版本号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="version" value="<?php echo $config['version']; ?>" class="input-text" name="version">
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>导游标签：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea class="textarea" name="guide_label" id="guide_label"><?php echo $config['guide_label']; ?></textarea>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>游客标签：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea class="textarea" name="tourist_label" id="tourist_label"><?php echo $config['tourist_label']; ?></textarea>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>话题标签：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea class="textarea" name="theme_label" id="theme_label"><?php echo $config['theme_label']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>关于我们：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea class="textarea" name="about_us" id="theme_label"><?php echo $config['about_us']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>全员优惠券(元)：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="coupon" value="<?php echo $config['coupon']; ?>" class="input-text" name="coupon" >
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>优惠券有效期：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="coupon" value="<?php echo $config['valid']; ?>" class="input-text" name="valid">
                    </div>
                </div>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont"></i>保存</button>
            </div>
        </div>
    </form>
</div>

    </div>
</section>
<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/main.js"></script>
<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.admin.page.js"></script>

<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.min.js"></script>
<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
        $.Huitab("#tab-system .tabBar span", "#tab-system .tabCon", "current", "click", "0");

        $("#form").validate({
            rules:{
                app_name:{required:true,},
                version:{required:true,},
                guide_label:{required:true,},
                tourist_label:{required:true,},
                theme_label:{required:true,},
            },
            submitHandler:function(form){
                var options = {
                    success: function(data){
                        console.log(data);
                        if(data.code == 0){
                            layer.msg(data.msg, {icon:1, time:1000});
                        }else{
                            layer.msg(data.msg, {icon:5, time:1000});
                        }
                    }
                };
                $(form).ajaxSubmit(options);
            }
        });
    });
</script>



</body>
</html>