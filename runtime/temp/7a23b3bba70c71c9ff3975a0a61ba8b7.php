<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"E:\WWW\mytest\github\lvyou/application/admin\view\goods\goodsShow.html";i:1542118700;s:66:"E:\WWW\mytest\github\lvyou\application\admin\view\public\main.html";i:1540682192;}*/ ?>
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

<div class="cl pd-20" style="background-color: #5bacb6;">
    <img class="avatar size-XL l" src="<?php echo $info['logo']?>" alt="">
    <dl style="margin-left: 80px; color: #fff;">
        <dt>
            <span class="f-18"><?php echo $info['title']?></span>
        </dt>
        <dd class="pt-10 f-12" style="margin-left: 0">
            <span class="pl-10 f-12">描述：<?php echo $info['desc']?></span>
        </dd>
    </dl>
</div>
<div class="pt-10">
    <table class="table">
        <tbody>
        <tr>
            <th class="text-r" style="width: 90px;">状态：</th>
            <td><?php switch($info['status']){
            case 1: echo '待审核';break;
            case 2: echo '已通过';break;
            case 3: echo '未通过';break;
            }?></td>
        </tr>
        <tr>
            <th class="text-r" style="width: 90px;">商品价格：</th>
            <td><?php echo $info['current_price'] ?: '-'?></td>
        </tr>
        <tr>
            <th class="text-r" style="width: 90px;">目的地：</th>
            <td><?php echo $info['address'] ?: '-'?></td>
        </tr>
        <tr>
            <th class="text-r" style="width: 90px;">须知：</th>
            <td><?php echo $info['notice'] ?: '-'?></td>
        </tr>
        <tr>
            <th class="text-r" style="width: 90px;">地区编号：</th>
            <td><?php echo $info['area_id'] ?: '-'?></td>
        </tr>
        <tr>
            <th class="text-r" style="width: 90px;">地区名称：</th>
            <td><?php echo $info['area_name'] ?: '-'?></td>
        </tr>
        <tr>
            <th class="text-r" style="width: 90px;">上传时间：</th>
            <td><?php echo $info['create_time'] ? date('Y-m-d H:i:s', $info['create_time']) : '-'?></td>
        </tr>

        <tr>
            <th class="text-r" style="width: 90px;">上传图片：</th>
            <td>
                <img class="avatar size-XL" src="" alt="">
                <a href="" download=""></a>
            </td>
        </tr>

        </tbody>
    </table>
</div>
<div class="audit pt-10 pl-30" <?php if($info['status'] != 1) echo 'hidden'?>>
    <input class="btn btn-primary radius" type="button" onclick="status(this, 2)" value="&nbsp;&nbsp;通过&nbsp;&nbsp;">
    <input class="btn btn-danger radius ml-5" type="button" onclick="status(this, 3)" value="&nbsp;&nbsp;拒绝&nbsp;&nbsp;">
</div>

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
        $('img').zoomify();
    });


    function status(obj, status){
        var id = "<?php echo $info['id']?>";
        var action = "<?php echo $info['action']?>";
        var msg;
        var msg1;
        if(status === 2){
            msg = '确认审核通过吗？';
            msg1 = '已通过';
        }else if(status === 3){
            msg: '确认审核拒绝吗？';
            msg1: '已拒绝';
        }
        layer.confirm(msg, function(){
            $.ajax({
                type: 'post',
                url: "<?php echo url('goods/goodsStatus')?>",
                data: {"id":id, "status":status, "action":action},
                success:function(data){
                    if(data.code == 0){
                        layer.msg(msg1, {icon: 1, time: 1000});
                        $('.audit').hide();
                        setTimeout("closeWindow()", 1000);
                    }else{
                        layer.msg(data.msg, {icon: 5, time: 1000});
                    }
                }
            });
        });
    }

    function closeWindow(){
        var index = parent.layer.getFrameIndex(window.name);
        window.parent.location.reload(index);
    }

    function SaveAs5(imgURL){

        var oPop = window.open(imgURL, "", "width=1, height=1, top=5000, left=5000");

        for(; oPop.document.readyState != "complete"; )

        { if(oPop.document.readyState == "complete")break; }

        oPop.document.execCommand("SaveAs"); oPop.close();
        
    }
</script>

</body>
</html>