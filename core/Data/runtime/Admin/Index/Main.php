<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="<?php  echo APP_PUBLIC?>Admin/layui/css/layui.css">
</head>
<style>
</style>
<body>
<div>
    
<div class="layui-row layui-col-space15">
    <div class="layui-col-md8">
        <div class="layui-card ">
            <div class="layui-card-header"><b>技术支持</b><span>Tech&nbsp;support</span></div>
            <div class="layui-card-body">
                <table class="layui-table">
                    <colgroup>
                        <col width="150">
                        <col>
                    </colgroup>
                    <tbody>
                    <tr>
                        <td>技术支持:</td>
                        <td>卓云科技</td>
                    </tr>
                    <tr>
                        <td>在线沟通:</td>
                        <td>QQ:604309279&nbsp;&nbsp;0791-87904008&nbsp;&nbsp;邮箱:summer@zooyoo.cc</td>
                    </tr>
                    <tr>
                        <td>最新动态:</td>
                        <td>欢迎使用《卓云网站管理系统》</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="layui-col-md4 ">
        <div class="layui-card brad-10">
            <div class="layui-card-header"><b>系统信息</b></div>
            <div class="layui-card-body layui-text">
                <table class="layui-table">
                    <colgroup>
                        <col width="150">
                        <col>
                    </colgroup>
                    <tbody>
                        <?php  if(is_array($data)) { foreach($data as $index => $item) { ?>
                        <tr>
                            <td><?php  echo $index;?></td>
                            <td>
                                <?php  echo $item;?>
                            </td>
                        </tr>
                        <?php  } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
</body>
<script src="<?php  echo APP_PUBLIC?>admin/layui/layui.js"></script>

</body>
</html>


