<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <!-- Meta Tags -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Medinova - Health & Medical HTML Template" />
        <meta name="keywords" content="building,business,construction,cleaning,transport,workshop" />
        <meta name="author" content="ThemeMascot" />
        <!-- Page Title -->
        <title><?php if (isset($title['title'])) echo $title['title'] ?></title>
        <!-- Favicon and Touch Icons -->
        <link href="<?=base_url()?>assets/front/images/favicon.png" rel="shortcut icon" type="image/png">
        <!-- Stylesheet -->
        <link href="<?=base_url()?>assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>assets/front/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>assets/front/css/animate.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>assets/front/css/css-plugin-collections.css" rel="stylesheet"/>
        <!-- CSS | menuzord megamenu skins -->
        <link id="menuzord-menu-skins" href="<?= base_url() ?>assets/front/css/menuzord-s/menuzord-boxed.css" rel="stylesheet"/>
        <!-- CSS | Main style file -->
        <link href="<?=base_url()?>assets/front/css/style-main.css" rel="stylesheet" type="text/css">
        <!-- CSS | Preloader Styles -->
        <link href="<?=base_url()?>assets/front/css/preloader.css" rel="stylesheet" type="text/css">
        <!-- CSS | Custom Margin Padding Collection -->
        <link href="<?=base_url()?>assets/front/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
        <!-- CSS | Responsive media queries -->
        <link href="<?=base_url()?>assets/front/css/responsive.css" rel="stylesheet" type="text/css">
        <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
        <!-- CSS | Theme Color -->
        <link href="<?=base_url()?>assets/front/css/colors/theme-skin-blue.css" rel="stylesheet" type="text/css">
        <style type="text/css">
li.mega-sub-menu {
    width: 24% !important;
    float: left;
    margin-left: .5% !important;
    margin-bottom: .5% !important;
    list-style: none;
    clear: none !important;
    border: 1px solid #0293a6 !important;
}
li.mega-sub-menu:last-child {
    float: right;
    margin-right: 2% !important;
    background: #0293a6;
    color: #fff !important;
    text-align: center;
}
li.mega-sub-menu:last-child a{

    color: #fff !important;
    text-align: center;
}
.treatment h5 {
    font-size: 14px;
}
.treatment {
    text-align: center;
    border: 1px solid #d9edf7;
    border-bottom: 5px solid #d9edf7;
    padding: 5px;
    min-height: 154px;
    margin-bottom: 6px;
}

        </style>
    </head>
    <body class="has-side-panel side-panel-right fullwidth-page side-push-panel p-sm-0 boxed-layout">
        <div class="body-overlay"></div>
        <!-- Header -->
        <header id="header" class="header">
            <div class="header-top bg-theme-colored sm-text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="widget no-border m-0">
                                <ul class="social-icons icon-dark icon-theme-colored icon-sm sm-text-center">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="widget no-border m-0">
                                <ul class="list-inline pull-right flip sm-pull-none sm-text-center">
                                    <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> +880 1817098413</li>
                                    <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> +8801825814327</li>
                                    <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-clock-o text-white"></i> Mon-Fri 8:00 to 2:00 </li><!-- 
                                    <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#">info@avanmed.com</a> </li> -->
                                    <li class="sm-display-block mt-sm-10 mb-sm-10">
                                        <!-- Modal: Appointment Starts -->
                                        <a class="bg-light p-5 text-theme-colored font-11 pl-10 pr-10"data-toggle="modal" href="appointment.html">Make an Appointment</a>
                                        <!-- Modal: Appointment End -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav">
                <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">
                    <div class="container">
                        <div class="row">
                            <div class="">
                                <nav id="menuzord-right" class="menuzord blue bg-lightest">
                                    <a href="<?=base_url()?>"><img class="logo" src="<?=base_url()?>assets/front/images/alogo.png" alt=""></a>
                                    <ul class="menuzord-menu">
                                        <li class="<?php if(isset($activeLink['home'])) echo 'active' ?>" ><a href="<?=base_url()?>">Home</a></li>
                                        <li class="<?php if(isset($activeLink['about_us'])) echo 'active' ?>" ><a href="<?=base_url()?>">About us</a>
                                            <ul class="dropdown">
                                                <?php foreach($this->about_us->about_us as $about_us):  ?>
                                                    <li><a href="<?php echo base_url(); ?>about/us/<?php $x = strtolower($about_us->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><?php echo $about_us->title; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)">Medical Treatments</a>
                                            <div class="megamenu">
                                                <div class="megamenu-row">
                                                    <ul>
                                                        <?php foreach($this->medicals->medicals as $list):  ?>
                                                            <li class="mega-sub-menu"><a href="<?php echo base_url(); ?>medical/treatments/<?php $x = strtolower($list->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><?php echo $list->title; ?></a></li>
                                                        <?php endforeach; ?>
                                                        <li class="mega-sub-menu"><a href="<?php echo base_url(); ?>medical/all_treatments">View All Treatments</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="<?php if(isset($activeLink['patient_guide'])) echo 'active' ?>" ><a href="<?=base_url()?>">Patient Guide</a>
                                            <ul class="dropdown">
                                                <?php foreach($this->patients->patients as $patients):  ?>
                                                    <li><a href="<?php echo base_url(); ?>patient/guide/<?php $x = strtolower($patients->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><?php echo $patients->title; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                        <li class="<?php if(isset($activeLink['tours_guide'])) echo 'active' ?>" ><a href="<?=base_url()?>">Tours Guide</a>
                                            <ul class="dropdown">
                                                <?php foreach($this->tours_guides->tours_guides as $tours_guide):  ?>
                                                    <li><a href="<?php echo base_url(); ?>tours/guide/<?php $x = strtolower($tours_guide->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><?php echo $tours_guide->title; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                        <li class="<?php if(isset($activeLink['service_package'])) echo 'active' ?>" ><a href="<?=base_url()?>">Service & Package</a>
                                            <ul class="dropdown">
                                                <?php foreach($this->service_package->service_package as $service_package): ?>
                                                    <li><a href="<?php echo base_url(); ?>service/package/<?php $x = strtolower($service_package->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><?php echo $service_package->title; ?></a>
                                                        <!-- sub drop menu -->
                                                        <ul class="dropdown">
                                                            <?php foreach($this->service_package_sub->service_package_sub as $service_package_sub): ?>
                                                                <?php if($service_package->id == $service_package_sub->sub_id) : ?>
                                                                    <li><a href="<?php echo base_url(); ?>service/sub/<?php $x = strtolower($service_package_sub->title); $y = str_replace(' ', '_', $x); echo $y; ?>"><?php echo $service_package_sub->title; ?></a></li>   
                                                                <?php endif; ?>           
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                        <li class="<?php if(isset($activeLink['procedures'])) echo 'active' ?>" ><a href="<?php echo site_url('procedures'); ?>">Procedures</a></li>
                                        <li class="<?php if(isset($activeLink['article'])) echo 'active' ?>" ><a href="<?php echo site_url('article/latest'); ?>">Article</a></li>
                                        <li class="<?php if(isset($activeLink['blog'])) echo 'active' ?>" ><a href="<?php echo site_url('blog/latest'); ?>">Blog</a></li>
                                        <li class="<?php if(isset($activeLink['contact_us'])) echo 'active' ?>" ><a href="<?php echo site_url('contact_us'); ?>">Contact us</a></li>
                                     </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php echo $content; ?>
        <!-- Footer -->
        <footer class="footer p-0 bg-solid-color bg-black-111">
            <div class="container">
                <div class="row equal-height pt-30 pb-30">
                    <div class="col-sm-4 col-md-5 border-right-black sm-height-auto">
                        <div class="widget dark pt-10 pb-10 maxwidth400 sm-text-center">
                            <h5 class="widget-title">Service & package</h5>
                            <div class="row">
                                <div class="col-md-5">
                                    <ul>
                                        <li><a href="service_ivf.html">IVF Treatment</a></li>
                                        <li><a href="service_angiography.html">Angiography</a></li>
                                        <li><a href="service_fissure.html">Fissure Surgery</a></li>
                                        <li><a href="service_gastric.html">Gastric Bypass Surgery</a></li>
                                        <li><a href="service_hernia.html">Hernia Surgery</a></li>
                                        <li><a href="service_gastroscopy.html">Gastroscopy Treatment</a></li>
                                        <li><a href="service_piles.html">Piles Surgery</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-7">
                                    <ul>
                                        <li><a href="service_turp.html">Turp Surgery</a></li>
                                        <li><a href="service_sigmoidoscopy.html">Sigmoidoscopy Treatment</a></li>
                                        <li><a href="service_heart.html">Heart Valve Replacement Surgery</a></li>
                                        <li><a href="service_knee.html">Knee Replacement Surgery</a></li>
                                        <li><a href="service_bypass.html">Bypass Surgery</a></li>
                                        <li><a href="service_stapedectomy.html">Stapedectomy</a></li>
                                        <li><a href="service_acl.html">ACL Surgery</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 text-center border-right-black sm-height-auto">
                        <div class="footer-widget pt-70 pl-60 pr-60 pt-sm-10 pl-sm-10 pr-sm-10 maxwidth400 sm-text-center">
                            <div class="footer-logo border-bottom-dot-1px pb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                            <div class="footer-news-letter mt-20">
                                <h4 class="text-white mb-15">Subscribe Our Newsletter</h4>
                                <?php echo form_open(site_url("home/subs"), array("id" => "footer-mailchimp-subscription-form", "class" => "newsletter-form mt-10")) ?>  
                                    <label class="display-block" for="mce-EMAIL"></label>
                                    <div class="input-group">
                                        <input type="email" name="email" placeholder="Your Email" class="form-control" data-height="32px" id="mce-EMAIL">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-colored btn-theme-colored m-0"><i class="fa fa-paper-plane-o text-white"></i></button>
                                        </span>
                                    </div>
                                <?php echo form_close(); ?>
                                <?php $sm = $this->session->flashdata('subs_msg');
                                if (!empty($sm)) { ?>
                                    <!-- notice -->
                                    <h4 class="text-white mb-15">Thanks for subscribe!</h4>
                                <?php } ?>    
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 sm-height-auto">
                        <div class="widget dark text-right sm-text-center pt-120 pb-140 pt-xs-40 pb-xs-0 maxwidth400">
                            <h5 class="widget-title">Quick Contact</h5>
                            <p>+880 1817098413<br>
                                +8801825814327<br>
                                info@avanmed.com</br>
                                H# 32/A, 2nd Floor Road:7, Sector:3, Uttara, Dhaka-1230</p>
                            <ul class="social-icons icon-gray icon-circled icon-sm pull-right sm-pull-none sm-text-center mt-sm-15">
                                <li class="wow fadeInRight" data-wow-delay=".1s"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="wow fadeInRight" data-wow-delay=".2s"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="wow fadeInRight" data-wow-delay=".3s"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="wow fadeInRight" data-wow-delay=".4s"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li class="wow fadeInRight" data-wow-delay=".5s"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-nav bg-black-222 p-20">
                <div class="container pt-20 pb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="font-11 pull-left mb-sm-15 sm-text-center sm-pull-none">Copyright &copy;2016 Avan Medi Tor & Travels. All Rights Reserved</p>
                            <div class="widget m-0">
                                <ul class="font-11 pull-right text-right list-inline sm-text-center sm-pull-none">
                                    <li><a href="about_us.html">About us</a></li>
                                    <li>/</li> 
                                    <li><a href="patient_guide.html">Patient Guide</a></li>
                                    <li>/</li> 
                                    <li><a href="medical_tourism_article.html">Medical Tourism</a></li>
                                    <li>/</li>
                                    <li><a href="procedures.html">Procedures</a></li>
                                    <li>/</li> 
                                    <li><a href="article.html">Article</a></li>
                                    <li>/</li> 
                                    <li><a href="blog.html">Blog</a></li>
                                </ul>              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
    <!-- Footer Scripts -->
    <!-- JS | Custom script for all pages -->
    <!-- external javascripts -->
    <script src="<?=base_url()?>assets/front/js/jquery-2.2.0.min.js"></script>
    <script src="<?=base_url()?>assets/front/js/jquery-ui.min.js"></script>
    <script src="<?=base_url()?>assets/front/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/front/js/angular.min.js"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="<?=base_url()?>assets/front/js/jquery-plugin-collection.js"></script>
    <script src="<?=base_url()?>assets/front/js/custom.js"></script>
</body>
</html>