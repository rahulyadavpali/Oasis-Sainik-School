
    <main>
        <?php include'breadcrumb.php'; ?>

        <!-- about section  start -->
        <section class="tp-about__section pt-120 pb-90">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="tp-section__title-wrapper">
                            <h3 class="tp-section__title mb-15">Downloads</h3>
                            <div class="download_table">
                                <table>
                                    <tbody>
                                        <?php if(!empty($downloads)){$sno = 1;
                                            foreach($downloads as $key => $val){ 
                                        ?>
                                            <tr>
                                                <td><p><?php echo $sno; ?></p></td>
                                                <td><p><?php echo $downloads[$key]['title']; ?></p></td>
                                                <td><a href="<?php echo $downloads[$key]['links']; ?>" target="_blank">Download</a></td>
                                            </tr>
                                        <?php 
                                                    $sno++;
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
