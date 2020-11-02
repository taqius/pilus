    <div class="register-box">
        <div class="register-logo">
            <a href="<?= base_url('auth'); ?>" class="text-light"><b>Admin</b> Binus </a>
            <i class="fas fa-user-edit"></i>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="<?= base_url('auth/registration'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="nama" id="nama" value="<?= set_value('nama'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-circle"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-danger"> <?= form_error('nama'); ?> </small>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?= set_value('username'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-lock"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-danger"> <?= form_error('username'); ?> </small>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password1">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-danger"> <?= form_error('password1'); ?> </small>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="password2">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary btn-block"> <i class="fas fa-user-plus"></i>
                                Register</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <a href="<?= base_url('auth'); ?>" class="btn btn-block btn-primary">
                                <i class="fas fa-user"></i>
                                Login
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /