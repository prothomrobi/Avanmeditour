<!-- Start main-content -->
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-deep" data-bg-img="<?=base_url()?>assets/front/images/bg/bg5.jpg">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row"> 
                    <div class="col-md-12 xs-text-center">
                        <ol class="breadcrumb mt-10 white">
                            <li><a href="#">Home</a></li>
                            <li class="active text-theme-colored">All Medical Treatment</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- start main-content -->
    <section>
        <div class="container">
            <div class="row">
                <h1>This page design is temporary and just for content rendering!</h1>
                <?php foreach($lists as $list):  ?>
                <div class="col-md-3">
                  <div class="treatment">                  
                    <img src="<?=base_url()?>uploads/front/medical_treatments/thumb/<?php echo $list->img; ?>">
                    <h5 class="m-0 p-5"><?php echo $list->title; ?></h5>
                     <a href="<?php echo base_url(); ?>medical/treatments/<?php echo $list->url; ?>">read more ...</a> 
                  </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- end main-content -->   
</div>