<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>YSK-部门-人员管理 | 登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/global/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/global/plugins/uniform/css/uniform.default.css')?>" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url('/css/theme/assets/admin/pages/css/login.css')?>" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo base_url('/css/theme/assets/global/css/components.css')?>" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/global/css/plugins.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/admin/layout/css/layout.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/css/theme/assets/admin/layout/css/themes/darkblue.css')?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo base_url('/css/theme/assets/admin/layout/css/custom.css')?>" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="login">
<div class="menu-toggler sidebar-toggler">
</div>
<div class="logo">

</div>
<div class="content">
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/verifylogin'); ?>
    <form class="login-form" method="post">


        <h3 class="form-title">Sign In</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase" name="submit">Login</button>
            <label class="rememberme check">
                <input type="checkbox" name="remember" value="1"/>Remember </label>
        </div>

    </form>


</div>
<div class="copyright">
    2016 © YSK-云时空. Admin Dashboard.
</div>

</body>
</html>
