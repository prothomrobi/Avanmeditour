<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php if (isset($title['title'])) echo $title['title'] ?> || Admin Panel</title>
        <link href="<?=base_url()?>assets/front/images/favicon.png" rel="shortcut icon" type="image/png">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" href="<?=base_url()?>assets/front/img/favicon.png" >
        <link rel="stylesheet" href="<?=base_url()?>assets/back/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" href="<?=base_url()?>assets/back/extra/font-awesome.min.css" >
        <link rel="stylesheet" href="<?=base_url()?>assets/back/extra/ionicons.min.css" >
        <?php echo $cssincludes ?>
        <link rel="stylesheet" href="<?=base_url()?>assets/back/dist/css/AdminLTE.min.css" >
        <link rel="stylesheet" href="<?=base_url()?>assets/back/dist/css/skins/_all-skins.min.css" >
        <link rel="stylesheet" href="<?=base_url()?>assets/back/css/custom.css" >
        <script src="<?=base_url()?>assets/back/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!--[if lt IE 9]>
        <script src="<?=base_url()?>assets/back/extra/html5shiv.min.js"></script>
        <script src="<?=base_url()?>assets/back/extra/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="sidebar-mini skin-blue fixed">
        <div class="wrapper">
            <!-- header  -->
            <header class="main-header">
                <!-- Logo -->
                <a href="<?=base_url()?>admin_panel" class="logo">
                    <span class="logo-mini"><b>Admin Panel</b></span>
                    <span class="logo-lg"><b>Admin Panel</b></span>
                </a>
                <!-- header navbar -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- user account -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?=base_url()?>uploads/back/profile/<?php echo $this->back_user->info->avatar ?>" class="user-image" alt="<?php echo $this->back_user->info->avatar ?>">
                                    <span class="hidden-xs"><?php echo $this->back_user->info->first_name . ' ' . $this->back_user->info->last_name ?> &nbsp; As &nbsp;
                                        <?php if($this->back_user->info->level == 0){
                                            echo '<span class="label label-primary">Manager</span>';
                                        }elseif($this->back_user->info->level == 1){
                                            echo '<span class="label label-warning">Admin</span>';
                                        }elseif($this->back_user->info->level == 2){
                                            echo '<span class="label label-success">Super Admin</span>';
                                        } ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?=base_url()?>uploads/back/profile/<?php echo $this->back_user->info->avatar ?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $this->back_user->info->first_name . ' ' . $this->back_user->info->last_name ?>
                                            <b><?php echo $this->back_user->info->email ?></b>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?php echo site_url("admin_panel/logout/" . $this->security->get_csrf_hash()); ?>" class="btn btn-default btn-flat">Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column -->
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <!-- home  -->
                        <li class="treeview <?php if (isset($activeLink['home'])) echo "active" ?>">
                            <a href="#" >
                                <i class="fa fa-fw fa-home"></i>
                                <span>Home </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if (isset($activeLink['home']['slider'])) echo "active" ?>" ><a href="<?php echo site_url("admin_panel/slider") ?>" ><i class="fa fa-arrow-right"></i>Slider</a></li>
                                <li class="<?php if (isset($activeLink['home']['add_doctor'])) echo "active" ?>" ><a href="<?php echo site_url("admin_panel/add_doctor") ?>"><i class="fa fa-arrow-right"></i> Add Doctor's</a></li>
                                <li class="<?php if (isset($activeLink['home']['add_hospital'])) echo "active" ?>" ><a href="<?php echo site_url("admin_panel/add_hospital") ?>"><i class="fa fa-arrow-right"></i> Add Hospital</a></li>
                                <li class="<?php if (isset($activeLink['home']['add_hos_country'])) echo "active" ?>" ><a href="<?php echo site_url("admin_panel/add_hos_country") ?>"><i class="fa fa-arrow-right"></i> Add Country of Hospital</a></li>
                                <li class="<?php if (isset($activeLink['home']['offer'])) echo "active" ?>" ><a href="<?php echo site_url("admin_panel/add_offer") ?>"><i class="fa fa-arrow-right"></i> Add Offer</a></li>
                                <li class="<?php if (isset($activeLink['home']['enquery'])) echo "active" ?>" ><a href="<?php echo site_url("admin_panel/") ?>"><i class="fa fa-arrow-right"></i> Enquery -</a></li>
                                <!-- doctor expert -->
                                <li class="<?php if (isset($activeLink['home']['add_expert'])) echo "active" ?>">
                                    <a href="<?php echo site_url("admin_panel/add_expert") ?>" >
                                        <i class="fa fa-arrow-right"></i>
                                        <span>Doctor Expert</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- about us -->
                        <li class="<?php if (isset($activeLink['about_us']['about_us'])) echo "active" ?>">
                            <a href="<?php echo site_url("admin_panel/about_us") ?>" >
                                <i class="fa fa-fw fa-bullhorn"></i>
                                <span>About Us</span>
                            </a>
                        </li>
                        <!-- medical treatments -->
                        <li class="<?php if (isset($activeLink['medical_treatments']['medical_treatments'])) echo "active" ?>">
                            <a href="<?php echo site_url("admin_panel/medical_treatments") ?>" >
                                <i class="fa fa-fw fa-stethoscope"></i>
                                <span>Medical Treatments</span>
                            </a>
                        </li>

                        <!-- patient guide -->
                        <li class="<?php if (isset($activeLink['patient_guide']['patient_guide'])) echo "active" ?>">
                            <a href="<?php echo site_url("admin_panel/patient_guide") ?>" >
                                <i class="fa fa-hospital-o"></i>
                                <span>Ptient Guide</span>
                            </a>
                        </li>
                        <!-- tours guide  -->
                        <li class="treeview <?php if (isset($activeLink['tours'])) echo "active" ?>">
                            <a href="#" >
                                <i class="fa fa-fw fa-map"></i>
                                <span>Tours Guide</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if (isset($activeLink['tours']['tours_service'])) echo "active" ?>" ><a href="<?php echo site_url("admin_panel/add_tours_service") ?>"><i class="fa fa-arrow-right"></i> Tours service</a></li>
                                <li class="<?php if (isset($activeLink['tours']['tours_place'])) echo "active" ?>" ><a href="<?php echo site_url("admin_panel/add_tours_place") ?>"><i class="fa fa-arrow-right"></i> Tours place</a></li>
                                <li class="<?php if (isset($activeLink['tours']['add_country'])) echo "active" ?>" ><a href="<?php echo site_url("admin_panel/add_country") ?>"><i class="fa fa-arrow-right"></i> Add Country</a></li>
                            </ul>
                        </li>
                        <!-- service & package -->
                        <li class="<?php if (isset($activeLink['service_package']['service_package'])) echo "active" ?>">
                            <a href="<?php echo site_url("admin_panel/service_package") ?>" >
                                <i class="fa fa-fw fa-suitcase"></i>
                                <span>Service & Package</span>
                            </a>
                        </li>
                        <!-- article -->
                        <li class="<?php if (isset($activeLink['article']['article'])) echo "active" ?>">
                            <a href="<?php echo site_url("admin_panel/article") ?>" >
                                <i class="fa fa-fw fa-pencil-square-o"></i>
                                <span>Article</span>
                            </a>
                        </li>
                        <!-- blog -->
                        <li class="<?php if (isset($activeLink['blog']['blog'])) echo "active" ?>">
                            <a href="<?php echo site_url("admin_panel/blog") ?>" >
                                <i class="fa fa-fw fa-comments"></i>
                                <span>Blog</span>
                            </a>
                        </li>
                        <!-- news -->
                        <li class="<?php if (isset($activeLink['news']['news'])) echo "active" ?>">
                            <a href="<?php echo site_url("admin_panel/news") ?>" >
                                <i class="fa fa-fw fa-newspaper-o"></i>
                                <span>News</span>
                            </a>
                        </li>
                        <!-- events -->
                        <li class="<?php if (isset($activeLink['events']['events'])) echo "active" ?>">
                            <a href="<?php echo site_url("admin_panel/events") ?>" >
                                <i class="fa fa-fw fa-calendar"></i>
                                <span>Events</span>
                            </a>
                        </li>
                        <!-- subscriber -->
                        <li class="<?php if (isset($activeLink['subs']['subs'])) echo "active" ?>" >
                            <a href="<?php echo site_url("admin_panel/subs") ?>" >
                                <i class="fa fa-fw fa-envelope"></i>
                                <span>Our Subscriber</span>
                            </a>
                        </li>

                    </ul>
                </section>
            </aside>
            <?php echo $content; ?>
        </div>
        <!-- ./wrapper -->
        <script src="<?=base_url()?>assets/back/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?=base_url()?>assets/back/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/back/dist/js/app.min.js"></script>
        <?php echo $jsincludes; ?>
        <script src="<?=base_url()?>assets/back/plugins/ckeditor/ckeditor.js"></script>
        <script src="<?=base_url()?>assets/back/dist/js/demo.js"></script>
        <script>
	   $(function () {
	     CKEDITOR.replace('ck_editor');
             CKEDITOR.replace('ck_editor_2');
	   });
	</script>
    </body>
</html>
