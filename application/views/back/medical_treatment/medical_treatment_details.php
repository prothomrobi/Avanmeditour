<div class="content-wrapper">
    <section class="content-header">
        <h1>Medical treatment</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
            <li class="active">Medical treatment</li>
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
                        <h3 class="box-title">Medical treatment form</h3>
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
                    <?php echo form_open_multipart(site_url("admin_panel/update_medical_treatments"), array("class" => "form-horizontal")) ?>
                        <div class="box-body">
                            <!-- title -->
                            <div class="form-group">
                                <label for="inputphn" class="col-sm-2 control-label">Title <sup>*</sup></label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="text" placeholder="Title" value="<?=$list->title?>" name="title" required>
                                </div>
                            </div>
                            <!-- details text-->
                            <div class="form-group">
                                <label for="inputphn" class="col-sm-2 control-label">Details text<sup>*</sup></label>
                                <div class="col-sm-10">
                                    <textarea id="ck_editor" class="form-control" name="desc" rows="15" required><?=$list->desc?></textarea>
                                </div>
                            </div>
                            <!-- table-->
                            <div class="form-group">
                                <label for="inputphn" class="col-sm-2 control-label">Table<sup>*</sup></label>
                                <div class="col-sm-10">
                                    <textarea id="ck_editor_2" class="form-control" name="table" rows="15" required><?=$list->table?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                    <button type="submit" value="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div><!-- /.box -->
                <script>
                    $(function () {
                        CKEDITOR.replace('ck_editor');
                        CKEDITOR.replace('ck_editor_2');
                    });
                </script>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->