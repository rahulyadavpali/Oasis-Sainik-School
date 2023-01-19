
	<aside class="right-side">
		<section class="content">
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>
				<ul class="breadcrumb">
					<li><i class="ace-icon fa fa-dashboard"></i><a href="<?php echo base_url('admin/dashboard/'); ?>">Dashboard</a></li>
					<li class="active">Book Solution - Detail</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h1 class="box-title">Book Solution - Detail</h1>
							<a class="box_btn" href="<?php echo base_url()?>admin/book/add/"><button class="btn btn-primary only_float_right">Add New Book Solution</button></a>
						</div>
						<div class="box-body">
							<table id="sample-table-2" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Date/Month</th>
										<th>Title</th>
										<th>Video Link</th>
										<th>PDF & Image</th>
										<th>Stream</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($allresult)){$sno = 1;
										foreach($allresult as $key => $val){ 
									?>
									<tr>
										<td><?php echo $sno; ?></td>
										<td><?php echo $allresult[$key]['date']; ?> <?php echo $allresult[$key]['month']; ?></td>
										<td><?php echo $allresult[$key]['title']; ?></td>
										<td><?php echo $allresult[$key]['video_link']; ?></td>
										<td><?php echo $allresult[$key]['pdf_name']; ?></td>
										<td>
											<?php if($allresult[$key]['stream'] == '1'){echo 'Medical';}
											elseif($allresult[$key]['stream'] == '2'){echo 'Engineering';}
											else{echo 'Pre-Foundation';} ?>
										</td>
										<td>
											<div class="hidden-sm hidden-xs action-buttons">
												<a class="red" title="Delete" href="javascript:void(0)" onclick="TempDel(<?php echo $allresult[$key]['id']?>)"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>
											</div>
										</td>
									</tr>
									<?php 
												$sno++;
											}
										}
									?>
								</tbody>
							</table>
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
		function TempDel(id){
			bootbox.confirm("<h3>Are you sure, You want to delete this entry?</h3>", function(result){
				if(result){
					$.ajax({
						url : "<?php echo base_url()."admin/book/delete"?>",
						type : "POST",
						data : {"value" : id},
						success:function(data){location.reload();}
					}); // End of ajax call
				}
			});
		}

		function confirmbo(){
			var retval=confirm("Are you sure to remove this Record?");
			return retval;
		}

		jQuery(function($){
			var oTable1 = $('#sample-table-2').dataTable();
		});
	</script>

	<script type="text/javascript">
		window.jQuery || document.write("<script src='<?php echo base_url("library/admin/js/jquery.js");?>'>"+"<"+"/script>");
		if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url("library/admin/js/jquery.mobile.custom.js");?>'>"+"<"+"/script>");
	</script>
