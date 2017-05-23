<!-- Start main-content -->
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-deep" data-bg-img="<?= base_url() ?>assets/front/images/bg/bg5.jpg">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row"> 
                    <div class="col-md-12 xs-text-center">
                        <ol class="breadcrumb mt-10 white">
                            <li><a href="#">Home</a></li>
                            <li class="active text-theme-colored">Service & Packages</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<section>
        <div class="container pb-0">
            <div class="row">
                <div class="col-md-9">
                    <h3 align="center"><?php echo $list->title; ?></h3>
                    <img width="100%" src="<?= base_url() ?>uploads/front/service_package/sub/<?php echo $list->img; ?>">
                    <div class="title">
                        <p align="justify"><?php echo $list->desc; ?></p>
                    </div>
                </div>
                <!-- right column  -->
                <div class="col-md-3">
                    <div class="mb-15">
                        <h4 class="p-10 bg-info m-0">RECENT NEWS</h4>
                        <div class="events">
                            <img src="<?= base_url() ?>assets/front/images/dr.jpg">
                            <small>Date: 12/12/1234</small>
                            <p>This text will scroll from bottom to top <a class="" href="#">...read more</a></p>
                        </div>
                        <div class="events">
                            <img src="<?= base_url() ?>assets/front/images/dr.jpg">
                            <small>Date: 12/12/1234</small>
                            <p>This text will scroll from bottom to top <a class="" href="#">...read more</a></p>
                        </div>
                        <div class="events">
                            <img src="<?= base_url() ?>assets/front/images/dr.jpg">
                            <small>Date: 12/12/1234</small>
                            <p>This text will scroll from bottom to top <a class="" href="#">...read more</a></p>
                        </div>
                    </div>
                    <div class="mb-15">
                        <h4 class="p-10 bg-info m-0">UPCOMING  EVENTS</h4>
                        <div class="events">
                            <img src="<?= base_url() ?>assets/front/images/dr.jpg">
                            <small>Date: 12/12/1234</small>
                            <p>This text will scroll from bottom to top <a class="" href="#">...read more</a></p>
                        </div>
                        <div class="events">
                            <img src="<?= base_url() ?>assets/front/images/dr.jpg">
                            <small>Date: 12/12/1234</small>
                            <p>This text will scroll from bottom to top <a class="" href="#">...read more</a></p>
                        </div>
                        <div class="events">
                            <img src="<?= base_url() ?>assets/front/images/dr.jpg">
                            <small>Date: 12/12/1234</small>
                            <p>This text will scroll from bottom to top <a class="" href="#">...read more</a></p>
                        </div>
                    </div>
                    <div class="mb-15 bg-bordered">
                        <h4 class="p-10 bg-info m-0">Company Adds</h4>
                        <p align="justify" class="p-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                    </div>
                    <div class="mb-15 bg-bordered">
                        <h4 class="p-10 bg-info m-0">Quick Links</h4>
                        <div class="p-10">
                            <ul>
                                <li><a href="#">Physician Directory</a></li>
                                <li><a href="#">Web Nursery</a></li>
                                <li><a href="#">Vendor Zone</a></li>
                                <li><a href="#">Partner With Us</a></li>
                                <li><a href="#">Download Lab Reports (Beta)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end main-content -->
</div>