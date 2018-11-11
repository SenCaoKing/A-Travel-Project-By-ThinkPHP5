<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"E:\WWW\mytest\github\lvyou/application/admin\view\role\index.html";i:1541774966;s:66:"E:\WWW\mytest\github\lvyou\application\admin\view\public\base.html";i:1541769015;}*/ ?>
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
        
<div class="Hui-article">
    <article class="cl pd-20">
        <div class="cl pd-5 bg-1 bk-gray"> <span class="l">
            <a class="btn btn-primary radius" href="javascript:;" onclick="open_page('添加角色', '<?php echo url('role/addRole')?>', '800')"><i class="Hui-iconfont"></i> 添加角色</a> </span> <span class="r">共有数据：<strong></strong><?php echo count($list); ?> 条</span> </div>
        <div class="mt-10">
            <table class="table table-border table-bordered table-hover table-bg">
                <thead>
                <tr>
                    <th scope="col" colspan="6">角色管理</th>
                </tr>
                <tr class="text-c">
                    <th width="40">ID</th>
                    <th width="200">角色名</th>
                    <th>用户列表</th>
                    <th width="300">描述</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($list as $v){?>
                <tr class="text-c">
                    <td><?php echo $v['id']?></td>
                    <td><?php echo $v['title']?></td>
                    <td>
                        <?php if(empty($v['group'])){?>
                        --
                        <?php } foreach($v['group'] as $v1){?>
                        <a href="#"><?php echo $v1['username']?></a>
                        <?php } ?>
                    </td>
                    <td><?php echo $v['description']?></td>
                    <td class="f-16">
                        <input class="btn btn-success radius size-MINI" type="button" onclick="open_page('角色编辑', '<?php echo url('role/addRole', ['id' => $v['id']])?>', '800')" value="编辑">
                        <input class="btn btn-danger radius size-MINI ml-5" type="button" onclick="del(this, <?php echo $v['id']?>)" value="删除">

                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </article>
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
    /* 管理员-角色-添加 */
    function admin_role_add(title, url, w, h){
        layer_show(title, url, w, h);
    }

    function del(obj, id){
        layer.confirm('确认要删除吗？', function(index){
            $.ajax({
                type: 'post',
                url: "<?php echo url('role/del')?>",
                data: {"id":id},
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