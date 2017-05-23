<div role="main" class="main">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Pricing </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Pricing </h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p align="justify">Our team at Image Editing 24 are all experienced and qualified while our services and products are all at optimum quality. That however, doesn’t mean that we will charge you out of market. Our rates are very nominal and reasonable and negotiable.<br><br> 
                    We want to give best services to our clients with a competitive price. Different factors are involved like type, size, quality, quantity, complexity, time etc. So we have fixed Prices for different services yet some prices may vary. If you feel free to contact with us. Basic prices of our service are given bellow.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="pricing-table">
                <?php foreach($lists as $list):  ?>
                <div class="col-md-3 col-sm-6 <?php $x = $list->isPopular; if(empty($x)){ echo " "; }else{ echo "center"; } ?>">
                    <div class="plan <?php $x = $list->isPopular; if(empty($x)){ echo " "; }else{ echo "most-popular"; } ?>">
                        <div class="plan-ribbon-wrapper"></div>
                        <h3><?php echo $list->name; ?><span>$<?php echo $list->price; ?></span></h3>
                        <ul>
                            <li><?php echo $list->opt_01; ?></li>
                            <li><?php echo $list->opt_02; ?></li>
                            <li><?php echo $list->opt_03; ?></li>
                            <li><?php echo $list->opt_04; ?></li>
                        </ul>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>