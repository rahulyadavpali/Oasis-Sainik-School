
	<aside class="right-side">
		<section class="content">
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>
				<ul class="breadcrumb">
					<li><i class="ace-icon fa fa-home home-icon"></i><a href="<?php echo base_url('admin/dashboard/'); ?>">Dashboard</a></li>
					<li class="active"><a href="<?php echo base_url('admin/result/'); ?>">Result - Detail</a></li>
					<li class="active">Add New Result</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h1 class="box-title">Add New Result</h1>
						</div>
						<div class="box-body">
							<form role="form" name="PageFrom" action="<?php echo base_url('admin/Resultadm/saveResult'); ?>" method="POST" class="form-horizontal" id="validation-form" autocomplete="off" enctype="multipart/form-data">
								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box">
											<div class="widget-body">
												<div class="widget-main">
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="field">Result*</label>
														<div class="col-xs-12 col-sm-6">
															<select class="form-control" id="field" name="field" required>
																<option value="">Stream</option>
																<option value="Medical">NEET</option>
																<option value="Engineering">JEE</option>
																<option value="Foundation">12th Board</option>
															</select>
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="rank">Rank</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="rank" name="rank" class="form-control" placeholder="" />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="collage">College</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="collage" name="collage" class="form-control" placeholder="" />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="rname">Student Name*</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="rname" name="rname" required class="form-control" placeholder="" />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="space-2"></div>
													<div class="form-group">
														<label for="result-image" class="control-label col-xs-12 col-sm-3 no-padding-left">Student Image*</label>
														<div class="col-xs-12 col-sm-6">
															<input type="file" id="result-image" name="result_image" class="" required />
															<h5 style="color: red;">Image Size : 230x280</h5>
														</div>
														<div class="frm_pre col-sm-6">
															<div id="image-preview" class="choose_male image-preview"></div>
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="img_title">Image Title</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="img_title" name="img_title" class="form-control" placeholder=" Image Title Goes Here" />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="img_alt">Image Alt</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="img_alt" name="img_alt" value="" class="form-control" placeholder=" Image Alt Goes Here(For SEO)" />
														</div>
													</div>
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
		$(document).ready(function(){
			$.uploadPreview({
				input_field: "#result-image",
				preview_box: "#image-preview",
				label_field: "#result-image",
				label_default: "Choose File",
				label_selected: "Change File",
				no_label: false
			});
		});
	</script>

	<script type="text/javascript">
		window.jQuery || document.write("<script src='<?php echo base_url("library/admin/js/jquery.js");?>'>"+"<"+"/script>");
		if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url("library/admin/js/jquery.mobile.custom.js");?>'>"+"<"+"/script>");
	</script>
