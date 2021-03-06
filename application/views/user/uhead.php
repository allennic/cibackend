<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 3.9.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->

<html lang="en" class="no-js">

<head>
    <meta charset="utf-8"/>
    <title>YSK-部门-人员 | 后台</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="<?php echo base_url('/js/vali/bootstrap.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/js/vali/bootstrapValidator.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/global/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/global/css/components.css')?>" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/admin/layout/css/layout.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/admin/layout/css/themes/darkblue.css')?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo base_url('/css/theme/assets/admin/layout/css/custom.css')?>" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <style>
        .pagilink{
            font-size: 18px;
            text-align: center;
            margin-top: 40px;
        }
        .pagilink a{
            text-decoration: none;
            margin-right: 10px;
        }
        .pagilink strong{
            margin-right: 10px;
        }
    </style>
</head>
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner">
        <div class="page-logo">

            <div class="menu-toggler sidebar-toggler hide">
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>

        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">

                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="<?php echo base_url('/css/theme/assets/admin/layout/img/avatar3_small.jpg')?>"/>
					<span class="username username-hide-on-mobile">
					 <?php echo $username; ?></span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?php echo base_url('/admin/profile')?>">
                                <i class="icon-user"></i> 账号设置 </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/user/message')?>">
                                <i class="icon-user"></i> 查看邮件 </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="<?php echo base_url('/user/uindex/logout')?>">
                                <i class="icon-key"></i> 退出 </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix">
</div>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="sidebar-toggler-wrapper">
                    <div class="sidebar-toggler">
                    </div>
                </li>
                <li class="sidebar-search-wrapper">
                    <form class="sidebar-search " action="extra_search.html" method="POST">
                        <a href="javascript:;" class="remove">
                            <i class="icon-close"></i>
                        </a>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
                        </div>
                    </form>
                </li>
                <li class="start active open">
                    <a href="javascript:;">
                        <i class="icon-home"></i>
                        <span class="title">HOME</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="active">
                            <a href="<?php echo base_url('/user/uindex')?>">
                                资料</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url('/user/send')?>">
                                邮件</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url('/user/uindex/attend')?>">
                                打卡记录</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url('/user/vacate')?>">
                                请假记录</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
