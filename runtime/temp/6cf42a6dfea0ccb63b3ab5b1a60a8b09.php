<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"E:\WWW\mytest\github\lvyou/application/admin\view\wechatgoods\goods.html";i:1542805954;s:66:"E:\WWW\mytest\github\lvyou\application\admin\view\public\main.html";i:1540682192;}*/ ?>
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

<article class="page-container" style="position: relative;">
<form class="form form-horizontal" id="form" method="post" action="<?php echo url('goods/goodsAdd')?>" ENCTYPE="multipart/form-data">
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="" placeholder="请输入商品名称" id="title" name="title">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">商品图片（210*150）：</label>
        <div class="formControls col-xs-8 col-sm-9"><span class="btn-upload form-group">
            <input type="text" class="input-text upload-url" id="logo" readonly nullmsg="请上传封面！" style="width: 200px;">
            <a href="javascript:void(0);" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i>浏览文件</a>
            <input type="file" id="file" name="logo" onchange="imgReviewOne('file', 'preview')" class="input-file"></span>
            <img class="" id="preview" src="" alt="">
        </div>
    </div>


    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">原图（690*260）：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <img class="" src="" alt="" width="200px">
        </div>
    </div>



    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">产品列表图（690*260）：</label>
        <div class="formControls col-xs-8 col-sm-9"><span class="btn-upload form-group">
            <input class="input-text upload-url" type="text" id="list_image" readonly nullmsg="请上传封面！" style="width: 200px;">
            <a href="javascript:void(0);" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i>浏览文件</a>
            <input type="file" id="file1" name="list_image" onchange="imgReviewOne('file1', 'list_images')" class="input-file"></span>
            <img class="" id="list_images" src="" alt="">
        </div>
    </div>


    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">原图（690*260）：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <img class="" src="" alt="" width="200px">
        </div>
    </div>


    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">选择地区：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <span class="select-box" style="width: 150px;">
                <select class="select" name="city_name" size="1" id="city_name">
                    <option>选择地区</option>

                    <option value=""></option>

                </select>
            </span>
            <span><button class="btn btn-primary radius" onclick="">创建地址坐标</button></span>
            <span>经度：<input type="text" value="" readonly="readonly" name="lng" id="form_lng" style="border: 1px solid #ccc; height: 30px; background-color: #c0c0c0;"></span>
            <span>纬度：<input type="text" value="" readonly="readonly" name="lat" id="form_lat" style="border: 1px solid #ccc; height: 30px; background-color: #c0c0c0;"></span>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>详细地址：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="" placeholder="详细地址地图自动选择" id="address" name="address" readonly>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">选择分类：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <span class="select-box" style="width: 150px;">
                <select class="select" name="category_id" size="1" onchange="">

                    <option value=""></option>

                </select>
            </span>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">选择子类：</label>
        <div class="formControls col-xs-8 col-sm-9">

            <span class="select-box" id="" style="">

                <label style="padding-left: 5px;"><input type="checkbox"></label>

            </span>

        </div>
    </div>

    <style>
        #apendGuige li{ margin-bottom: 10px;}
    </style>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>产品规格：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <ul id="apendGuige">
                <li>
                    <span><input type="text" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 100px;" value="" placeholder="规格名称" name="specification[]"></span>
                    <span><input type="text" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 60px;" value="" placeholder="原价" name="original_price[]"></span>
                    <span><input type="text" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 60px;" value="" placeholder="现价" name="current_price[]"></span>
                    <span><input type="text" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 60px;" value="" placeholder="单位" name="unit[]"></span>
                    <span><input type="radio" name="type0" value="1">底价 <input type="text" name="divided1[]" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 50px;"></span>
                    <span><input type="radio" name="type0" value="2">抽成 <input type="text" name="divided2[]" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 50px;">%</span>
                    <span><button class="btn btn-primary radius" onclick="">增加规格</button></span>
                </li>
            </ul>
        </div>
    </div>

    <!--<div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>产品规格：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <ul id="apendGuige">

                <li>
                    <input type="hidden" name="spe_id[]" value="">
                    <span><input type="text" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 100px;" value="" placeholder="规格名称" name="specification[]"></span>
                    <span><input type="text" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 60px;" value="" placeholder="原价" name="original_price[]"></span>
                    <span><input type="text" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 60px;" value="" placeholder="现价" name="current_price[]"></span>
                    <span><input type="text" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 60px;" value="" placeholder="单位" name="unit[]"></span>
                    <span><input type="radio" name="type0" value="1">底价 <input type="text" name="divided1[]" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 50px;"></span>
                    <span><input type="radio" name="type0" value="2">抽成 <input type="text" name="divided2[]" style="border: 1px solid #ccc; height: 31px; padding: 0 3px; width: 50px;">%</span>

                    <span><button class="btn btn-primary radius" onclick="">增加规格</button></span>

                    <span><button class="btn btn-primary radius" onclick="">删除规格</button></span>

                </li>

            </ul>
        </div>
    </div>-->



    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">季节开放时间：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input style="border: 1px solid #ccc; height: 30px; padding: 0 3px;" placeholder="开始时间" type="text" value="" name="season_open_time" onfocus="WdatePicker({ dateFmt: 'yyyy-MM-dd' })" size="17" readonly="readonly" />
            -
            <input style="border: 1px solid #ccc; height: 30px; padding: 0 3px;" placeholder="结束时间" type="text" value="" name="season_end_time" onfocus="WdatePicker({ dateFmt: 'yyyy-MM-dd' })" size="17" readonly="readonly" />
        </div>
    </div>


    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>最佳游玩时段：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input style="border: 1px solid #ccc; height: 30px; padding: 0 3px;" placeholder="开始时间" value="" type="text" name="best_start_time" onfocus="WdatePicker({ dateFmt: 'HH:mm' })" size="17" readonly="readonly" />
            -
            <input style="border: 1px solid #ccc; height: 30px; padding: 0 3px;" placeholder="结束时间" value="" type="text" name="best_end_time" onfocus="WdatePicker({ dateFmt: 'HH:mm' })" size="17" readonly="readonly" />
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>游玩时长：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="" placeholder="请输入游玩时长，单位为分钟" id="suggested_duration" name="suggested_duration">
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>产品须知：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <textarea name="notice" id="notice" class="textarea" placeholder="请输入商品描述" onkeyup="$.Huitextarealength(this, 500)"></textarea>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品描述：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <textarea name="desc" id="desc" class="textarea" placeholder="请输入商品描述" onkeyup="$.Huitextarealength(this, 500)"></textarea>
        </div>
    </div>


    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>选择商家：</label>
        <div class="formControls col-xs-8 col-sm-9">

            <div class="radio-box" style="padding-left: 0;">
                <input type="radio" id="sex-2" value="" name="aid">
                <label for="sex-2"></label>
            </div>

        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">详细：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <textarea  class="xheditor {tools:'full',height:'250',cleanPaste:2,html5Upload:false,upLinkUrl:'<?php echo url('upload/xheditorUpload')?>',upImgUrl:'<?php echo url('upload/xheditorUpload')?>'}" id="preview" name="content" style="width: 100%; height: 150px;"></textarea>
        </div>
    </div>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
            <input type="hidden" name="id" value="">
            <input type="submit" class="btn btn-primary radius" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
</form>
    <style>
        #show_map{
            background: rgba(0, 0, 0, 0.5);
            filter: alpha(opacity=50);
            -moz-opacity: 0.5; -khtml-opacity: 0.5;
            width: 100%;
            height: 800px;
            position: absolute;
            top: 0;
            display: none;
            z-index: 777;
        }
        #containers{
            z-index: 999;
            height: 500px;
            background: #ffffff;
            width: 80%;
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
            top: 0;
            bottom: 0;
        }
        #container{
            width: 100%;
            height: 500px;
        }
        .input_map{ border: 1px solid #ccc; height: 31px; padding: 0 3px;}
        .search{ padding: 10px 10px;}
        #btnSearch, #btnConfirm, #btnCloseMap{ height: 31px; border: 1px solid #ccc; padding: 3px 5px;}
    </style>
    <div id="show_map">


        <div id="containers">
            <div class="search">
                输入地区详细位置：<input type="text" id="search_area_name" class="input_map">
                <button id="btnSearch">查坐标</button>
                当前地理坐标为：<span id="lng">0.00</span>  <span id="lat">0.00</span>

                <button id="btnConfirm">确认位置</button>

                <button id="btnCloseMap" style="text-align: right;">关闭地图</button>
            </div>

            <div id="container"></div>
        </div>
    </div>

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
</script>

</body>
</html>