<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\WWW\mytest\github\lvyou/application/admin\view\user\userlist.html";i:1540296085;}*/ ?>
﻿<html><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

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

    <title>向内走后台管理中心</title>
    <meta name="keywords" content="向内走后台管理中心">
    <meta name="description" content="向内走后台管理中心">
    <link rel="stylesheet" href="https://www.soullv.com/public/lib/layer/2.4/skin/layer.css" id="layui_layer_skinlayercss" style=""><link href="/public/lib/My97DatePicker/4.8/skin/WdatePicker.css" rel="stylesheet" type="text/css"></head>
<body>
<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/admin/index/index.html">lvyou</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/admin/index/index.html">LY</a> <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;"></a>
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
                    <li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A">admin <i class="Hui-iconfont"></i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="/admin/login/logout.html">退出</a></li>
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
        <dl id="menu-article">
            <dt><i class="Hui-iconfont"></i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow"></i></dt>
            <dd style="display:block">
                <ul>
                    <li><a href="/admin/user/guidelist" title="导游列表">导游列表</a></li>
                    <li class="current"><a href="/admin/user/userlist" title="游客列表">游客列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt><i class="Hui-iconfont"></i> 商品管理<i class="Hui-iconfont menu_dropdown-arrow"></i></dt>
            <dd>
                <ul>
                    <li><a href="/admin/goods/goodslist" title="商品列表">商品列表</a></li>
                    <li><a href="/admin/goods/goodsguidelist" title="导游商品列表">导游商品列表</a></li>
                    <li><a href="/admin/goods/goodsreleaselist" title="发布商品列表">发布商品列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt><i class="Hui-iconfont"></i> 订单管理<i class="Hui-iconfont menu_dropdown-arrow"></i></dt>
            <dd>
                <ul>
                    <li><a href="/admin/order/orderlist" title="订单列表">订单列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt><i class="Hui-iconfont"></i> 圈子管理<i class="Hui-iconfont menu_dropdown-arrow"></i></dt>
            <dd>
                <ul>
                    <li><a href="/admin/circle/circlelist" title="圈子列表">圈子列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt><i class="Hui-iconfont"></i> 消息管理<i class="Hui-iconfont menu_dropdown-arrow"></i></dt>
            <dd>
                <ul>
                    <li><a href="/admin/message/messagelist" title="系统消息">系统消息</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt><i class="Hui-iconfont"></i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow"></i></dt>
            <dd>
                <ul>
                    <li><a href="/admin/system/base" title="系统设置">系统设置</a></li>
                    <li><a href="/admin/rule/index" title="权限节点">权限节点</a></li>
                    <li><a href="/admin/role/index" title="角色列表">角色列表</a></li>
                    <li><a href="/admin/admin/index" title="管理员列表">管理员列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt><i class="Hui-iconfont"></i> 小程序管理<i class="Hui-iconfont menu_dropdown-arrow"></i></dt>
            <dd>
                <ul>
                    <li><a href="/admin/system/arealist" title="地区管理">地区管理</a></li>
                    <li><a href="/admin/category/index" title="分类管理">分类管理</a></li>
                    <li><a href="/admin/wechatgoods/index" title="旅游产品">旅游产品</a></li>
                    <li><a href="/admin/wechatbanner/index" title="Banner列表">Banner列表</a></li>
                    <li><a href="/admin/merchant/index" title="商家管理">商家管理</a></li>
                    <li><a href="/admin/article/index" title="内容管理">内容管理</a></li>
                    <li><a href="/admin/wechatorder/index" title="订单管理（小）">订单管理（小）</a></li>
                    <li><a href="/admin/distributor/index" title="分销商管理">分销商管理</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt><i class="Hui-iconfont"></i> 财务管理<i class="Hui-iconfont menu_dropdown-arrow"></i></dt>
            <dd>
                <ul>
                    <li><a href="/admin/finance/index" title="分账管理">分账管理</a></li>
                </ul>
            </dd>
        </dl>
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onclick="displaynavbar(this)"></a></div>

<section class="Hui-article-box">
    <nav class="breadcrumb">
        <i class="Hui-iconfont"></i>
        首页 <span class="c-gray en">&gt;</span>
        用户管理<span class="c-gray en">&gt;</span>
        游客列表		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="/" title="刷新"><i class="Hui-iconfont"></i></a>
    </nav>

    <div class="Hui-article">

        <div class="page-container">
            <form action="/admin/user/userlist.html" method="get">
                <div class="text-c">
                    <input type="text" class="input-text" style="width:250px" placeholder="输入手机号码" name="search_name" value="">
                    <select class="select-box" style="width: 80px;padding: 5px 5px;" size="1" name="status">
                        <option value="" selected="">状态</option>
                        <option value="1">已注册</option>
                        <option value="2">已标签</option>
                        <option value="-1">已禁用</option>
                    </select>
                    <button type="submit" class="btn btn-success radius"><i class="Hui-iconfont"></i> 搜索</button>
                </div>
            </form>
            <div class="cl pd-5 bg-1 bk-gray mt-20">
                <span class="r mt-5">共有记录：<strong>4</strong> 条</span>
            </div>
            <table class="table table-border table-bordered table-bg mt-10">
                <thead>
                <tr class="text-c">
                    <th width="40">ID</th>
                    <th>昵称</th>
                    <th>性别</th>
                    <th>手机</th>
                    <th>所在地区</th>
                    <th>登录时间</th>
                    <th>IP</th>
                    <th>平台号</th>
                    <th>设备号</th>
                    <th>版本号</th>
                    <th>状态</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                <tr class="text-c">
                    <td>4</td>
                    <td></td>
                    <td>女</td>
                    <td></td>
                    <td></td>
                    <td>2018-07-17 10:51:04</td>
                    <td>101.242.65.184</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td id="status1_4">已标签</td>
                    <td>
                        <input class="btn btn-success radius size-MINI" type="button" onclick="layer_show('用户详情','/admin/user/usershow/uid/4.html','','')" value="详情">
                        <input class="btn btn-danger radius size-MINI ml-5" type="button" id="status_4" data="2" onclick="status(this,4)" value="禁用">
                    </td>
                </tr>
                <tr class="text-c">
                    <td>3</td>
                    <td></td>
                    <td>女</td>
                    <td></td>
                    <td></td>
                    <td>2018-07-17 10:43:10</td>
                    <td>101.242.65.184</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td id="status1_3">已注册</td>
                    <td>
                        <input class="btn btn-success radius size-MINI" type="button" onclick="layer_show('用户详情','/admin/user/usershow/uid/3.html','','')" value="详情">
                        <input class="btn btn-danger radius size-MINI ml-5" type="button" id="status_3" data="1" onclick="status(this,3)" value="禁用">
                    </td>
                </tr>
                <tr class="text-c">
                    <td>2</td>
                    <td>糖糖糖</td>
                    <td>男</td>
                    <td>18616250931</td>
                    <td>上海</td>
                    <td>2018-07-09 10:12:34</td>
                    <td>180.164.47.210</td>
                    <td>ios</td>
                    <td>123456</td>
                    <td>v.10</td>
                    <td id="status1_2">已标签</td>
                    <td>
                        <input class="btn btn-success radius size-MINI" type="button" onclick="layer_show('用户详情','/admin/user/usershow/uid/2.html','','')" value="详情">
                        <input class="btn btn-danger radius size-MINI ml-5" type="button" id="status_2" data="2" onclick="status(this,2)" value="禁用">
                    </td>
                </tr>
                <tr class="text-c">
                    <td>1</td>
                    <td>糖糖糖</td>
                    <td>男</td>
                    <td>18616250932</td>
                    <td>上海</td>
                    <td>2018-07-02 11:57:17</td>
                    <td>180.164.47.210</td>
                    <td>QWX8881223</td>
                    <td>123456</td>
                    <td>1.0</td>
                    <td id="status1_1">已注册</td>
                    <td>
                        <input class="btn btn-success radius size-MINI" type="button" onclick="layer_show('用户详情','/admin/user/usershow/uid/1.html','','')" value="详情">
                        <input class="btn btn-danger radius size-MINI ml-5" type="button" id="status_1" data="1" onclick="status(this,1)" value="禁用">
                    </td>
                </tr>
                </tbody>
            </table>
            <span class="r pages mt-10"></span>
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
    function status(obj,uid){
        var msg;
        var msg1;
        var msg2;
        var msg3;
        var status = $('#status_'+uid).attr('data');
        if(status > 0){
            msg = '确认禁用吗？';
            msg1 = '已禁用';
            msg2 = '启用';
            msg3 = '已禁用';
        } else {
            msg = '确认启用吗？';
            msg1= '已启用';
            msg2= '禁用';
            msg3= '已标签';
        }
        layer.confirm(msg,function(){
            $.ajax({
                type:'post',
                url:"/admin/user/userstatus.html",
                data:{"uid":uid,"status":status},
                success:function(data){
                    if(data.code == 0){
                        layer.msg(msg1,{icon: 1,time:1000});
                        $('#status_'+uid).val(msg2);
                        $('#status1_'+uid).html(msg3);
                        $('#status_'+uid).attr('data',data.data);
                    }else{
                        layer.msg(data.msg,{icon:5,time:1000});
                    }
                }
            });
        });
    }
</script>


</body></html>