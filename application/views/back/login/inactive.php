<div class="login-box">
    <div class="login-logo">
        <b style="color:red"><?php echo lang("error_5") ?></b>
    </div>
    <div class="login-box-body">
        <div class="form-group has-feedback">
            <b><?php echo lang("ctn_2") ?>:</b>&nbsp; <?php $bm = $this->session->flashdata('msg'); if(!empty($bm)){echo $bm;} ?>
        </div>
        <div class="row">
            <div class="col-xs-8"></div>
            <div class="col-xs-4">
                <button class="btn btn-danger" onclick="window.history.back()" ><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo lang("ctn_1") ?></button>
            </div>
        </div>
    </div>
</div>