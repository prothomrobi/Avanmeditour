<div role="main" class="main">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Free Trial</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Free Trial</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2 class="mb-sm mt-sm">Get a <strong>Free Trial</strong></h2>
                <?php $tl = $this->session->flashdata('trail_msg');
                if (!empty($tl)) { ?>
                    <!-- notice -->
                    <h4 class="heading-primary mt-lg"><?php echo $this->session->flashdata('trail_msg'); ?></h4>
                <?php } ?>
                    
                    
                <?php $tel = $this->session->flashdata('trail_err_msg');
                if (!empty($tel)) { ?>
                    <!-- notice -->
                    <div class="alert alert-danger  mt-lg" id="contactError">
                        <strong>Error!</strong> <?php echo $this->session->flashdata('trail_err_msg'); ?>
                        <span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
                    </div>
                <?php } ?>   
                <div class="featured-box featured-box-primary align-left mt-xlg">
                    <div class="box-content">
                        <?php echo form_open_multipart(site_url("free_trail/trail")); ?>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name" maxlength="256" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email"  class="form-control" placeholder="Enter Your Email"  maxlength="256"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select class="form-control" name="service_type">
                                            <?php foreach($lists as $list) : ?>
                                            <option value="<?php echo $list->title; ?>"><?php echo $list->title; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="">
                                        <div class="col-md-12">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" class="form-control" id="exampleInputFile1" name="trail_file" required>
                                            <p class="help-block" >Maximum file size 25MB and only jpg, gif, png support.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <select class="form-control" name="deli_format">
                                            <option>Select Delivery Format</option>
                                            <option>JPEG</option>
                                            <option>PNG</option>
                                            <option>TIFF</option>
                                            <option>PSD</option>
                                            <option>EPS</option>
                                            <option>AI</option>
                                            <option>PDF</option>
                                            <option>GIF</option>
                                            <option>BMP</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="back_opt">
                                            <option>Background option</option>
                                            <option>Transparent</option>
                                            <option>White</option>
                                            <option>Original</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Message *</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control" name="message"  required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Submit" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h2 class="heading-primary mt-lg">Or just say <strong>hello</strong> to us</h2>
                <ul class="list list-icons list-icons-style-3 mt-xlg">
                    <li><i class="fa fa-phone"></i> <strong>Phone:</strong> +088 00000 000 000</li>
                    <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:info@imageediting24.com">hello@imageediting24.com</a></li>
                </ul>
                <hr>
                <h4 class="heading-primary mt-lg">We are all the way here</h4>
                <ul class="list list-icons list-icons-style-3 mt-xlg">
                    <li><i class="fa fa-map-marker"></i> <strong>Address:</strong> Rd#, Dhanmondi, Dhaka-1207</li>
                </ul>
            </div>
        </div>
    </div>
</div>