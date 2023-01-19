<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('library/images/favicon.ico'); ?>">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/bootstrap.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/meanmenu.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/animate.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/slick.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/magnific-popup.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/nice-select.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/font-awesome-pro.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/elegent-icons.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/spacing.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/main.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/custom.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('library/includes/css/media.css'); ?>" />

    <!-- JS here -->
    <script src="<?php echo base_url('library/includes/js/vendor/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('library/admin/js/jquery.validate.js'); ?>"></script>

</head>
<body>

    <!-- back to top start -->
    <button class="tp-backtotop">
        <span><i class="fal fa-angle-double-up"></i></span>
    </button>

    <!-- header area start -->
    <header>
        <div class="tp-header__area tp-header__transparent">
            <div class="tp-header__main top_header" id="header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xxl-4 col-xl-4 col-lg-3 col-md-6 col-10">
                            <div class="logo hdr_logo">
                                <a href="<?php echo base_url('home'); ?>">
                                    <img src="<?php echo base_url('library/images'); ?>/logo/logo.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-8 col-lg-9 d-none d-lg-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url('/home'); ?>">Home</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="javascript:void(0)">About</a>
                                            <div class="submenu desktop_menu">
                                                <div class="submenu_image">
                                                    <img src="<?php echo base_url('library/images/blog/blog-big-3.jpg'); ?>" alt="" />
                                                </div>
                                                <div class="submenu_option">
                                                    <ul>
                                                        <li><a href="<?php echo base_url('/about-oasis'); ?>">About Oasis</a></li>
                                                        <li><a href="<?php echo base_url('/management-council'); ?>">Management Council</a></li>
                                                        <li><a href="<?php echo base_url('/principal-message'); ?>">Principal Message</a></li>
                                                        <li><a href="<?php echo base_url('/infrastructure'); ?>">Infrastructure</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="submenu mobile_menu">
                                                <li><a href="<?php echo base_url('/about-oasis'); ?>">About Oasis</a></li>
                                                <li><a href="<?php echo base_url('/management-council'); ?>">Management Council</a></li>
                                                <li><a href="<?php echo base_url('/principal-message'); ?>">Principal Message</a></li>
                                                <li><a href="<?php echo base_url('/infrastructure'); ?>">Infrastructure</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="javascript:void(0">Admissions</a>
                                            <div class="submenu desktop_menu">
                                                <div class="submenu_image">
                                                    <img src="<?php echo base_url('library/images/blog/blog-big-2.jpg'); ?>" alt="" />
                                                </div>
                                                <div class="submenu_option">
                                                    <ul>
                                                        <li><a href="admission-procedure">Admission Procedure</a></li>
                                                        <li><a href="fee-structure">Fee Structure</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="submenu mobile_menu">
                                                <li><a href="admission-procedure">Admission Procedure</a></li>
                                                <li><a href="fee-structure">Fee Structure</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('careers'); ?>">Careers</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="javascript:void(0">Info Links</a>
                                            <div class="submenu desktop_menu">
                                                <div class="submenu_image">
                                                    <img src="<?php echo base_url('library/images/blog/blog-big-1.jpg'); ?>" alt="" />
                                                </div>
                                                <div class="submenu_option">
                                                    <ul>
                                                        <li><a href="<?php echo base_url('rte'); ?>">RTE</a></li>
                                                        <li><a href="https://drive.google.com/file/d/1nvvHM64HjE0xzeVAp6D9GfXfJ0CfCwcT/view?usp=sharing" target="_blank">Affiddavit Members</a></li>
                                                        <li><a href="https://drive.google.com/file/d/1fIIaa5eIocNwz6E_2PV1B8RKnKRx_HZY/view?usp=sharing" target="_blank">Affiliation Letter</a></li>
                                                        <li><a href="https://drive.google.com/file/d/1B0MPlLZyX2wMgEJVz0W40wDS-CDZmtpr/view?usp=sharing" target="_blank">Details Of Infrastructure</a></li>
                                                        <li><a href="https://drive.google.com/file/d/1kHRIVllqyX6AMXFNRyYGevwGYisT_UKY/view" target="_blank">Academic calender 2022-2023</a></li>
                                                    </ul>
                                                    <ul>
                                                        <li><a href="https://drive.google.com/file/d/1AXLjU9wnOeNnaPyB3SLEwipQKhlm9UVJ/view?usp=sharing" target="_blank">Enrollment State</a></li>
                                                        <li><a href="https://drive.google.com/file/d/1GrphXtbZgoxmnCUO7hrorbmua0C1U-Ju/view?usp=sharing" target="_blank">Library Facilities</a></li>
                                                        <li><a href="https://drive.google.com/file/d/1sL3zEUMaGQZM0Q_EgehVUg70XIPptMmX/view?usp=sharing" target="_blank">Rule Book</a></li>
                                                        <li><a href="https://drive.google.com/file/d/1YkHCr_6iINC5CPjexV4q03vbk_Q23ulP/view?usp=sharing" target="_blank">School Management</a></li>
                                                        <li><a href="https://drive.google.com/file/d/1FD-Y6nRWcnK6f72sb6yQ0Pzij9eLFAVf/view?usp=sharing" target="_blank">Teaching Staff List</a></li>
                                                    </ul>
                                                    <ul>
                                                        <li><a href="https://drive.google.com/file/d/1pMTCUlMv0HdGRLM5L4ZsWbeLzE27UA_r/view?usp=sharing" target="_blank">Transfer Certificate</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="submenu mobile_menu">
                                                <li><a href="<?php echo base_url('rte'); ?>">RTE</a></li>
                                                <li><a href="https://drive.google.com/file/d/1nvvHM64HjE0xzeVAp6D9GfXfJ0CfCwcT/view?usp=sharing" target="_blank">Affiddavit Members</a></li>
                                                <li><a href="https://drive.google.com/file/d/1fIIaa5eIocNwz6E_2PV1B8RKnKRx_HZY/view?usp=sharing" target="_blank">Affiliation Letter</a></li>
                                                <li><a href="https://drive.google.com/file/d/1B0MPlLZyX2wMgEJVz0W40wDS-CDZmtpr/view?usp=sharing" target="_blank">Details Of Infrastructure</a></li>
                                                <li><a href="https://drive.google.com/file/d/1kHRIVllqyX6AMXFNRyYGevwGYisT_UKY/view" target="_blank">Academic calender 2022-2023</a></li>
                                                <li><a href="https://drive.google.com/file/d/1AXLjU9wnOeNnaPyB3SLEwipQKhlm9UVJ/view?usp=sharing" target="_blank">Enrollment State</a></li>
                                                <li><a href="https://drive.google.com/file/d/1GrphXtbZgoxmnCUO7hrorbmua0C1U-Ju/view?usp=sharing" target="_blank">Library Facilities</a></li>
                                                <li><a href="https://drive.google.com/file/d/1sL3zEUMaGQZM0Q_EgehVUg70XIPptMmX/view?usp=sharing" target="_blank">Rule Book</a></li>
                                                <li><a href="https://drive.google.com/file/d/1YkHCr_6iINC5CPjexV4q03vbk_Q23ulP/view?usp=sharing" target="_blank">School Management</a></li>
                                                <li><a href="https://drive.google.com/file/d/1FD-Y6nRWcnK6f72sb6yQ0Pzij9eLFAVf/view?usp=sharing" target="_blank">Teaching Staff List</a></li>
                                                <li><a href="https://drive.google.com/file/d/1pMTCUlMv0HdGRLM5L4ZsWbeLzE27UA_r/view?usp=sharing" target="_blank">Transfer Certificate</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="javascript:void(0)">Downloads</a>
                                            <div class="submenu">
                                                <div class="submenu_image">
                                                    <img src="<?php echo base_url('library/images/event/event-thumb-4.jpg'); ?>" alt="" />
                                                </div>
                                                <div class="submenu_option desktop_menu">
                                                    <ul>
                                                        <li><a href="<?php echo base_url('download'); ?>">Downloads</a></li>
                                                        <li><a href="https://drive.google.com/file/d/14afbW9ORFXa5ejWQqZg9n_0HpvuNPNC4/view" target="_blank">Articles List</a></li>
                                                        <li><a href="https://drive.google.com/drive/folders/1HyDHyotfyeeiwujCzi_vrLXcuUe8aq4O" target="_blank">Download L.C.</a></li>
                                                        <li><a href="https://drive.google.com/file/d/1X7-TCJOAtmmBQp0GlhFuQQnczXZu_gBv/view?usp=sharing" target="_blank">Physical Fitness</a></li>
                                                        <li><a href="https://drive.google.com/file/d/1QALciyYY8ZFTKgsLyw0B7IliUkb8a3U2/view" target="_blank">Medical Examination</a></li>
                                                    </ul>
                                                </div>
                                                <ul class="submenu mobile_menu">
                                                    <li><a href="<?php echo base_url('download'); ?>">Downloads</a></li>
                                                    <li><a href="https://drive.google.com/file/d/14afbW9ORFXa5ejWQqZg9n_0HpvuNPNC4/view" target="_blank">Articles List</a></li>
                                                    <li><a href="https://drive.google.com/drive/folders/1HyDHyotfyeeiwujCzi_vrLXcuUe8aq4O" target="_blank">Download L.C.</a></li>
                                                    <li><a href="https://drive.google.com/file/d/1X7-TCJOAtmmBQp0GlhFuQQnczXZu_gBv/view?usp=sharing" target="_blank">Physical Fitness</a></li>
                                                    <li><a href="https://drive.google.com/file/d/1QALciyYY8ZFTKgsLyw0B7IliUkb8a3U2/view" target="_blank">Medical Examination</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- <li><a href="#">Outreach</a></li> -->
                                        <li><a href="<?php echo base_url('image-gallery'); ?>">Gallery</a></li>
                                        <li><a href="<?php echo base_url('contact-us'); ?>">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-6 col-2 ham_menu">
                            <div class="tp-header__main-right d-flex justify-content-end align-items-center pl-30">
                                <div class="tp-header__hamburger ml-50 d-lg-none">
                                    <button class="hamburger-btn offcanvas-open-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__close text-end">
                    <button class="offcanvas__close-btn offcanvas-close-btn">
                        <i class="fal fa-times"></i>
                    </button>
                </div>
                <div class="mobile-menu fix mb-20"></div>
                <div class="offcamvas__bottom">
                    <div class="offcanvas__cta mt-30 mb-20">
                        <h3 class="offcanvas__cta-title">Contact info</h3>
                        <span>18 SPD, Near Badopal,</span>
                        <span>Teh : Pilibanga</span>
                        <span>Hanumangarh, Rajasthan</span>
                        <span>335804</span>
                        <span><a href="tel:09210827301" target="_blank">+91 92108 27301</a></span>
                        <span><a href="mailto:info@sainikschoolkalibangan.com" target="_blank">info@sainikschoolkalibangan.com</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

