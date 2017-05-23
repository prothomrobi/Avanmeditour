<div role="main" class="main">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active"><?php echo $list->title; ?></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $list->title; ?></h1>
                </div>
            </div>
        </div>
    </section>
    <!--100% Satisfaction Start-->
    <section class="section section-sliderClippingPath" style=" height: 400px; background-position: left;background-repeat: no-repeat;background-size: cover;background-image: url(<?php echo base_url(); ?>uploads/front/service/<?php echo $list->big_img; ?>)">
        <section class="section-default">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                       <!--  <img class="img-responsive" src="<?php echo base_url(); ?>uploads/front/service/<?php echo $list->big_img; ?>" alt="<?php echo $list->big_img; ?>"> -->
                    </div>
                    <div class="col-md-5">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <h2 align="right"><strong><?php echo $list->title; ?></strong></h2>
                        
                        <p align="right">
                            <a href="<?=base_url();?>gallery" class="btn btn-borders btn-primary btn-lg" >See Our Works</a>
                            <a href="<?=base_url();?>free_trail" class="btn btn-lg btn-primary">Free Trial</a> </p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                    </div>
                </div>
            </div>
        </section>

    </section>
    <section class="section section-default">
        <div class="container">
            <div class="row">
            <br>
                <div class="col-md-6">
                    <img class="img-responsive" src="<?php echo base_url(); ?>uploads/front/service/<?php echo $list->small_img; ?>" alt="<?php echo $list->small_img; ?>">
                </div>
                <div class="col-md-6">
                    <p align="justify"><?php echo $list->desc; ?></p>
                </div>
            </div>
        </div>
    </section>
    <!--100% Satisfaction End-->
</div>
