<div class="content-wrapper">
    <section class="content-header">
        <h1>Service & Package</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Service & Package</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- slider form row -->
        <div class="row">
            <div class="col-md-12">
                <!-- box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add Service & Package form</h3>
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
                    <?php echo form_open_multipart(site_url("admin_panel/service_package"), array("class" => "form-horizontal")) ?>
                        <div class="box-body">
                            <!--  country name -->
                            <div class="form-group">
                                <label for="inputpro_brand" class="col-sm-2 control-label">Sub Menu <sup>*</sup></label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="sub_id">
                                        <option value="---" selected >No sub</option>
                                        <?php foreach($lists as $list) : ?>
                                        <option value="<?php echo $list->id; ?>"><?php echo $list->title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- title -->
                            <div class="form-group">
                                <label for="inputphn" class="col-sm-2 control-label">Title <sup>*</sup></label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="text" placeholder="Title" name="title" maxlength="128" required>
                                </div>
                            </div>
                            <!-- details text-->
                            <div class="form-group">
                                <label for="inputphn" class="col-sm-2 control-label">Details text<sup>*</sup></label>
                                <div class="col-sm-10">
                                    <textarea id="ck_editor" class="form-control" name="desc" rows="15" required></textarea>
                                </div>
                            </div>
                            <!-- table-->
                            <div class="form-group">
                                <label for="inputphn" class="col-sm-2 control-label">Table<sup>*</sup></label>
                                <div class="col-sm-10">
                                    <textarea id="ck_editor_2" class="form-control" name="table" rows="15" required></textarea>
                                </div>
                            </div>
                            <!-- thumb image -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Thumb Image <sup>*</sup></label>
                                <div class="col-sm-10">
                                    <input type="file" name="img" required>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                    <button type="submit" value="submit" class="btn btn-primary">Add service & package</button>
                                    <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div><!-- /.box -->
            </div>
        </div>
        <!-- list row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- box header -->
                    <?php if(empty($lists)) : ?>
                        <div class="box-header">
                            <h3 class="box-title">No List Found!</h3>
                        </div>
                    <?php else: ?>
                    <div class="box-header">
                        <h3 class="box-title">List</h3>
                    </div>
                    <!-- box content -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Title</th>
                                    <th>Details text</th>
                                    <th>Thumb img.</th>
                                    <!-- <th>Sub</th> -->
                                    <th>Actions</th>
                                </tr>
                                <?php $x = 0; foreach($lists as $list) : $x++; ?>
                                <tr>
                                    <td><?php echo $x; ?></td>
                                    <td><?php echo $list->title; ?></td>
                                    <td>
                                        <?php 
                                            $a = $list->desc;
                                            if (strlen($a) > 30) {
                                                $stringCut = substr($a, 0, 10);
                                                echo $stringCut . '...';
                                            }else{
                                                echo $a;
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <img src="<?php echo base_url(); ?>uploads/front/service_package/<?php echo $list->img; ?>" alt="<?php echo $list->img; ?>" width="60px" height="60px">
                                    </td>
                                    <!-- <td><?php //echo $list->sub; ?></td> -->
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
                                <!-- update modal -->
                                <div class="modal fade" id="update<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Update Information</h4>
                                            </div>
                                            <?php echo form_open(site_url("admin_panel/update_service_package")); ?>
                                                <div class="modal-body">
                                                    <!-- name -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="inputbr_name">Title <sup>*</sup></label>
                                                                <input type="text" class="form-control" name="title" value="<?php echo $list->title; ?>" placeholder="name" maxlength="128" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- description --> 
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="inputbr_name"> Details<sup>*</sup></label>
                                                                <textarea id="ck_editor<?=$list->id?>" class="form-control" name="desc" rows="15" required><?php echo $list->desc; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- table-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="inputbr_name"> Table<sup>*</sup></label>
                                                                <textarea id="ck_editor_<?=$list->id?>" class="form-control" name="table" rows="15" required><?php echo $list->table; ?></textarea>
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
                                    <script>
                                        $(function () {
                                          CKEDITOR.replace('ck_editor<?=$list->id?>');
                                          CKEDITOR.replace('ck_editor_<?=$list->id?>');
                                        });
                                    </script>
                                </div>
                                <!-- replace image -->
                                <div class="modal fade" id="replace<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Replace Image</h4>
                                            </div>
                                            <?php echo form_open_multipart(site_url("admin_panel/replace_image_service_package")); ?>
                                                <div class="modal-body">
                                                    <!-- replace image -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="inputbr_name"> Replace Image <sup>*</sup></label>
                                                                <input type="file" name="img" required>
                                                                <p class="help-block">Image type: jpg and png & maximum size 5MB. </p> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $list->id; ?>" required />
                                                    <input type="hidden" name="img" value="<?php echo $list->img; ?>" />
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
                                            <?php echo form_open(site_url("admin_panel/delete_service_package")); ?>
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

        <!-- sub menu list row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- box header -->
                    <?php if(empty($sub_lists)) : ?>
                        <div class="box-header">
                            <h3 class="box-title">No Sub List Found!</h3>
                        </div>
                    <?php else: ?>
                    <div class="box-header">
                        <h3 class="box-title">Sub List</h3>
                    </div>
                    <!-- box content -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Main Menu</th>
                                    <th>Title</th>
                                    <th>Details text</th>
                                    <th>Thumb img.</th>
                                    <!-- <th>Sub</th> -->
                                    <th>Actions</th>
                                </tr>
                                <?php $x = 0; foreach($sub_lists as $sub_list) : $x++; ?>
                                <tr>
                                    <td><?php echo $x; ?></td>
                                    <td><?php echo $sub_list->sub_id; ?></td>
                                    <td><?php echo $sub_list->title; ?></td>
                                    <td>
                                        <?php 
                                            $a = $sub_list->desc;
                                            if (strlen($a) > 30) {
                                                $stringCut = substr($a, 0, 10);
                                                echo $stringCut . '...';
                                            }else{
                                                echo $a;
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <img src="<?php echo base_url(); ?>uploads/front/service_package/sub/<?php echo $sub_list->img; ?>" alt="<?php echo $sub_list->img; ?>" width="60px" height="60px">
                                    </td>
                                    <!-- <td><?php //echo $list->sub; ?></td> -->
                                    <td>
                                        <a data-toggle="modal" href="#sub_update<?php echo $sub_list->id; ?>" title="update" data-original-title="update">
                                            <i class="fa fa-pencil-square-o text-blue" data-toggle="tooltip" title="" data-original-title="update"></i>
                                        </a> |
                                        <a data-toggle="modal" href="#sub_replace<?php echo $sub_list->id; ?>" title="Replace Image" data-original-title="Replace Image">
                                            <i class="fa fa-file-image-o text-green" data-toggle="tooltip" title="" data-original-title="Replace Image"></i>
                                        </a> |
                                        <a data-toggle="modal" href="#sub_delete<?php echo $sub_list->id; ?>" title="Delete" data-original-title="Delete">
                                            <i class="fa fa-trash text-red" data-toggle="tooltip" title="" data-original-title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- update modal -->
                                <div class="modal fade" id="sub_update<?php echo $sub_list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Update Information</h4>
                                            </div>
                                            <?php echo form_open(site_url("admin_panel/update_service_package_sub")); ?>
                                                <div class="modal-body">
                                                    <!-- name -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label >Title <sup>*</sup></label>
                                                                <input type="text" class="form-control" name="title" value="<?php echo $list->title; ?>" placeholder="name" maxlength="128" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- description --> 
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label > Details<sup>*</sup></label>
                                                                <textarea id="ck_editor_3<?=$list->id?>" class="form-control" name="desc" rows="15" required><?php echo $list->desc; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- table-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label > Table<sup>*</sup></label>
                                                                <textarea id="ck_editor_4<?=$list->id?>" class="form-control" name="table" rows="15" required><?php echo $list->table; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $sub_list->id; ?>" required />
                                                    <input name="old_img" type="hidden" value="<?php echo $sub_list->img; ?>" required />
                                                    <button type="submit" class="btn btn-primary btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Update</button>
                                                    <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                </div>
                                            <?php echo form_close(); ?> 
                                        </div>
                                    </div>
                                    <script>
                                        $(function () {
                                          CKEDITOR.replace('ck_editor_3<?=$list->id?>');
                                          CKEDITOR.replace('ck_editor_4<?=$list->id?>');
                                        });
                                    </script>
                                </div>
                                <!-- replace image -->
                                <div class="modal fade" id="sub_replace<?php echo $sub_list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Replace Image</h4>
                                            </div>
                                            <?php echo form_open_multipart(site_url("admin_panel/replace_image_service_package_sub")); ?>
                                                <div class="modal-body">
                                                    <!-- replace image -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="inputbr_name"> Replace Image <sup>*</sup></label>
                                                                <input type="file" name="img" required>
                                                                <p class="help-block">Image type: jpg and png & maximum size 5MB. </p> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $sub_list->id; ?>" required />
                                                    <input type="hidden" name="img" value="<?php echo $sub_list->img; ?>" />
                                                    <button type="submit" class="btn btn-primary btn-icon"><i class="fa fa-fw fa-check-square-o"></i> Replace Image</button>
                                                    <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Cancel</button>
                                                </div>
                                            <?php echo form_close(); ?> 
                                        </div>
                                    </div>
                                </div>
                                <!-- delete modal -->
                                <div class="modal fade" id="sub_delete<?php echo $sub_list->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Are you sure want to delete this?</h4>
                                            </div>
                                            <?php echo form_open(site_url("admin_panel/delete_service_package_sub")); ?>
                                                <div class="modal-footer">
                                                    <input name="id" type="hidden" value="<?php echo $sub_list->id; ?>" required/>
                                                    <input name="img" type="hidden" value="<?php echo $sub_list->img; ?>" required/>
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
        <!-- sub menu row end -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->