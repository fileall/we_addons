<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="<?php  echo APP_PUBLIC?>Admin/layui/css/layui.css">
    <link rel="stylesheet" href="<?php  echo APP_PUBLIC?>Admin/admin/css/layout.css">
</head>

<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">layui 后台布局</div>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item"><a href="./index.php?c=account&a=display&">返回微擎</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black lay-side-menu">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree lay-nav">
                <li class="layui-nav-item lay-nav-item">
                    <a class="" href="javascript:;">后台首页</a>
                    <dl class="layui-nav-child lay-nav-child">
                        <dd><a href="<?php  echo webUrl('Index/main',array('menu_id'=>1))?>" class="layui-this"
                               target="main">后台首页</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item lay-nav-item">
                    <a class="" href="javascript:;">广告管理</a>
                    <dl class="layui-nav-child lay-nav-child">
                        <dd><a href="<?php  echo webUrl('Ad/index',array('menu_id'=>2))?>" class="layui-this"
                               target="main">广告列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item lay-nav-item">
                    <a class="" href="javascript:;">商品管理</a>
                    <dl class="layui-nav-child lay-nav-child">
                        <dd><a href="<?php  echo webUrl('member')?>" class="layui-this" target="main">商品列表</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="javascript:;">列表三</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item lay-nav-item">
                    <a href="javascript:;">解决方案</a>
                    <dl class="layui-nav-child lay-nav-child">
                        <dd><a href="<?php  echo webUrl('member')?>" target="main">列表一</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <iframe src="<?php  echo webUrl('Index/main')?>" frameborder="0" class="lay-admin-iframe" name="main"></iframe>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script src="<?php  echo APP_PUBLIC?>admin/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    //注意：折叠面板 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function () {
        var element = layui.element;

        //…
    });
</script>
</body>
</html>


