<div role="main" class="main">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Our Works </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Our Works </h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills sort-source" data-sort-id="portfolio" data-option-key="filter">
                    <li data-option-value="*" class="active"><a href="#">Show All</a></li>
                    <?php foreach($cats as $cat):  ?>
                    <li data-option-value=".<?php $x = strtolower($cat->name); $y = str_replace(' ', '_', $x); echo $y; ?>"><a href="#"><?php echo $cat->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <hr>
                <div class="row">
                    <div class="sort-destination-loader sort-destination-loader-showing">
                        <ul class="image-gallery sort-destination lightbox" data-sort-id="portfolio" data-plugin-options='{"delegate": "a.lightbox-portfolio", "type": "image", "gallery": {"enabled": true}}'>
                            <?php foreach($lists as $list):  ?>
                            <li class="col-md-3 col-sm-3 col-xs-6 isotope-item <?php $x = strtolower($list->cat); $y = str_replace(' ', '_', $x); echo $y; ?>">
                                <div class="image-gallery-item">
                                    <a href="<?=base_url()?>uploads/front/gallery/<?php echo $list->img; ?>" class="lightbox-portfolio">
                                        <span class="thumb-info">
                                            <span class="thumb-info-wrapper">
                                                <img src="<?=base_url()?>uploads/front/gallery/<?php echo $list->img; ?>" class="img-responsive" alt="">
                                                <span class="thumb-info-title">
                                                    <span class="thumb-info-inner"><?php echo $list->name; ?></span>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>