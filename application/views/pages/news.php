
    <section class="breadcrumb_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb_item">
                        <ul>
                            <li><a href="<?php echo base_url('home/'); ?>"><i class="ti-home"></i></a></li>
                            <li><span><i class="ti-angle-right"></i></span></li>
                            <li><a href="javascript:void(0)">News & Events</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about_section pt-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
					<div class="announ_container about-title-section about-title-section-2 mb-30">
						<h1>Announcements</h1>
						<div class="annou_table ann_list">
							<ul>
								<?php if(!empty($news)){$sno = 1;
	                                    foreach($news as $key => $val){ 
	                                ?>
	                                <li>
	                                    <div class="ann_list_txt_hd"><span><?php echo $news[$key]['date']; ?></span> <?php echo $news[$key]['month']; ?></div>
	                                    <div class="ann_list_txt">
	                                        <p><?php echo $news[$key]['title']; ?></p>
	                                    </div>
	                                    <div class="ann_list_btn">
	                                        <a href="<?php echo base_url('library/uploads/news/'.$news[$key]['pdf_name']); ?>" target="_blank">View</a>
	                                    </div>
	                                </li>
	                                <?php 
	                                            $sno++;
	                                        }
	                                    }
	                                ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
