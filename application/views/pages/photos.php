
    <link rel="stylesheet" href="<?php echo base_url('library/includes/plugin/lightbox/simple-lightbox.css?v2.11.0'); ?>" />

    <main>
        <!-- Breadcrumb Start -->
        <?php include'breadcrumb.php'; ?>

        <!-- Gallery Start -->
        <section class="tp-team__section pt-100 pb-130">
            <div class="container">
                <div class="tp-team__wrapper mb-30">
                    <div class="row">
                        <?php foreach(array_reverse($photos) as $photo){ ?>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                                <div class="tp-team__member fix mb-30">
                                    <div id="gallery" class="tp-team__img w-img tp-team__overlay p-relative">
                                        <a href="<?php echo base_url('library/uploads/gallery/').$photo['image']; ?>">
                                            <img src="<?php echo base_url('library/uploads/gallery/').$photo['image']; ?>" alt="<?php echo $photo['title']; ?>" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="<?php echo base_url('library/includes/plugin/lightbox/simple-lightbox.js?v2.11.0'); ?>"></script>
    <script>
        (function() {
            var $gallery = new SimpleLightbox('#gallery a', {});
        })();
    </script>
