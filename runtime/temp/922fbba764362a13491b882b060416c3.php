<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"E:\WWW\mytest\github\lvyou/application/admin\view\system\areaAdd.html";i:1542201075;s:66:"E:\WWW\mytest\github\lvyou\application\admin\view\public\main.html";i:1540682192;}*/ ?>
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

<article class="page-container">
    <form class="form form-horizontal" id="form" method="post" action="">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>地区名称：</label>
            <div class="formControls col-xs-8 col-sm-10">
                <input type="text" class="input-text" value="" placeholder="请输入地区名称" id="area" name="area">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>地区拼音：</label>
            <div class="formControls col-xs-8 col-sm-10">
                <input class="input-text" type="text" value="" placeholder="请输入地区拼音" id="pinyin" name="pinyin">
            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">地区背景图：</label>
            <div class="formControls col-xs-8 col-sm-10"><span class="btn-upload form-group">
                <input class="input-text upload-url" type="text" id="logo" readonly nullmsg="请上传封面！" style="width: 200px;">
                <a href="javascript:void(0);" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont"></i> 浏览文件</a>
                <input type="file" id="file" name="logo" onchange="imgReviewOne('file', 'preview')" class="input-file"></span>
                <img class="" id="preview" src="" alt="">
            </div>
        </div>




        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>上级地区：</label>
            <div class="formControls col-xs-8 col-sm-10"><span class="select-box">
                <select class="select" name="pid" size="1">
                    <option value="0">顶级地区</option>
                    <?php foreach($parent as $v){?>
                    <option value="<?php echo $v['id']?>"><?php echo $v['area']?></option>
                    <?php } ?>
                </select>
            </span></div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>地区描述：</label>
            <div class="formControls col-xs-8 col-sm-10">
                <input type="text" class="input-text" value="" placeholder="请输入地区描述" id="desc" name="desc">
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

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

    function imgReviewOne(file, img){
        var docObj = document.getElementById(file);
        var imgObjPreview = document.getElementById("preview");
        imgObjPreview.style.display = 'block';
        $('#'+img).attr('class', 'avatar size-XL pt-10');
        imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
    }

    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-yellow',
            increaseArea: '20%'
        });

        $("#form").validate({
            rules:{
                area:{required:true},
                pinyin:{required:true}
            },
            submitHandler:function(form){
                var options = {
                    success: function(data){
                        if(data.code == 0){
                            layer.msg(data.msg, {icon:1, time:1000});
                            setTimeout("closeWindow()", 1000);
                        }else{
                            layer.msg(data.msg, {icon:5, time:1000});
                        }
                    }
                };
                $(form).ajaxSubmit(options);
            }
        });
    });
    function closeWindow(){
        var index = parent.layer.getFrameIndex(window.name);
        window.parent.location.reload(index);
    }
</script>

</body>
</html>