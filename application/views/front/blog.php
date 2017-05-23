<!-- Start main-content -->
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-deep" data-bg-img="<?=base_url()?>assets/front/images/bg/bg5.jpg">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row"> 
                    <div class="col-md-12 xs-text-center">
                        <ol class="breadcrumb white mt-10">
                            <li><a href="#">Home</a></li>
                            <li class="active text-theme-colored">Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>      
    </section>
    <!-- Section: Blog -->
    <section>
        <div class="container pb-0">
            <div class="row">
                <div class="col-md-9">
                    <div class="row list-dashed">
                        <?php foreach($lists as $list):  ?>
                        <article class="post clearfix mb-50">
                            <div class="col-sm-5">
                                <div class="entry-header">
                                    <div class="post-thumb"> <img class="img-responsive img-fullwidth" src="<?=base_url()?>uploads/front/blog/<?php echo $list->img; ?>" alt=""> </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="entry-content mt-0">
                                    <a href="#">
                                        <h4 class="entry-title mt-0 pt-0"><?php echo $list->title; ?></h4>
                                    </a>
                                    <ul class="list-inline font-12 mb-20 mt-10">
                                        <li>posted by <a href="#" class="text-theme-colored">Admin |</a></li>
                                        <li><span class="text-theme-colored"><?php $date = nice_date($list->created, 'M d, y'); echo $date; ?></span></li>
                                    </ul>
                                    <p class="mb-30">
                                        <?php $a = $list->desc;
                                            if (strlen($a) > 100) {
                                                $stringCut = substr($a, 0, 400);
                                                echo $stringCut . ' <a href="">[...]</a>';
                                            }else{
                                                echo $a;
                                            }
                                        ?>
                                    </p>
                                    <ul class="list-inline like-comment pull-left font-12">
                                        <li><i class="pe-7s-comment"></i>999</li>
                                        <li><i class="pe-7s-like2"></i>999</li>
                                    </ul>
                                    <a class="pull-right text-gray font-13" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
                                </div>
                            </div>
                        </article>
                        <?php endforeach; ?>
                        <?php echo $this->pagination->create_links();  ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-15">
                        <h4 class="p-10 bg-info m-0">RECENT BLOG</h4>
                        <?php foreach($recents as $recent):  ?>
                        <div class="events">
                            <img src="<?=base_url()?>uploads/front/blog/<?php echo $recent->img; ?>">
                            <small><?php $date = nice_date($recent->created, 'd/m/Y'); echo $date; ?></small>
                            <p>
                                <?php $a = $recent->desc;
                                    if (strlen($a) > 100) {
                                        $stringCut = substr($a, 0, 40);
                                        echo $stringCut . ' <a class="" href="#">...read more</a>';
                                    }else{
                                        echo $a;
                                    }
                                ?>
                            </p>
                        </div>
                        <?php endforeach; ?>
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
    </section>
</div>