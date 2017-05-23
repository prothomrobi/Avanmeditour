<div class="login-box">
    <div class="login-logo">
        <a href="<?=base_url()?>"><b style="color:#fff;font-size:60px;">Admin panel</b></a>
    </div>
    <div class="login-box-body" style="box-shadow: 0px 0px 20px 5px;">
        <p class="login-box-msg">Hi Admin!</p>
        <?php echo form_open(site_url("login/logincheck")) ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" maxlength="128" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="pass" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="rem"> &nbsp; Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
                </div>
            </div>
        <?php echo form_close() ?>
    </div>
</div>