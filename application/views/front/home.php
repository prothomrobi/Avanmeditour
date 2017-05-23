<!-- Start main-content -->
<div class="main-content">
    <!-- Section: slider -->
    <section id="home" class="divider">
        <div class="container-fluid p-0">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php $x = 0; foreach($sliders as $slider): $x++; ?>
                    <div class="item <?php if($x == 1){echo " active";} ?>">
                        <img src="<?=base_url()?>uploads/front/slider/<?php echo $slider->img; ?>" alt="<?php echo $slider->img; ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="welcome-title">
            <div class="container">
                <div class="wt"><img src="<?=base_url()?>assets/front/images\slogan\a.jpg" alt=""><h4 class="p-10 bg-1 sdw m-0">A-AFFORDABLE</h4></div>
                <div class="wt"><img src="<?=base_url()?>assets/front/images\slogan\v.png" alt=""><h4 class="p-10 bg-1 sdw m-0">V-VALUES</h4></div>
                <div class="wt"><img src="<?=base_url()?>assets/front/images\slogan\ad.png" alt=""><h4 class="p-10 bg-1 sdw m-0">A-ADVANCED</h4></div>
                <div class="wt"><img src="<?=base_url()?>assets/front/images\slogan\n.jpg" alt=""><h4 class="p-10 bg-1 sdw m-0">N-NURTURE</h4></div>
            </div>
        </div>
    </section>
    <!-- Section: /slider -->
    <!-- Section: Welcome -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="">
                        <div class="mb-15 p-15 pb-20 bg-1" >
                            <h4 class="pb-10 m-0">Our International Hospital & Partners</h4>
                            <table cellpadding="10" cellspacing="10">
                                <tr>
                                    <td colspan="3"><h5 class="new-h"><a href="<?php echo base_url(); ?>hospital/country/india">India <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></h5></td>
                                </tr>
                                <tr>
                                    <td><abbr title="Apollo Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member1.jpg" align="middle"></a></abbr></td>
                                    <td><abbr title="Max Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member2.jpg" align="middle"></a></abbr></td>
                                    <td><abbr title="Fortis Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member3.jpg" align="middle"></a></abbr></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><h5 class="new-h"><a href="<?php echo base_url(); ?>hospital/country/malaysia">Malaysia <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></h5></td>
                                </tr>
                                <tr>
                                    <td><abbr title="Medanta Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member4.jpg" align="middle"></a></abbr></td>
                                    <td><abbr title="Artemis Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member5.jpg"></a></abbr></td>
                                    <td><abbr title="Columbia Asia Hospitals"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member6.jpg" align="middle"></a></abbr></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><h5 class="new-h"><a href="<?php echo base_url(); ?>hospital/country/thailand">Thailand <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></h5></td>
                                </tr>
                                <tr>
                                    <td><abbr title="BLK Super Speciality Hospital"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member7.jpg" align="middle"></a></abbr></td>
                                    <td><abbr title="Kokilaben Dhirubhai Ambani Hospital"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member8.jpg" align="middle"></a></abbr></td>
                                    <td><abbr title="Nova Specialty Hospitals "><a href=""><img src="<?=base_url()?>assets/front/images/clients/member9.jpg" align="middle"></a></abbr></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><h5 class="new-h"><a href="<?php echo base_url(); ?>hospital/country/singapore">Singapore <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></h5></td>
                                </tr>
                                <tr>
                                    <td><abbr title="Spine & Brain India"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member10.jpg" align="middle"></a></abbr></td>
                                    <td><abbr title="Vasan Eye Care"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member11.jpg"></a></abbr></td>
                                    <td><abbr title="NIRVANA"><a href=""><img src="<?=base_url()?>assets/front/images/clients/member12.jpg" align="middle"></a></abbr></td>
                                </tr>
                            </table>
                        </div>
                        <div class="mb-15 p-15 pb-20 bg-1 dhp">
                            <h4 class="pb-15 m-0">Our Domestic Hospital & Partners</h4>
                            <table cellpadding="10" cellspacing="10">
                                <?php
                                    $first_dom_hosps = array_slice($domes_hosps, 0, 3);
                                    $second_dom_hosps  = array_slice($domes_hosps, 3, 3);
                                    $third_dom_hosps  = array_slice($domes_hosps, 6, 3);
                                    $fourth_dom_hosps  = array_slice($domes_hosps, 9, 3);
                                ?>
                                <tr>
                                   <?php foreach($first_dom_hosps as $first_dom_hosp):  ?>
                                    <td><abbr title="<?php echo $first_dom_hosp->title; ?>"><a href=""><img src="<?=base_url()?>uploads/front/hospital/<?php echo $first_dom_hosp->img; ?>" align="middle"></a></abbr></td>
                                   <?php endforeach; ?>
                                </tr>
                                <tr>
                                   <?php foreach($second_dom_hosps as $second_dom_hosp):  ?>
                                    <td><abbr title="<?php echo $second_dom_hosp->title; ?>"><a href=""><img src="<?=base_url()?>uploads/front/hospital/<?php echo $second_dom_hosp->img; ?>" align="middle"></a></abbr></td>
                                   <?php endforeach; ?>
                                </tr>
                                <tr>
                                   <?php foreach($third_dom_hosps as $third_dom_hosp):  ?>
                                    <td><abbr title="<?php echo $third_dom_hosp->title; ?>"><a href=""><img src="<?=base_url()?>uploads/front/hospital/<?php echo $third_dom_hosp->img; ?>" align="middle"></a></abbr></td>
                                   <?php endforeach; ?>
                                </tr>
                                <tr>
                                   <?php foreach($fourth_dom_hosps as $fourth_dom_hosp):  ?>
                                    <td><abbr title="<?php echo $fourth_dom_hosp->title; ?>"><a href=""><img src="<?=base_url()?>uploads/front/hospital/<?php echo $fourth_dom_hosp->img; ?>" align="middle"></a></abbr></td>
                                   <?php endforeach; ?>
                                </tr>
                            </table>
                            <P align=right><a href="<?php echo base_url(); ?>hospital/country/bangladesh">View more partners...</a></P>
                        </div>
                        <div class="mb-15">
                            <h4 class="p-10 bg-info m-0">RECENT NEWS & EVENT</h4>
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
                        <div class="mb-15 bg-bordered bg-info">
                            <h4 class="p-10 m-0 bg-info" >Happy Patient</h4>
                            <div class="p-10">
                                <iframe width="100%" height="80px"  src="https://www.youtube.com/embed/OS_VmRiHVoA" frameborder="0" allowfullscreen></iframe>
                                <br>
                                <!--<a class="btn btn-colored btn-theme-colored m-0" href="">View more</a>-->
                            </div>
                        </div>
                        <div class="mb-15">
                            <h4 class="p-10 bg-info m-0">HEALTHCARE </h4>
                            <div class="events">
                                <img src="<?=base_url()?>assets/front/images/dr.jpg">
                                <p>This text will scroll from bottom to top <a class="" href="#">...read more</a><br><br></p>
                            </div>
                            <div class="events">
                                <img src="<?=base_url()?>assets/front/images/dr.jpg">
                                <p>This text will scroll from bottom to top <a class="" href="#">...read more</a><br><br></p>
                            </div>
                        </div>
                        <div class="mb-15 bg-bordered bg-info">
                            <h4 class="p-10 m-0 bg-info" >internationlat tours</h4>
                            <div class="p-10">
                                <iframe width="100%" height="80px"  src="https://www.youtube.com/embed/aSOjWAitlrg" frameborder="0" allowfullscreen></iframe>
                                <br>
                                <!--<a class="btn btn-colored btn-theme-colored m-0" href="">View more</a>-->
                            </div>
                        </div>
                        <div class="mb-15 bg-bordered">
                            <h4 class="p-10 m-0 bg-info" >Keep in Touch</h4>
                            <table>
                                <tr>
                                    <td><a href=""><img src="<?=base_url()?>assets/front/images/social/fb.jpg"></a></td>
                                    <td><img src="<?=base_url()?>assets/front/images/social/tw.jpg"></a></td>
                                    <td><img src="<?=base_url()?>assets/front/images/social/rs.jpg"></a></td>
                                    <td><img src="<?=base_url()?>assets/front/images/social/yt.jpg"></a></td>
                                    <td><img src="<?=base_url()?>assets/front/images/social/in.jpg"></a></td>
                                </tr>
                                <tr>
                                    <td><img src="<?=base_url()?>assets/front/images/social/p.jpg"></a></td>
                                    <td><img src="<?=base_url()?>assets/front/images/social/w.jpg"></a></td>
                                    <td><img src="<?=base_url()?>assets/front/images/social/gp.jpg"></a></td>
                                    <td><img src="<?=base_url()?>assets/front/images/social/t.jpg"></a></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="wt-d bg-bordered mb-15">
                        <h4 class="p-10 m-0 bg-info">Welcome to Avan Medi Tour</h4>
                        <p class="p-10" align="justify">AVAN MediTour is an early stage start up in the process of developing a full service "medical tourism" agency that will be focused on helping Bangladeshi patients receive Medical Procedures and Packages,  cosmetic and non-elective surgery  in foreign countries through relationships with world class medical facilities in India, Malaysia, Singapore, the Philippines, china, Indonesia and Thailand . AVAN MediTour's founder recognized market factors that indicate a strong opportunity to provide premium service to upscale VIP patients from the Bangladesh.</p>
                    </div>
                    <div class="wt-d bg-bordered mb-15">
                        <h4 class="p-10 m-0 bg-info">What we do</h4>
                        <div class="p-10">
                            <img width="100%" src="<?=base_url()?>assets/front/images/wwd.jpg">
                            <ul>
                                <li>Access to internationally reputed & accredited hospitals in abroad</li>
                                <li>Assist you find right doctors with opinions on medical conditions</li>
                                <li>Facilitating conversation with doctors before arrival</li>
                                <li>Appointment scheduling services</li>
                                <li>Reduce waiting time</li>
                                <li>Medical Visa assistance</li>
                                <li>Affordable tailor-made cost-effective packages</li>
                                <li>Transportation – Pick-Up & Drop services at airports</li>
                                <li>Arrange Boarding & Lodging facilities from 7 star, 5 star & economy class</li>
                                <li>Hotel Check-In assistance services</li>
                                <li>Personalized patient care by professional staff</li>
                                <li>Admission formalities at hospitals</li>
                                <li>Interpreter for clients when required</li>
                                <li>Customized food & accommodation on request</li>
                                <li>Keeping family & friends posted on treatment</li>
                                <li>Facilitating travel within India to preferred destinations</li>
                                <li>Benefits offered with</li>
                            </ul>
                        </div>
                    </div>
                    <div class="wt-d mb-15">
                        <h4 class="m-0 p-10 text-center">Most popular treatment</h4>
                        <?php
                            $first_treats = array_slice($treats, 0, 4);
                            $second_treats  = array_slice($treats, 4, 4);
                            $third_treats  = array_slice($treats, 8, 4);
                            $fourth_treats  = array_slice($treats, 12, 4);
                        ?>

                        <div class="row">
                            <?php foreach($first_treats as $first_treat):  ?>
                            <div class="col-md-3">
                                <div class="treatment">
                                    <img src="<?=base_url()?>uploads/front/medical_treatments/<?php echo $first_treat->img; ?>">
                                    <a href="<?php echo base_url(); ?>medical/treatments/<?php $x = strtolower($first_treat->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><h5 class="m-0 p-5"><?php echo $first_treat->title; ?></h5></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="row">
                            <?php foreach($second_treats as $second_treat):  ?>
                            <div class="col-md-3">
                                <div class="treatment">
                                    <img src="<?=base_url()?>uploads/front/medical_treatments/thumb/<?php echo $second_treat->img; ?>">
                                    <a href="<?php echo base_url(); ?>medical/treatments/<?php $x = strtolower($second_treat->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><h5 class="m-0 p-5"><?php echo $second_treat->title; ?></h5></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="row">
                            <?php foreach($third_treats as $third_treat):  ?>
                            <div class="col-md-3">
                                <div class="treatment">
                                    <img src="<?=base_url()?>uploads/front/medical_treatments/thumb/<?php echo $third_treat->img; ?>">
                                    <a href="<?php echo base_url(); ?>medical/treatments/<?php $x = strtolower($third_treat->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><h5 class="m-0 p-5"><?php echo $third_treat->title; ?></h5></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <a class="btn btn-colored btn-theme-colored m-0" href="<?php echo base_url(); ?>medical/all_treatments">View more</a>
                    </div>
                    <div class="wt-d bg-bordered mb-20">
                        <h4 class="p-10 m-0 bg-info">TOUR PLACE</h4>
                        <div class="p-10">
                            <div id="carousel-tour-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-tour-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-tour-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-tour-generic" data-slide-to="2"></li>
                                    <li data-target="#carousel-tour-generic" data-slide-to="3"></li>
                                    <li data-target="#carousel-tour-generic" data-slide-to="4"></li>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="<?=base_url()?>assets/front/images/bg/ifel.jpg" alt="...">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="<?=base_url()?>assets/front/images/ToursGuide/australia2.jpg" alt="...">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="<?=base_url()?>assets/front/images/ToursGuide/australia3.jpg" alt="...">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="<?=base_url()?>assets/front/images/ToursGuide/australia1.jpg" alt="...">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="<?=base_url()?>assets/front/images/ToursGuide/australia4.jpg" alt="...">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="<?=base_url()?>assets/front/images/ToursGuide/australia5.jpg" alt="...">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-tour-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-tour-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- <h4 class="m-0 p-10 text-center">INTERRNATIONAL TOP HEALTH CARE PLACE</h4>
                            <p align="justify">AVAN MediTour is an early stage start up in the process of developing a full service "medical tourism" agency that will be focused on helping Bangladeshi patients receive Medical Procedures and Packages, cosmetic and non-elective surgery in foreign countries through relationships with world class medical facilities in India, Malaysia, Singapore, the Philippines, china, Indonesia and Thailand.</p> -->
                            <br>
                            <p><a class="btn btn-colored btn-theme-colored m-0" href="<?php echo base_url(); ?>tour_place/country/bangladesh">VIEW MORE TOUR PLACE</a></p>
                        </div>
                    </div>

                    <div class="wt-d bg-bordered mb-20">
                        <h4 class="p-10 m-0 bg-info">PROMOTIONAL TOUR OFFERS</h4>
                        <div class="p-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?=base_url()?>uploads/front/offer/<?php echo $offer->img; ?>" alt="<?php echo $offer->title; ?>">
                                </div>
                                <div class="col-md-9">
                                    <h4 class="m-0 p-10"><?php echo $offer->title; ?></h4>
                                    <p align="justify">
                                        <?php
                                            $a = $offer->desc;
                                            if (strlen($a) > 100) {
                                                $stringCut = substr($a, 0, 100);
                                                echo $stringCut . '...';
                                            }else{
                                                echo $a;
                                            }
                                        ?>
                                    </p>
                                    <a class="btn btn-colored btn-theme-colored m-0" href="">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="">
                      <?php
                          $first_domes_docs = array_slice($domes_docs, 0, 2);
                          $second_domes_docs  = array_slice($domes_docs, 2, 2);
                          $third_domes_docs  = array_slice($domes_docs, 4, 2);
                      ?>
                        <div class="mb-15 p-15 bg-1">
                            <h4 class="p-0 m-0" >OUR INTERNATIONAL BEST DR’S</h4>

                            <table width="100%" align="center">
                              <tr>
                                  <?php foreach($first_domes_docs as $first_domes_doc):  ?>
                                  <td><img  src="<?=base_url()?>uploads/front/expert/add_expert/thumb/<?php echo $first_domes_doc->img; ?>"  class="intr_doc"><a href="<?php echo base_url()?>doctor/international_expert/<?php echo $first_domes_doc->url; ?>"><p><?php echo $first_domes_doc->title; ?></p></a></td>
                                  <?php endforeach; ?>
                              </tr>
                              <tr>
                                  <?php foreach($second_domes_docs as $second_domes_doc):  ?>
                                  <td><img src="<?=base_url()?>uploads/front/expert/add_expert/thumb/<?php echo $second_domes_doc->img; ?>" class="intr_doc"><a href="<?php echo base_url()?>doctor/international_expert/<?php echo $second_domes_doc->url; ?>"><p><?php echo $second_domes_doc->title; ?></a></p></td>
                                  <?php endforeach; ?>
                              </tr>
                              <tr>
                                  <?php foreach($third_domes_docs as $third_domes_doc):  ?>
                                  <td><img src="<?=base_url()?>uploads/front/expert/add_expert/thumb/<?php echo $third_domes_doc->img; ?>"class="intr_doc"><a href="<?php echo base_url()?>doctor/expert/<?php echo $third_domes_doc->url; ?>"><p><?php echo $third_domes_doc->title; ?></p></a></td>
                                  <?php endforeach; ?>
                              </tr>
                            </table>

                            <a style="margin-left:40px;" href="<?php echo base_url()?>doctor/expert/<?php echo $first_domes_docs[0]->url; ?>">View More Doctor's...</a>

                        </div>
                        <div class="mb-15 p-15 bg-1">
                            <h4 class="p-0 m-0" >OUR DOMESTIC DR’S</h4>
                            <table width="100%" align="center">

                                <tr>
                                    <?php foreach($first_domes_docs as $first_domes_doc):  ?>
                                    <td><img src="<?=base_url()?>uploads/front/expert/add_expert/thumb/<?php echo $first_domes_doc->img; ?>"  class="dom_doc"><a href="<?php echo base_url()?>doctor/domestic_expert/<?php echo $first_domes_doc->url; ?>"><p><?php echo $first_domes_doc->title; ?></p></a></td>
                                    <?php endforeach; ?>
                                </tr>
                                <tr>
                                    <?php foreach($second_domes_docs as $second_domes_doc):  ?>
                                    <td><img src="<?=base_url()?>uploads/front/expert/add_expert/thumb/<?php echo $second_domes_doc->img; ?>" class="dom_doc"><a href="<?php echo base_url()?>doctor/domestic_expert/<?php echo $second_domes_doc->url; ?>"><p><?php echo $second_domes_doc->title; ?></a></p></td>
                                    <?php endforeach; ?>
                                </tr>
                                <tr>
                                    <?php foreach($third_domes_docs as $third_domes_doc):  ?>
                                    <td><img src="<?=base_url()?>uploads/front/expert/add_expert/thumb/<?php echo $third_domes_doc->img; ?>" class="dom_doc"><a href="<?php echo base_url()?>doctor/domestic_expert/<?php echo $third_domes_doc->url; ?>"><p><?php echo $third_domes_doc->title; ?></p></a></td>
                                    <?php endforeach; ?>
                                </tr>
                            </table>
                            <a style="margin-left:40px;" href="<?php echo base_url()?>doctor/domestic_expert/<?php echo $first_domes_docs[0]->url; ?>">View More Doctors...</a>
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

                        </div>

                        <div class="mb-15 bg-bordered bg-info">

                            <h4 class="p-10 m-0 bg-info" >Advanced Technology</h4>
                            <div class="p-10">
                                <iframe width="100%" height="80px"  src="https://www.youtube.com/embed/O5U4Lq8-9b0" frameborder="0" allowfullscreen></iframe>
                                <br>
                                <!--<a class="btn btn-colored btn-theme-colored m-0" href="">View more</a>-->
                            </div>
                        </div>
                        <div class="enquer-box p-15 mb-15 bg-info">
                            <h4 class="text-title pb-10 m-0" >ENQUERY </h4>
                            <?php echo form_open(site_url("home/query")); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="phone" class="form-control" name="phn" id="exampleInputPhone1" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="msg" placeholder="Query" rows="2"></textarea>
                                </div>
                                <button type="submit" class="btn btn-colored btn-theme-colored m-0">Submit</button>
                            <?php echo form_close(); ?>
                        </div>

                        <div class="mb-15 bg-bordered bg-info">

                            <h4 class="p-10 m-0 bg-info" >bangladesh tour</h4>
                            <div class="p-10">
                                <iframe width="100%" height="80px"  src="https://www.youtube.com/embed/xqh6gO30v1c" frameborder="0" allowfullscreen></iframe>
                                <br>
                                <!--<a class="btn btn-colored btn-theme-colored m-0" href="">View more</a>-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: /Welcome -->
</div>
