<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php if (isset($title['title'])) echo $title['title'] ?> || Admin panel</title>
        <link href="<?=base_url()?>assets/front/images/favicon.png" rel="shortcut icon" type="image/png">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?=base_url()?>assets/back/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/back/extra/font-awesome.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/back/extra/ionicons.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/back/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/back/plugins/iCheck/square/blue.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/back/css/custom.css">
        <!--[if lt IE 9]>
        <script src="<?=base_url()?>assets/back/extra/html5shiv.min.js"></script>
        <script src="<?=base_url()?>assets/back/extra/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page" style="background-image:url('assets/front/img/slides/slide-bg-full-1-dark.jpg'); background-size: cover;">
        <?php $gl = $this->session->flashdata('globalmsg'); ?>
        <?php if(!empty($gl)) :?>
            <!-- global message -->
            <div class="container projects-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success"><b><span class="glyphicon glyphicon-ok"></span></b> <?php echo $this->session->flashdata('globalmsg') ?></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php echo $content; ?>
        <script src="<?=base_url()?>assets/back/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?=base_url()?>assets/back/bootstrap/js/bootstrap.min.js"></script> 
        <script src="<?=base_url()?>assets/back/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%'
                });
            });
        </script>
    </body>
</html>