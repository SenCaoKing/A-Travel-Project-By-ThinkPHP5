<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"E:\WWW\mytest\github\lvyou/application/admin\view\rule\add_rule.html";i:1541774375;s:66:"E:\WWW\mytest\github\lvyou\application\admin\view\public\main.html";i:1540682192;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <?php
    $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
    ?>
    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->

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
    <link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/css/zoomify.min.css">
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

<form action="" method="post" class="form form-horizontal" id="form">
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="<?php echo $menu['title']?>" placeholder="权限名称" name="title">
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限路由：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="<?php echo $menu['name']?>" placeholder="路由规则：" id="name" name="name">
        </div>
    </div>


    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限图标：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="<?php echo $menu['icon']?>" placeholder="请使用矢量图代码：如#xe681" id="icon" name="icon">
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">上级菜单：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <span class="select-box" style="width: 150px;">
                <select class="select" name="p_id" size="1">
                    <option value="0">顶级分类</option>
                        <?php foreach($top_menu as $v){?>
                            <option value="<?php echo $v['id']?>" <?php echo $v['id'] == $menu['p_id'] ? 'selected' : ''?>>-<?php echo $v['title'] ?></option>
                                <?php foreach($v['child'] as $v1){ ?>
                                    <option value="<?php echo $v1['id']?>" <?php echo $v1['id'] == $menu['p_id'] ? 'selected' : ''?>>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v1['title'] ?></option>
                                <?php } } ?>
                </select>
            </span>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否显示：</label>
        <div class="formControls col-xs-8 col-sm-9 skin-minimal">
            <div class="radio-box">
                <input type="radio" id="sex-2" value="0" <?php echo empty($menu) || $menu['is_show'] == 0 ? 'checked' : ''?> name="is_show" />
                <label for="sex-2">是</label>
            </div>
            <div class="radio-box">
                <input type="radio" id="sex-3" value="1" <?php echo $menu['is_show'] == 1 ? 'checked' : ''?> name="is_show" />
                <label for="sex-3">否</label>
            </div>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>排序值：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="<?php echo $menu['orderby']?>" placeholder="排序值" name="orderby">
        </div>
    </div>

    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input type="hidden" name="id" value="<?php echo $menu['id']?>">
            <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
</form>

<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/public/lib/jQuery.Form.js"></script>
<script type="text/javascript" src="/public/lib/zoomify.min.js"></script>
<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/main.js"></script>
<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.admin.page.js"></script>

<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
        $("#form").validate({
            rules:{
                title:{
                    required:true,
                },
                status:{
                    required:true,
                },
            },
            submitHandler:function(form){
                var options = {
                    success: function(data){
                        if(data.code == 0){
                            layer.msg(data.msg, {icon:1, time:1000});
                            setTimeout(function(){
                                window.parent.location.reload();
                            }, 1000);
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