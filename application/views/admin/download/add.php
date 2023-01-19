
	<aside class="right-side">
		<section class="content">
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>
				<ul class="breadcrumb">
					<li><i class="ace-icon fa fa-home home-icon"></i><a href="<?php echo base_url('admin/dashboard/'); ?>">Dashboard</a></li>
					<li class="active"><a href="<?php echo base_url('admin/downloads/'); ?>">Downloads - Detail</a></li>
					<li class="active">Add New Downloads</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h1 class="box-title">Add New Downloads</h1>
						</div>
						<div class="box-body">
							<form role="form" name="PageFrom" action="<?php echo base_url('admin/downloads/saveResult'); ?>" method="POST" class="form-horizontal" id="validation-form" autocomplete="off" enctype="multipart/form-data">
								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box">
											<div class="widget-body">
												<div class="widget-main">
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="title">Title</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="title" name="title" class="form-control" placeholder="Title" required />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="links">G-Drive Link</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="links" name="links" class="form-control" placeholder="Google Drive Link" required />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="space-2"></div>
													<div class="form-group" style="text-align: right;margin-top: 30px;">
														<button class="btn btn-success btn-next" id="SubmitRes" name="SubmitRes" value="1" data-last="Finish">Submit</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="box-footer"></div>
					</div>
				</div>
			</div>
		</section>
	</aside>

	<script src="<?php echo base_url('library/admin/js/bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('library/admin/js/jquery.dataTables.js'); ?>"></script>
	<script src="<?php echo base_url('library/admin/js/jquery.dataTables.bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('library/admin/js/bootbox.js'); ?>"></script>

	<script type="text/javascript">
		window.jQuery || document.write("<script src='<?php echo base_url("library/admin/js/jquery.js");?>'>"+"<"+"/script>");
		if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url("library/admin/js/jquery.mobile.custom.js");?>'>"+"<"+"/script>");
	</script>
