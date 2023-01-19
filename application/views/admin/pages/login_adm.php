<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="UTF-8">
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- Linked CSS -->
	<link href="<?php echo base_url('library/admin/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('library/admin/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('library/admin/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('library/admin/css/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('library/admin/css/AdminLTE.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('library/admin/css/admin_dev_style.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('library/admin/css/admin_style.css'); ?>" rel="stylesheet" type="text/css" />
	<!-- Favicaon Icon -->
	<link rel="shortcut icon" href="<?php echo base_url('library/images/favicon.ico');?>">
	<!-- Linked Js -->
	<script src="<?php echo base_url('library/admin/js/jquery-1.9.1.js'); ?>"></script>
	<script src="<?php echo base_url('library/admin/js/jquery.validate.js'); ?>"></script>
</head>
<body>
	<script type="text/javascript">
		$("#loginForm").validate({
			rules:{
				username: {required: true}, password: {required: true}
			},
			messages: {
				username: {required: "Please Enter Your Username."}, password: {required: "Please Enter Your Password."}
			}
		});
	</script>

	<?php if($this->session->flashdata('error')){ ?>
		<div id="alertmessage" class="alert alert-danger altpnl"><strong> <?php echo $this->session->flashdata('error');  ?></strong></div>
	<?php } ?>
	<div class="loginwrap">
		<div class="loginfrm">
			<h1>Oasis Sainik School</h1>
			<form id="loginForm" class="form-contact-warp" action="<?php echo base_url('admin/Login/loginAdmin'); ?>" method="POST">
				<div class="formwrp">
					<label>Username</label>
					<input type="text" class="frmfield" name="username" id="username" class="form-control" required>
					<label>Password</label>
					<input type="password" class="frmfield" id="password" name="password" class="form-control" required>
					<div class="logbtnwr">
						<input value="Login" class="loginbtn" type="submit">
					</div>
				</div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>

	<script type="text/javascript">
		$("#alertmessage").fadeIn('slow').delay(8000).fadeOut('slow');
	</script>

</body>
</html>