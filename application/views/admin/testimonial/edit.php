
	<aside class="right-side">
		<section class="content">
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>
				<ul class="breadcrumb">
					<li><i class="ace-icon fa fa-home home-icon"></i><a href="<?php echo base_url('admin/dashboard/'); ?>">Dashboard</a></li>
					<li class="active"><a href="<?php echo base_url('admin/testimonial/'); ?>">Testimonial - Detail</a></li>
					<li class="active">Edit Review</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h1 class="box-title">Edit Testimonial Review</h1>
						</div>
						<div class="box-body">
							<form role="form" name="PageFrom" action="<?php echo base_url('admin/testimonial/updateData'); ?>" method="POST" class="form-horizontal" id="validation-form" autocomplete="off" enctype="multipart/form-data">
								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box">
											<div class="widget-body">
												<div class="widget-main">
													<input type="hidden" name="updateid" value="<?php echo $id_data['id']; ?>">
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Name*</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="name" name="name" required class="form-control" value="<?php echo $id_data['name']; ?>" />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="message">Message</label>
														<div class="col-xs-12 col-sm-6">
															<textarea class="form-control" id="message" name="message" rows="8"><?php echo $id_data['message']; ?></textarea>
															<h5 style="color: red;">Max. Words : 250</h5>
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label for="result-image" class="control-label col-xs-12 col-sm-3 no-padding-left">Student Image*</label>
														<div class="col-xs-12 col-sm-6">
															<input type="file" id="review-image" name="review_image" class="" value="<?php echo $id_data['review_img']; ?>" />
														</div>
														<div class="frm_pre col-sm-6">
															<div class="choose_male image-preview" style="background-image: url('<?php echo base_url("library/uploads/testimonials/".$id_data['review_img']); ?>');"></div>
															<h6>Old Image</h6>
														</div>
														<div class="frm_pre col-sm-6">
															<div id="image-preview" class="choose_male image-preview"></div>
															<h6>For New Image</h6>
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="img_alt">Image Title</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="rev_alt" name="rev_alt" class="form-control" value="<?php echo $id_data['review_img_title']; ?>"  />
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group" style="text-align: right;margin-top: 30px;">
														<button class="btn btn-success btn-next" id="SubmitTet" name="SubmitTet" value="1" data-last="Finish">Submit</button>
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
				input_field: "#review-image",
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
