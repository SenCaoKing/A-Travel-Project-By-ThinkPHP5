<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"E:\WWW\mytest\github\lvyou/application/admin\view\wechatgoods\index.html";i:1542717446;s:66:"E:\WWW\mytest\github\lvyou\application\admin\view\public\base.html";i:1541769015;}*/ ?>
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
    <form action="<?php echo url('featuredgoods/index')?>" method="get">
        <div class="text-c">
            上传时间：
            <input type="text" name="start_time" value="" onfocus="WdatePicker()" id="datemin" class="input-text Wdate" style="width: 120px;" />
            至
            <input type="text" name="end_time" value="" onfocus="WdatePicker()" id="datemax" class="input-text Wdate" style="width: 120px;" />
            <input type="text" class="input-text" style="width: 250px;" placeholder="输入商品名称" name="search_name" value="">
            <button type="submit" class="btn btn-success radius"><i class="Hui-iconfont">&#xe665;</i>搜索</button>
        </div>
    </form>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l"><a href="javascript:;" onclick="open_page('添加商品', '<?php echo url('wechatgoods/goods')?>', '1000')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i>添加商品</a> </span>

        <span class="l ml-10"><a href="javascript:;" onclick="open_page('添加线路商品', '<?php echo url('wechatgoods/linegoods')?>', '1000')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i>添加线路商品</a></span>
        <span class="r mt-5">共有记录：<strong></strong> 条</span>
    </div>
    <table class="table table-border table-bordered table-bg mt-10">
        <thead>
        <tr class="text-c">
            <th width="40">ID</th>
            <th>商品名称</th>
            <th>Logo</th>
            <th>产品类型</th>
            <th>所属商家</th>
            <th>所属分类</th>
            <th>规格数量</th>
            <th>详细地址</th>
            <th>上传时间</th>
            <th width="280">操作</th>
        </tr>
        </thead>
        <tbody>

        <tr class="text-c">
            <td></td>
            <td></td>
            <td><img class="avatar size-L" src="" /></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <input class="btn btn-success radius size-MINI" type="button" onclick="open_page('商品详情', '<?php echo url('wechatgoods/detail', ['id' => $v['id']])?>', '950')" value="查看">
                <input class="btn btn-success radius size-MINI" type="button" onclick="open_page('规格', '<?php echo url('wechatgoods/spe', ['id' => $v['id']])?>', '950', '600')" value="规格">

                <input class="btn btn-success radius size-MINI" type="button" onclick="open_page('修改商品', '<?php echo url('wechatgoods/goods', ['id' => $v['id']])?>', '950')" value="修改">

                <input class="btn btn-success radius size-MINI" type="button" onclick="open_page('修改商品', '<?php echo url('wechatgoods/linegoods', ['id' => $v['id']])?>', '950')" value="修改">



                <input class="btn btn-danger radius size-MINI ml-5" type="button" onclick="del(this, <?php echo $v['id']?>)" value="删除">

            </td>
        </tr>
            </tbody>
        </table>
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

<script type="text/javascript">
    /* 管理员-停用 */
    function admin_stop(obj, id){
        layer.confirm('确认要停用吗？', function(index){
            // 此处请求后台程序，下方是成功后的前台处理......
            $(obj).parents("tr").find(".td-manage").prepend('<a onclick="admin_start(this, id)" href="javascript:;" title="启用" style="text-decoration: none"><i class="Hui-iconfont"></i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
            $(obj).remove();
            layer.msg('已停用！', {icon:5, time:1000});
        });
    }

    /* 管理员-启用 */
    function admin_start(obj, id){
        layer.confirm('确认要启用吗？', function(index){
            // 此处请求后台程序，下方是成功后的前台处理......

            $(obj).parents("tr").find(".td-manage").prepend('<a onclick="admin_stop(this, id)" href="javascript:;" title="停用" style="text-decoration: none;"><i class="Hui-iconfont"></i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
            $(obj).remove();
            layer.msg('已启用！', {icon:6, time:1000});
        });
    }

    function del(obj, id){
        layer.confirm('确认要删除吗？', function(index){
            $.ajax({
                type: 'post',
                url: "<?php echo url('admin/del')?>",
                data: {"id": id},
                success: function(data){
                    if(data.code == 0){
                        $(obj).parents("tr").remove();
                        layer.msg('已删除！', {icon:1, time:1000});
                    }else{
                        layer.msg(data.msg, {icon:5, time:1000});
                    }
                }
            });
        });
    }
</script>

</body>
</html>