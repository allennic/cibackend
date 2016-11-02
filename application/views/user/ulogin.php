
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">

<head>
<meta charset="utf-8"/>
<title>人员登录 | Login Options - Login Form 2</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<link href="<?php echo base_url('/css/theme/assets/global/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('/css/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('/css/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('/css/theme/assets/global/plugins/uniform/css/uniform.default.css')?>" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url('/css/theme/assets/admin/pages/css/login2.css')?>" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url('/css/theme/assets/global/css/components-rounded.css')?>" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('/css/theme/assets/global/css/plugins.css')?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('/css/theme/assets/admin/layout/css/layout.css')?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('/css/theme/assets/admin/layout/css/themes/default.css')?>" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url('/css/theme/assets/admin/layout/css/custom.css')?>" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico"/>
</head>

<body class="login">
<div class="menu-toggler sidebar-toggler">
</div>

<div class="logo">
	<a href="index.html">
	</a>
</div>

<div class="content">
	<?php echo form_open('user/VuLogin'); ?>
	<form class="login-form" method="post">
		<div class="form-title">
			<span class="form-title">Welcome.</span>
			<span class="form-subtitle">Please login.</span>
		</div>
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
			<button type="submit" class="btn btn-primary btn-block uppercase">Login</button>
		</div>
		<div class="form-actions">
			<div class="pull-left">
				<label class="rememberme check">
				<input type="checkbox" name="remember" value="1"/>Remember me </label>
			</div>

		</div>
	</form>
</div>

</body>
</html>