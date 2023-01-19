
    <script type="text/javascript">
        $().ready(function(){
            $("#contactForm").validate({
                rules:{
                    name: {required: true}, mobile: {required: true, minlength: 10}, message: {required: true},
                },
                messages: {
                    name: {required: "Please enter full name."}, mobile: {required: "Please enter your 10-digit mobile number."}, message: {required: "Please enter a message for us."}
                }
            });
        });
    </script>

    <main>
        <?php include'breadcrumb.php'; ?>

        <!-- Contact Message Start -->
        <?php if($this->session->flashdata('contactMessage')){ ?>
            <div id="courseModel" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p style="text-align: center;margin-top: 10px;">
                                <strong>
                                    <?php echo $this->session->flashdata('contactMessage'); ?>
                                </strong>
                            </p>
                            <div class="modal-footer">
                                <button type="button" id="corBtn" name="corBtn" class="btn btn-default cor_btn" data-dismiss="modal" onclick="<?php unset($_SESSION['contactMessage']);?>">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Contact Section -->
        <section class="contact__area pt-115 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-7 col-xl-7 col-lg-6">
                        <div class="contact__wrapper">
                            <div class="section__title-wrapper mb-40">
                                <h2 class="section__title">Get in<span class="yellow-bg yellow-bg-big">touch</span></h2>
                                <p>Have a question or just want to say hi? We'd love to hear from you.</p>
                            </div>
                            <div class="contact__form mb-30">
                                <form id="contactForm" action="<?php echo base_url('Contact/mailSave'); ?>" method="POST">
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <input type="text" placeholder="Your Name" name="name" id="name" />
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <input type="number" placeholder="Your Mobile No." name="mobile" id="mobile" onkeypress="if(this.value.length==10)return false;" />
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <input type="email" placeholder="Your Email" name="email" id="email" />
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <input type="text" placeholder="Subject" name="subject" id="subject" />
                                            </div>
                                        </div>
                                        <div class="col-xxl-12">
                                            <div class="contact__form-input">
                                                <textarea placeholder="Enter Your Message" name="message" id="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12">
                                            <div class="contact__btn">
                                                <button type="submit" id="submitContact" name="submitContact" class="tp-btn" value="1"><span>Send your message</span> </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="contact-response">
                                <p class="ajax-response"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 offset-xxl-1 col-xl-4 offset-xl-1 col-lg-5 offset-lg-1">
                        <div class="contact__info white-bg p-relative z-index-1">
                            <div class="contact__info-inner white-bg">
                                <ul>
                                    <li>
                                        <div class="contact__info-item d-flex align-items-start mb-35">
                                            <div class="contact__info-icon mr-15">
                                                <svg class="map" viewBox="0 0 24 24">
                                                    <path class="st0" d="M21,10c0,7-9,13-9,13s-9-6-9-13c0-5,4-9,9-9S21,5,21,10z"/>
                                                    <circle class="st0" cx="12" cy="10" r="3"/>
                                                </svg>
                                            </div>
                                            <div class="contact__info-text">
                                                <h4>Address :</h4>
                                                <p><a target="_blank" href="https://www.google.com/maps?ll=29.341903,74.146394&z=14&t=m&hl=en&gl=IN&mapclient=embed&cid=9597125873832964724">Oasis Sainik School,<br/> 18 SPD, Near Badopal,<br/> Teh: Pilibanga, Hanumangarh<br/>Rajasthan (335804)</a></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact__info-item d-flex align-items-start mb-35">
                                            <div class="contact__info-icon mr-15">
                                                <svg class="mail" viewBox="0 0 24 24">
                                                    <path class="st0" d="M4,4h16c1.1,0,2,0.9,2,2v12c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6C2,4.9,2.9,4,4,4z"/>
                                                    <polyline class="st0" points="22,6 12,13 2,6 "/>
                                                </svg>
                                            </div>
                                            <div class="contact__info-text">
                                                <h4>Email Us :</h4>
                                                <p><a href="mailto:info@sainikschoolkalibangan.com" target="_blank">info@sainikschoolkalibangan.com</a></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact__info-item d-flex align-items-start mb-35">
                                            <div class="contact__info-icon mr-15">
                                                <svg class="call" viewBox="0 0 24 24">
                                                    <path class="st0" d="M22,16.9v3c0,1.1-0.9,2-2,2c-0.1,0-0.1,0-0.2,0c-3.1-0.3-6-1.4-8.6-3.1c-2.4-1.5-4.5-3.6-6-6  c-1.7-2.6-2.7-5.6-3.1-8.7C2,3.1,2.8,2.1,3.9,2C4,2,4.1,2,4.1,2h3c1,0,1.9,0.7,2,1.7c0.1,1,0.4,1.9,0.7,2.8c0.3,0.7,0.1,1.6-0.4,2.1  L8.1,9.9c1.4,2.5,3.5,4.6,6,6l1.3-1.3c0.6-0.5,1.4-0.7,2.1-0.4c0.9,0.3,1.8,0.6,2.8,0.7C21.3,15,22,15.9,22,16.9z"/>
                                                </svg>
                                            </div>
                                            <div class="contact__info-text">
                                                <h4>Call Us :</h4>
                                                <p><a href="tel:9210827301">+(91) 92108 27301</a></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="contact__social pl-30">
                                    <h4>Follow Us :</h4>
                                    <ul>
                                        <li><a href="#" class="fb" ><i class="social_facebook"></i></a></li>
                                        <li><a href="#" class="tw" ><i class="social_twitter"></i></a></li>
                                        <li><a href="#" class="pin" ><i class="social_pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Google Maps -->
        <section class="tp-contact-map">
            <div class="container-fluid p-0">
                <div class="tp-map-height">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13911.974764418806!2d74.14601056977841!3d29.341180662643954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39167c8b272d1d5d%3A0x852fd7226e863274!2sOasis+Sainik+School!5e0!3m2!1sen!2sin!4v1555580200596!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>
