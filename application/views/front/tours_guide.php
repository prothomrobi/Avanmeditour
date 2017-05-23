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
                            <li class="active text-theme-colored"><?php echo $list->title; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Welcome -->
    <section>
        <div class="container pb-0">
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-15 bg-bordered">
                        <h4 class="p-10 bg-info m-0">Destinations</h4>
                        <ul class="subMenuLink p-10">
                            <?php foreach($left_menus as $left_menu):  ?>
                                <li><a href="<?php echo base_url(); ?>tours/guide/<?php $x = strtolower($left_menu->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><?php echo $left_menu->title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol>
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?= base_url() ?>uploads/front/tours_guide/add_country/<?php echo $list->img; ?>" alt="<?php echo $list->title; ?>">
                                <div class="carousel-caption">
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <p align="justify"><?php echo $list->desc; ?></p>
                </div>
                <div class="col-md-3">
                    <div class="mb-15">
                        <h4 class="p-10 bg-info m-0">RECENT NEWS</h4>
                        <div class="events">
                            <img src="<?=base_url()?>assets/front/images/dr.jpg">
                            <small>Date: 12/12/1234</small>
                            <p>This text will scroll from bottom to top <a class="" href="#">...read more</a></p>
                        </div>
                        <div class="events">
                            <img src="<?=base_url()?>assets/front/images/dr.jpg">
                            <small>Date: 12/12/1234</small>
                            <p>This text will scroll from bottom to top <a class="" href="#">...read more</a></p>
                        </div>
                        <div class="events">
                            <img src="<?=base_url()?>assets/front/images/dr.jpg">
                            <small>Date: 12/12/1234</small>
                            <p>This text will scroll from bottom to top <a class="" href="#">...read more</a></p>
                        </div>
                    </div>
                    <div class="mb-15">
                        <h4 class="p-10 bg-info m-0">UPCOMING  EVENTS</h4>
                        <div class="events">
                            <img src="<?=base_url()?>assets/front/images/dr.jpg">
                            <small>Date: 12/12/1234</small>
                            <p>This text will scroll from bottom to top <a class="" href="#">...read more</a></p>
                        </div>
                        <div class="events">
                            <img src="<?=base_url()?>assets/front/images/dr.jpg">
                            <small>Date: 12/12/1234</small>
                            <p>This text will scroll from bottom to top <a class="" href="#">...read more</a></p>
                        </div>

                        <div class="events">
                            <img src="<?=base_url()?>assets/front/images/dr.jpg">
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