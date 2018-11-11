<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"E:\WWW\mytest\github\lvyou/application/admin\view\role\add_role.html";i:1541777756;s:66:"E:\WWW\mytest\github\lvyou\application\admin\view\public\main.html";i:1540682192;}*/ ?>
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
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="<?php echo $row['title']?>" placeholder="请输入角色名称" id="title" name="title" datatype="*4-16" nullmsg="用户账户不能为空">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">备注：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="<?php echo $row['description']?>" placeholder="请输入角色描述" id="" name="description">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">权限选择：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <?php foreach($menu as $key => $value){?>
            <dl class="permission-list">
                <dt>
                    <label>
                        <input type="checkbox" <?php echo $row['rules'] ? in_array($value['id'], explode(',', $row['rules'])) ? 'checked' : '' : ''?> value="<?php echo $value['id']?>" name="rules[]" id="user-Character-0">
                        <?php echo $value['title']?></label>
                </dt>
                <dd>
                    <?php foreach($value['child'] as $key1 => $value1){?>
                    <dl class="cl permission-list2">
                        <dt>
                            <label class="">
                                <input type="checkbox" <?php echo $row['rules'] ? in_array($value1['id'], explode(',', $row['rules'])) ? 'checked' : '' : ''?> value="<?php echo $value1['id']?>" name="rules[]" id="user-Character-0-0">
                            <?php echo $value1['title']?></label>
                        </dt>
                        <dd>
                            <?php foreach($value1['son'] as $key2 => $value2){?>
                            <label class="">
                                <input type="checkbox" <?php echo $row['rules'] ? in_array($value2['id'], explode(',', $row['rules'])) ? 'checked' : '' : ''?> value="<?php echo $value2['id']?>" name="rules[]" id="user-Character-0-0-0">
                            <?php echo $value2['title']?></label>
                            <?php } ?>

                        </dd>
                    </dl>
                    <?php } ?>
                </dd>
            </dl>
            <?php } ?>
        </div>
    </div>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <button type="submit" class="btn btn-success radius" id="admin-role-save"><i class="icon-ok"></i>确定</button>
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
        $(".permission-list dt input:checkbox").click(function(){
            $(this).closest("dl").find("dd input:checkbox").prop("checked", $(this).prop("checked"));
        });
        $(".permission-list2 dd input:checkbox").click(function(){
            var l = $(this).parent().parent().find("input:checked").length;
            var l2 = $(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
            if($(this).prop("checked")){
                $(this).closest("dl").find("dt input:checkbox").prop("checked", true);
                $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked", true);
            }
            else{
                if(l==0){
                    $(this).closest("dl").find("dt input:checkbox").prop("checked", false);
                }
                if(l2==0){
                    $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked", false);
                }
            }
        });
        $("#form").validate({
            rules:{
                roleName:{
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