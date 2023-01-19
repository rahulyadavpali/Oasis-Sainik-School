<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<title><?php echo $title; ?></title>
	<!-- Linked CSS -->
	<link href="<?php echo base_url('library/admin/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('library/admin/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('library/admin/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('library/admin/css/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('library/admin/css/AdminLTE.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('library/admin/css/admin_dev_style.css'); ?>" rel="stylesheet" type="text/css" />
	<!-- Favicaon Icon -->
	<link rel="shortcut icon" href="<?php echo base_url('library/images/favicon.ico');?>">
	<!-- Linked Js -->
	<script src="<?php echo base_url('library/admin/js/jquery-1.9.1.js'); ?>"></script>
	<script src="<?php echo base_url('library/admin/js/jquery.uploadPreview.min.js'); ?>"></script>
	<script src="<?php echo base_url('library/admin/js/jquery.validate.js'); ?>"></script>

</head>
<body class="skin-blue">
	<header class="header">
		<nav class="navbar navbar-static-top" role="navigation">
			<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a href="<?php echo base_url('admin/dashboard/');?>" class="logo"><?php echo $header_title; ?></a>
			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="glyphicon glyphicon-user"></i>
							<span><?php echo $this->session->userdata('name');?></span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-footer">
								<!-- <div class="pull-left"><a href="<?php echo base_url('user/edit-profile/'); ?>" class="btn btn-default btn-flat">Edit Profile</a></div> -->
								<div class="pull-right">
									<a href="<?php echo base_url('admin/dashboard/logout');?>" class="btn btn-default btn-flat">Log out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
