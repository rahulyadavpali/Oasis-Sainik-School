
	<aside class="right-side">
		<section class="content">
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>
				<ul class="breadcrumb">
					<li><i class="ace-icon fa fa-home home-icon"></i><a href="<?php echo base_url('admin/dashboard/'); ?>">Dashboard</a></li>
					<li class="active"><a href="<?php echo base_url('admin/result/'); ?>">Result - Detail</a></li>
					<li class="active">Edit Result</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h1 class="box-title">Edit Result</h1>
						</div>
						<div class="box-body">
							<form role="form" name="PageFrom" action="<?php echo base_url('admin/resultadm/updateData'); ?>" method="POST" class="form-horizontal" id="validation-form" autocomplete="off" enctype="multipart/form-data">
								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box">
											<div class="widget-body">
												<div class="widget-main">
													<input type="hidden" name="updateid" value="<?php echo $id_data['id']; ?>" />
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="field">Result*</label>
														<div class="col-xs-12 col-sm-6">
															<select class="form-control" id="field" name="field">
																<option value="<?php echo $id_data['field']; ?>"><?php echo $id_data['field']; ?></option>
																<option value="NEET">NEET</option>
																<option value="JEE">JEE</option>
																<option value="12th Board">12th Board</option>
															</select>
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="rank">Rank</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="rank" name="rank" class="form-control" value="<?php echo $id_data['rank']; ?>" />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="collage">College</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="collage" name="collage" class="form-control" value="<?php echo $id_data['collage']; ?>" />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="rname">Student Name*</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="rname" name="rname" required class="form-control" value="<?php echo $id_data['name']; ?>" />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="space-2"></div>
													<div class="form-group">
														<label for="result-image" class="control-label col-xs-12 col-sm-3 no-padding-left">Student Image*</label>
														<div class="col-xs-12 col-sm-6">
															<input type="file" id="result-image" name="result_image" class="" value="<?php echo $id_data['image_name']; ?>" />
														</div>
														<div class="frm_pre col-sm-6">
															<div class="choose_male image-preview" style="background-image: url('<?php echo base_url("library/uploads/results/".$id_data['image_name']); ?>');"></div>
															<h6>Old Image</h6>
														</div>
														<div class="frm_pre col-sm-6">
															<div id="image-preview" class="choose_male image-preview"></div>
															<h6>For New Image</h6>
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="img_title">Image Title</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="img_title" name="img_title" class="form-control" value="<?php echo $id_data['image_title']; ?>" />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="img_alt">Image Alt</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="img_alt" name="img_alt" class="form-control" value="<?php echo $id_data['image_alt']; ?>" />
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
