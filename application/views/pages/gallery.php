
    <main>
        <!-- Breadcrumb Start -->
        <?php include'breadcrumb.php'; ?>

        <!-- Gallery Start -->
        <section class="tp-team__section pt-100 pb-130">
            <div class="container">
                <div class="tp-team__wrapper mb-30">
                    <div class="row">
                        <?php foreach($categories as $category){ ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="tp-team__member fix mb-30">
                                    <div class="tp-team__img w-img tp-team__overlay p-relative">
                                        <a href="<?php echo base_url('gallery/photos/'.$category['id']); ?>">
                                            <img src="<?php echo base_url('library/uploads/category/').$category['image']; ?>" alt="">
                                        </a>
                                        <div class="tp-team__info text-center">
                                            <h3 class="tp-team__name"><?php echo $category['title']; ?></h3>
                                        </div>
                                        <div class="tp-team__social">
                                            <h3 class="tp-team__name"><?php echo $category['title']; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
