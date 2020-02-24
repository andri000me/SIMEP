<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Simonev Pengawas</b>
            <h3>Dinas Pendidikan Kota Malang</h3>
        </div>
        <!-- /.login-logo -->

        <div class="login-box-body">
            <form method="post" action="<?php echo site_url('login/validate');?>" id="login">
            <div class="form-group has-feedback">
                <input type="text" name="nip_nik" class="form-control" placeholder="NIP/NIK">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <label class="col-xs-4"></label>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Log In</button>
                </div>
                <!-- /.col -->
                </div> 
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->