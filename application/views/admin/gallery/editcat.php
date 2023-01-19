
	<link rel="stylesheet" href="<?php echo base_url('library/admin/css/'); ?>ace-fonts.css" />
	<link rel="stylesheet" href="<?php echo base_url('library/admin/css/'); ?>ace.css" />

	<script src="<?php echo base_url('library/admin/js/ace/'); ?>ace-extra.js"></script>

	<aside class="right-side">
		<section class="content">
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>
				<ul class="breadcrumb">
					<li><i class="ace-icon fa fa-home home-icon"></i><a href="<?php echo base_url('admin/dashboard/'); ?>">Dashboard</a></li>
					<li class="active"><a href="<?php echo base_url('admin/photo-gallery/'); ?>">Photo Gallery - Detail</a></li>
					<li class="active">Edit Category</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h1 class="box-title">Edit Category</h1>
						</div>
						<div class="box-body">
							<form role="form" name="PageFrom" action="<?php echo base_url('admin/photo/saveCatergory'); ?>" method="POST" class="form-horizontal" id="validation-form" autocomplete="off" enctype="multipart/form-data">
								<input type="hidden" name="updateid" value="<?php echo $id_data['id']; ?>">
								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box">
											<div class="widget-body">
												<div class="widget-main">
													<div class="space-2"></div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="title">Title*</label>
														<div class="col-xs-12 col-sm-6">
															<input type="text" id="title" name="title" class="form-control" placeholder="Title for category" value="<?php echo $id_data['title']; ?>" />
														</div>
													</div>
                                                    <div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="description">Description (Optional)</label>
														<div class="col-xs-12 col-sm-6">
                                                            <textarea class="form-control" name="description" id="description" cols="30" rows="5"><?php echo $id_data['description']; ?></textarea>
														</div>
													</div>
													<div class="space-2"></div>
													<div class="form-group">
														<label for="pdf" class="control-label col-xs-12 col-sm-3 no-padding-left">Image*</label>
														<div class="col-xs-12 col-sm-6">
															<input type="file" id="id-input-file-2" name="pdf" class="" value="<?php echo $id_data['image']; ?>" />
															<h5 style="color: red;">Image Size : 370x230</h5>
														</div>
														<div class="frm_pre col-sm-6">
															<div id="image-old" class="choose_male image-preview">
																<img src="<?php echo base_url('library/uploads/category/').$id_data['image']; ?>" style="width: 100%;height: 100%;object-fit: contain;object-position: center;" />
															</div>
															<p style="text-align: center;">Old Image</p>
														</div>
														<div class="frm_pre col-sm-6">
															<div id="image-preview" class="choose_male image-preview"></div>
															<p style="text-align: center;">New Image</p>
														</div>
													</div>
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

	<script type="text/javascript">
		window.jQuery || document.write("<script src='<?php echo base_url('library/admin/js/'); ?>jquery.js'>"+"<"+"/script>");
	</script>

	<script src="<?php echo base_url('library/admin/js/bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('library/admin/js/jquery.dataTables.js'); ?>"></script>
	<script src="<?php echo base_url('library/admin/js/jquery.dataTables.bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('library/admin/js/bootbox.js'); ?>"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$.uploadPreview({
				input_field: "#id-input-file-2",
				preview_box: "#image-preview",
				label_field: "#id-input-file-2",
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

	<script>
		var x = 1; //initlal text box count
		var FieldCount=2; //to keep track of text box added
		$(document).ready(function() {
			var MaxInputs       = 10; //maximum input boxes allowed
			var InputsWrapper   = $("#getphotos"); //Input boxes wrapper ID
			var AddButton       = $("#addphoto"); //Add button ID
			var xy=<?php echo $starting;?>;

			$(AddButton).click(function(e){
				$("#getphotos").show();
				if(x <= MaxInputs){
					FieldCount++; //text box added increment
					$(InputsWrapper).append('<div class="form-group" id="photoadd_'+ FieldCount +'"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="VehicleImage1">Product Image</label><div class="col-xs-12 col-sm-4"><input type="file" class="inPutCls" name="VehicleImage1['+xy+'][]" id="id-input-file-'+FieldCount+'"></div><div class="col-xs-12 col-sm-4"><a href="javascript:void(0)" onclick="removedata(\''+FieldCount+'\');" class="btn btn-danger">Remove Photo</a></div></div></div>');
					$('.inPutCls').ace_file_input({
						no_file:'No File ...',
						btn_choose:'Choose',
						btn_change:'Change',
						droppable:false,
						onchange:null,
						thumbnail:false, //| true | large
						allowExt: ["jpeg", "jpg", "png", "gif" , "bmp"],
						allowMime: ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"],
						blacklist:'exe|php'
					});
					x++;
					xy++;
				}
				return false;
			});
		});

		function removedata(removeid){
			x--;
			$("#photoadd_"+removeid).remove();
		}
	</script>

	<!-- ace scripts -->
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/elements.scroller.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/elements.colorpicker.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/elements.fileinput.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/elements.typeahead.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/elements.wysiwyg.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/elements.spinner.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/elements.treeview.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/elements.wizard.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/elements.aside.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>date-time/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.ajax-content.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.touch-drag.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.sidebar.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.sidebar-scroll-1.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.submenu-hover.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.widget-box.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.settings.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.settings-rtl.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.settings-skin.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.widget-on-reload.js"></script>
	<script src="<?php echo base_url('library/admin/js/'); ?>ace/ace.searchbox-autocomplete.js"></script>

	<script src="<?php echo base_url('library/admin/js/'); ?>jquery.validate.js"></script>
	<script src="<?php echo base_url('library/admin/js/');; ?>jquery.maskedinput.js"></script>
	<script src="<?php echo base_url('library/admin/js/');; ?>select2.js"></script>

