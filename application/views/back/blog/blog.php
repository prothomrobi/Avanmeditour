<div class="content-wrapper">
    <section class="content-header">
        <h1>Blog</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Blog</li>
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
                        <h3 class="box-title">Add blog form</h3>
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
                    <?php echo form_open_multipart(site_url("admin_panel/blog"), array("class" => "form-horizontal")) ?>
                        <div class="box-body">
                            <!-- blog tilte -->
                            <div class="form-group">
                                <label for="inputphn" class="col-sm-2 control-label">Blog Title <sup>*</sup></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="" placeholder="Blog title" name="title" maxlength="256" required>
                                </div>
                            </div>
                            <!-- blog description -->
                            <div class="form-group">
                                <label for="inputphn" class="col-sm-2 control-label">Blog Description <sup>*</sup></label>
                                <div class="col-sm-8">
                                    <textarea id="ck_editor" class="form-control" name="desc" rows="15" placeholder="Write your description here ...." required></textarea>
                                </div>
                            </div>
                            <!-- image -->
                            <div class="form-group">
                                <label for="Inputprod_img" class="col-sm-2 control-label">Blog Image <sup>*</sup></label>
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
                                    <button type="submit" class="btn btn-primary">Post Blog</button>
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
                            <h3 class="box-title">No Blog Found!</h3>
                        </div>
                    <?php else: ?>
                    <div class="box-header">
                        <h3 class="box-title">Blog List</h3>
                    </div>
                    <!-- box content -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Blog Title</th>
                                    <th>Blog Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                <?php $x = 0; foreach($lists as $list) : $x++; ?>
                                <tr>
                                    <td><?php echo $x; ?></td>
                                    <td>
                                        <?php 
                                            $a = $list->title;
                                            if (strlen($a) > 20) {
                                                $stringCut = substr($a, 0, 20);
                                                echo $stringCut . '...';
                                            }else{
                                                echo $a;
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $a = $list->desc;
                                            if (strlen($a) > 20) {
                                                $stringCut = substr($a, 0, 20);
                                                echo $stringCut . '...';
                                            }else{
                                                echo $a;
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <img src="<?php echo base_url(); ?>uploads/front/blog/thumb/<?php echo $list->img; ?>" alt="<?php echo $list->img; ?>" >
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
                                            <?php echo form_open(site_url("admin_panel/update_blog")); ?>
                                                <div class="modal-body">
                                                    <!-- title -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="inputbr_name"> Blog Title<sup>*</sup></label>
                                                                <input type="text" class="form-control" name="title" value="<?php echo $list->title; ?>" placeholder="Blog title" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- description -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="inputbr_name"> Blog Description<sup>*</sup></label>
                                                                <textarea id="ck_editor<?=$list->id?>"  class="form-control" name="desc" rows="15" placeholder="Write your answer here ...." required><?php echo $list->desc; ?></textarea>
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
                                            <?php echo form_open_multipart(site_url("admin_panel/replace_image_blog")); ?>
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
                                            <?php echo form_open(site_url("admin_panel/delete_blog")); ?>
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

