
    <link rel="stylesheet" href="<?php echo base_url('library/includes/plugin/vimeo-player/css/jquery.mb.vimeo_player.min.css'); ?>" />
    <script src="<?php echo base_url('library/includes/plugin/vimeo-player/jquery.mb.vimeo_player.js'); ?>" ></script>

    <script>
        var myPlayer;
        jQuery(function () {
            myPlayer = jQuery("#video-player").vimeo_player();
        });
    </script>

    <main>
		<!-- Hero Section -->
        <section class="tp-hero__section p-relative fix">
            <div id="banner-video" class="banner_video">
            	<!-- <iframe id="vimeo-player" class="vimeo player" src="https://player.vimeo.com/video/737993309?autoplay=1&loop=1&autopause=0" frameborder="0" allow="autoplay" webkitallowfullscreen mozallowfullscreen allowfullscreen data-ready="true"></iframe> -->
            </div>
        </section>

        <div id="video-player" class="player" data-property="{videoURL:'737993309',containment:'#banner-video',align:'bottom,center', showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1}">My video</div>

        <!-- About-Section -->
        <section class="tp-testimonial-2__section hm_abt_section home_about_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="tp-testimonial-2__wrapper p-relative">
                        <div class="tp-about__slider">
                            <div class="tp-testimonial-2__box white-bg">
                                <div class="row">
                                    <div class="abt_img col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="about_img">
                                            <img src="<?php echo base_url('library/images/about/infra.jpg'); ?>" alt="" />
                                        </div>
                                    </div>
                                    <div class="abt_txt col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="abt_txtdiv tp-testimonial-2__review">
                                            <h3>Welcome To Oasis</h3>
                                            <p>The primary aim and objective of <strong>OASIS SAINIK SCHOOL</strong> is to prepare boys academically,physically and mentally for entry into the <strong>National Defense Academy (NDA)</strong>.</p>
                                            <p>Education means all round development of the child. This is possible if any institution provides every possible needs of the students to progress. With this aim in mind we have decided to start a special school "The Oasis Sainik School"...</p>
                                            <a href="<?php echo base_url('about-oasis'); ?>">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-testimonial-2__box white-bg">
                                <div class="row">
                                    <div class="abt_img col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="about_img">
                                            <img src="<?php echo base_url('library/images/about/principal.JPG'); ?>" alt="" />
                                        </div>
                                    </div>
                                    <div class="abt_txt col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="abt_txtdiv tp-testimonial-2__review">
                                            <h3>Principal Message</h3>
                                            <p>Today, the role of a school is not only to pursue academic excellence but also to motivate and empower its students to be lifelong learners, critical thinkers and productive members of an ever changing global society.</p>
                                            <p>The first thing I noticed when I started my tenure at Oasis Sainik School was the glorious trio of responsibility innovativeness and dedication to the students...</p>
                                            <a href="<?php echo base_url('principal-message'); ?>">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-testimonial-2__box white-bg">
                                <div class="row">
                                    <div class="abt_img col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="about_img">
                                            <img src="<?php echo base_url('library/images/about/infrastructure.JPG'); ?>" alt="" />
                                        </div>
                                    </div>
                                    <div class="abt_txt col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="abt_txtdiv tp-testimonial-2__review">
                                            <h3>Infrastructure</h3>
                                            <p><strong>Oasis Sainik School</strong> provides educational terms and boarding facilities for students in excellent infrastructure with enviable teacher pupil ratio. The priority is not examination grades but the stimulation of independent inquiry and intellectual curiosity. Students are encouraged to maintain a balance between academic work and wide range of co-curricular opportunities with sporting and cultural achievement valued equally...</p>
                                            <a href="<?php echo base_url('principal-message'); ?>">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="tp-about__arrows"></div>
                </div>
            </div>
        </section>

        <!-- Testimonial-Section -->
        <section class="tp-testimonial-2__section hm_abt_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="tp-testimonial-2__wrapper p-relative">
                        <div class="tp-testimonial-2__slider">
                            <?php foreach(array_reverse($testimonial) as $review){ ?>
                                <div class="tp-testimonial-2__box white-bg">
                                    <div class="row">
                                        <div class="abt_txt col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="abt_txtdiv tp-testimonial-2__review">
                                                <div class="tp-testimonial__review">
                                                    <span class="tp-testimonial__quote"><i class="fa-solid fa-quote-left"></i></span>
                                                    <p><?php echo $review['message']; ?></p>
                                                    <h4><?php echo $review['name']; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="abt_img col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="about_img">
                                                <img src="<?php echo base_url('library/uploads/testimonials/'.$review['review_img']); ?>" alt="<?php echo $review['review_img_title']; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="tp-testimonial__arrows"></div>
                </div>
            </div>
        </section>

        <!-- Welcome-Section -->
        <section class="welcom_section">
            <div class="container">
                <div class="row">
                    <div class="welcome_container">
                        <div class="row">
                            <div class="abt_img col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="about_img">
                                    <img src="<?php echo base_url('library/images/about/welcome.JPG'); ?>" alt="" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="welcome_txt tp-testimonial__review">
                                    <h3>Welcome To The <br/>Oasis Sainik School</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Oasis-Section -->
        <section class="tp-testimonial-2__section hm_abt_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="tp-testimonial-2__wrapper p-relative">
                        <div>
                            <div class="tp-testimonial-2__box white-bg">
                                <div class="row">
                                    <div class="abt_txt col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="abt_txtdiv tp-testimonial-2__review">
                                            <div class="tp-testimonial__review">
                                                <h3>Oasis Sainik School</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="abt_img col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="about_img">
                                            <img src="<?php echo base_url('library/images/about/act-two.jpg'); ?>" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	</main>

    <footer class="footer_section" style="background-image: url('<?php echo base_url("library/images/about/footer-img.jpg"); ?>');background-repeat: no-repeat;background-size: cover;background-position: center;background-attachment: fixed;">
        <div class="container">
            <div class="row">
                <div class="footer_contaniner">
                    <div class="footer_top">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="ftr_address">
                                    <p>Oasis Sainik School - 18 SPD, Near Badpol, Teh : PiliBanga, Hanumangarh, Rajasthan, 335804</p>
                                    <p>Tel : <a href="tel:9210827301" target="_blank">+91 92108 27301</a> | Email : <a href="mailto:info@sainikschoolkalibangan.com" target="_blank">info@sainikschoolkalibangan.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="copy_txt">
                                    <p><a href="<?php echo base_url('terms-and-conditions'); ?>">Term & Conditions</a> | All right reserved | Oasis Sainik School, Kalibanga © 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS here -->
    <script src="<?php echo base_url('library/includes/js/vendor/waypoints.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/bootstrap-bundle.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/meanmenu.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/slick.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/magnific-popup.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/parallax.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/nice-select.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/counterup.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/wow.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/isotope-pkgd.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/imagesloaded-pkgd.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/ajax-form.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/countdown.js'); ?>"></script>
    <script src="<?php echo base_url('library/includes/js/main.js'); ?>"></script>

</body>
</html>