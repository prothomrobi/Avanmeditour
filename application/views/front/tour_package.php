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
                <li class="active text-theme-colored">Tours and Travel</li>
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
              <h4 class="p-10 bg-info m-0">Tour Packages</h4>
              <div class="p-10">
                <ul class="nav parent-menu">
                  <?php foreach($left_menus as $left_menu):  ?>
                      <li><a href="<?php echo base_url(); ?>tour_place/country/<?php $x = strtolower($left_menu->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><?php echo $left_menu->title; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>


            <div class="mb-15 bg-bordered">
              <h4 class="p-10 bg-info m-0">Choose Your Packages</h4>
              <div class="p-10">
                <ul class="nav parent-menu">
                  <?php foreach($places as $place):  ?>
                      <li><a href="<?php echo base_url(); ?>tour_place/package/<?php $x = strtolower($place->url); $y = str_replace(' ', '_', $x); echo $y; ?>"><?php echo $place->title; ?></a></li>
                  <?php endforeach; ?>

                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <div class="col-md-12">
              <h4 class="article-title"><?php echo $list->title;?></h4>
              <div >
                     <span>By</span> Admin<br>
                      <p>On <span style="color:#999999;"><?php echo date("F j, Y",strtotime($list->created));?></span></p>
                      <p><?php echo $list->country;?></p><br>
              </div>
            </div>
            <article >
                <img src="<?=base_url()?>./uploads/front/tours_guide/tours_place/<?php echo $list->img;?>" alt="" class="img-responsive">
                <br>
                <br>
                <div class="row" style="margin-left:5px;">
                        <p>
                          <?php echo $list->desc;?>
                        </p>
                </div>
                <br>
                    <br>
            </article>
          </div>

        </div>
      </div>
    </section>
  <!-- end main-content -->
  </div>
