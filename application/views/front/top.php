<!DOCTYPE html>
<html>
<head>
    <title>展动力</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="<?php echo base_url('/css/reset.css')?>" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url('/css/style.css')?>" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url('css/zebra_pagination.css')?>" type="text/css">
    <script type="text/javascript" src="<?php echo base_url('js/zebra_pagination.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jquery-1.7.2.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('lubotu.js')?>"></script>
    <style type="text/css">
        .lubo{ width: 1440px; min-width:1000px;clear: both; position: relative; height:368px;margin-top: -16px;}
        .lubo_box{ position: relative; width: 1440px; height:368px; }
        .lubo_box li{ float: left;position: absolute; top: 0; left: 0; width: 1440px; height:368px; opacity: 0;filter:alpha(opacity=0);}
        .lubo_box li a{ display: block;width: 1440px;  height: 100%;}
        .lubo_box li img{ width: 100%; height: 368px;}

        /*圆点*/
        .cir_box{ overflow: hidden; position: absolute; z-index: 100;}
        .cir_box li{ float: left; width: 83px; height: 5px; margin:0 5px; cursor: pointer; background: #fff; opacity: 0.8;filter:alpha(opacity=80);}
        .cir_on{ background: #85c029 !important;}

        /*按钮*/
        .lubo_btn{ position: absolute; width: 100%; top: 140px;}
        .left_btn, .right_btn{ width: 30px; height: 80px; opacity: 0;filter:alpha(opacity=80); cursor: pointer; line-height: 80px; font-size: 30px; text-align: center;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}
        .left_btn{ float: left;}
        .right_btn{ float: right;}
    </style>
</head>
<body>

<div class="head">
    <div class="logo">
        <img src="<?php echo base_url('images/logo1.jpg')?>">
    </div>
    <div class="right">
        <div class="phone"></div>
        <div class="txt">
            <a href="#">手机版<span>|</span><a href="#">中文/</a><span><a href="#">EN</a></span></a>
        </div>
    </div>
</div>
<div class="banner">
    <!--<span class="jungle"><img src="images/jungle_03.png"></span>-->
    <div class="nav">
        <ul class="nav-ul">
            <li class="cur"><a href="/zdl/index.php?type">· 首  页 </a></li>
            <li><a href="/zdl/index.php?type=solution">· 解决方案 </a></li>
            <li><a href="/zdl/index.php?type=job">· 获得新工作</a></li>
            <li><a href="/zdl/index.php?type=talents">· 获取人才</a></li>
            <li><a href="/zdl/index.php?type=about">· 关于展动力</a></li>
            <li><a href="/zdl/index.php?type=join1">· 加入我们</a></li>
            <li><a href="/zdl/index.php?type=contact1">· 联系我们</a></li>
            <li><a href="/zdl/index.php?type=end1">· 集团品牌</a></li>
        </ul>
    </div>