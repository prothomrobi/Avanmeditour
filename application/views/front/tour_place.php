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

            <?php foreach($lists as $list):  ?>
            <article class="post">
                <img style="width:845px;" src="<?=base_url()?>./uploads/front/tours_guide/tours_place/<?php echo $list->img;?>" alt="" class="img-responsive">
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="post-info" style="color:black;">
                               <span>By</span> <br>
                                <p>On <?php echo date("F j, Y",strtotime($list->created));?></p><br>
                                <p><?php echo $list->country;?></p><br>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <h4 class="article-title"><a href="<?php echo base_url(); ?>tour_place/package/<?php $x = strtolower($list->url); $y = str_replace(' ', '_', $x); echo $y; ?>"><?php echo $list->title;?></a></h4>
                        <p>
                          <?php $a = $list->desc;
                              if (strlen($a) > 100) {
                                  $stringCut = substr($a, 0, 400);
                                  echo $stringCut ?>&nbsp;<a href="<?php echo base_url(); ?>tour_place/package/<?php $x = strtolower($list->url); $y = str_replace(' ', '_', $x); echo $y; ?>" class="read_more">READ MORE →</a>
                              <?php }else{
                                  echo $a;
                              }
                          ?>
                        </p>
                    </div>
                </div>
                <br>
                    <br>
            </article>
            <?php endforeach; ?>

          <?php echo $this->pagination->create_links();  ?>
          </div>

        </div>
      </div>
    </section>
  <!-- end main-content -->
  </div>
