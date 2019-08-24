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
    

<div class="page-header">当前位置： <span class="text-primary">会员概述</span> </div>
<div class="row">
    <div class="col-sm-4">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <!--<span class="label label-success pull-right">月</span>-->
                <h5>今日新增会员</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins today-count">--</h1>
                <div class="stat-percent font-bold text-success"><span class="today-rate">--</span>%<i class="fa fa-level-up"></i>
                </div>
                <small>新增会员</small>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <!--<span class="label label-success pull-right">月</span>-->
                <h5>昨日新增会员</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins yesterday-count">--</h1>
                <div class="stat-percent font-bold text-info"><span class="yesterday-rate">--</span>% <i class="fa fa-level-up"></i>
                </div>
                <small>新增会员</small>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <!--<span class="label label-info pull-right">全年</span>-->
                <h5>过去七天新增会员</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins seven-count">--</h1>
                <div class="stat-percent font-bold text-warning"><span class="seven-rate">--</span>%<i class="fa fa-level-up"></i>
                </div>
                <small>新增会员</small>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <h5>会员性别分布</h5>
            </div>
            <div class="ibox-content">
                <div class="echarts" id="echarts-pie-chart" style="display: none"></div>

                <div class="spiner-example" id="echarts-pie-chart-loading">
                    <div class="sk-spinner sk-spinner-wave">
                        <div class="sk-rect1"></div>
                        <div class="sk-rect2"></div>
                        <div class="sk-rect3"></div>
                        <div class="sk-rect4"></div>
                        <div class="sk-rect5"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <h5>会员等级分布</h5>
            </div>
            <div class="ibox-content">
                <div class="echarts" id="echarts-pie-chart1" style="display: none"></div>

                <div class="spiner-example" id="echarts-pie-chart1-loading">
                    <div class="sk-spinner sk-spinner-wave">
                        <div class="sk-rect1"></div>
                        <div class="sk-rect2"></div>
                        <div class="sk-rect3"></div>
                        <div class="sk-rect4"></div>
                        <div class="sk-rect5"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <h5>会员区域分布</h5>
            </div>
            <div class="ibox-content">
                <div style="height:600px;display: none" id="echarts-map-chart" class="echarts" ></div>

                <div class="spiner-example" id="echarts-map-chart-loading">
                    <div class="sk-spinner sk-spinner-wave">
                        <div class="sk-rect1"></div>
                        <div class="sk-rect2"></div>
                        <div class="sk-rect3"></div>
                        <div class="sk-rect4"></div>
                        <div class="sk-rect5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>

</div>
</body>
<script src="<?php  echo APP_PUBLIC?>admin/layui/layui.js"></script>

</body>
</html>


