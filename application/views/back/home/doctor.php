<div class="content-wrapper">
    <section class="content-header">
        <h1>Doctor</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Doctor</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add Doctor form</h3>
                    </div><!-- /.box-header -->
                    <?php $gl = $this->session->flashdata('globalmsg');
                    if (!empty($gl)) { ?>
                        <!-- notice -->
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('globalmsg') ?></h5>
                        </div>
                    <?php } ?>
                    <!-- form -->
                    <?php echo form_open_multipart(site_url("admin_panel/add_doctor"), array("class" => "form-horizontal")) ?>
                        <div class="box-body">
                            <!-- tilte -->
                            <div class="form-group">
                                <label for="inputphn" class="col-sm-2 control-label"> Doctor Name <sup>*</sup></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Doctor Name" name="title" maxlength="256" required>
                                </div>
                            </div>
                            <!-- expert in -->
                            <div class="form-group">
                                <label for="inputpro_brand" class="col-sm-2 control-label">Expert <sup>*</sup></label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="expert">
                                        <option select >Please Select</option>
                                        <?php foreach($experts as $expert) : ?>
                                        <option value="<?php echo $expert->url; ?>"><?php echo $expert->title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!--  country name -->
                            <div class="form-group">
                                <label for="inputpro_brand" class="col-sm-2 control-label">Country <sup>*</sup></label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="country">
                                        <option select >Please Select</option>
                                        <?php foreach($names as $name) : ?>
                                        <option value="<?php echo $name->country; ?>"><?php echo $name->country; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- image -->
                            <div class="form-group">
                                <label for="Inputprod_img" class="col-sm-2 control-label">Image <sup>*</sup></label>
                                <div class="col-sm-8">
                                    <input type="file" name="img" required>
                                    <p class="help-block">Image type: jpg and png & maximum size 1MB. </p>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary">Add Doctor</button>
                                    <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div><!-- /.box -->
            </div>
        </div>
        <!-- slider list row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- box header -->
                    <?php if(empty($lists)) : ?>
                        <div class="box-header">
                            <h3 class="box-title">No Doctor list Found!</h3>
                        </div>
                    <?php else: ?>
                    <div class="box-header">
                        <h3 class="box-title">Doctor's List</h3>
                    </div>
                    <!-- box content -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Doctor Name</th>
                                    <th>Expert</th>
                                    <th>Country</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                <?php $x = 0; foreach($lists as $list) : $x++; ?>
                                <tr>
                                    <td><?php echo $x; ?></td>
                                    <td>
                                        <?php echo $list->title;?>
                                    </td>
                                    <td>
                                        <?php echo $list->expert;?>
                                    </td>
                                    <td>
                                        <?php echo $list->country;?>
                                    </td>
                                    <td>
                                        <img src="<?php echo base_url(); ?>uploads/front/doctor/thumb/<?php echo $list->img; ?>" alt="<?php echo $list->img; ?>" >
                                    </td>
                                    <td>
                                        <a data-toggle="modal" href="#update<?php echo $list->id; ?>" title="update" data-original-title="update">
                                            <i class="fa fa-pencil-square-o text-blue" data-toggle="tooltip" title="" data-original-title="update"></i>
                                        </a> |
                                        <a data-toggle="modal" href="#replace<?php echo $list->id; ?>" title="Replace Image" data-original-title="Replace Image">
                                            <i class="fa fa-file-image-o text-green" data-toggle="tooltip" title="" data-original-title="Replace Image"></i>
                                        </a> |
                                        <a data-toggle="modal" href="#delete<?php echo $list->id; ?>" title="Delete" data-original-title="Delete">
                                            <i class="fa fa-trash text-red" data-toggle="tooltip" title="" data-original-title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- update -->
                                <div class="modal fade" id="update<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Update Information</h4>
                                            </div>
                                            <?php echo form_open(site_url("admin_panel/update_doctor")); ?>
                                                <div class="modal-body">
                                                    <!-- title -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="inputbr_name"> Doctor Name<sup>*</sup></label>
                                                                <input type="text" class="form-control" name="title" value="<?php echo $list->title; ?>" placeholder="Doctor Name" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- expert -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                               <label for="inputbr_name"> Expert <sup>*</sup></label>
                                                               <select class="form-control" name="expert">
                                                                   <option select >Please Select</option>
                                                                   <?php foreach($experts as $expert) : ?>
                                                                   <option value="<?php echo $expert->url; ?>"><?php echo $expert->title; ?></option>
                                                                   <?php endforeach; ?>
                                                               </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- country -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                               <label for="inputbr_name"> Country<sup>*</sup></label>
                                                               <select class="form-control" name="country">
                                                                    <option select >Please Select</option>
                                                                    <?php foreach($names as $name) : ?>
                                                                    <option value="<?php echo $name->country; ?>"><?php echo $name->country; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $list->id; ?>" required />
                                                    <input name="old_img" type="hidden" value="<?php echo $list->img; ?>" required />
                                                    <button type="submit" class="btn btn-primary btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Update</button>
                                                    <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- replace image -->
                                <div class="modal fade" id="replace<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Replace Image</h4>
                                            </div>
                                            <?php echo form_open_multipart(site_url("admin_panel/replace_image_doctor")); ?>
                                                <div class="modal-body">
                                                    <!-- replace image -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="inputbr_name"> Replace Image <sup>*</sup></label>
                                                                <input type="file" name="img" required>
                                                                <p class="help-block">Image type: jpg and png & maximum size 1MB. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="img" type="hidden" value="<?php echo $list->img; ?>" required>
                                                    <input name="id" type="hidden" value="<?php echo $list->id; ?>" required />
                                                    <button type="submit" class="btn btn-primary btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Replace Image</button>
                                                    <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete modal -->
                                <div class="modal fade" id="delete<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Are you sure want to delete this?</h4>
                                            </div>
                                            <?php echo form_open(site_url("admin_panel/delete_doctor")); ?>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $list->id; ?>" required/>
                                                    <input name="img" type="hidden" value="<?php echo $list->img; ?>" required/>
                                                    <button type="submit" class="btn btn-danger btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Delete</button>
                                                    <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
