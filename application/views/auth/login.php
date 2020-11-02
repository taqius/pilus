<div class="row">
    <!-- b -->
    <div>
        <div class="login-box">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="login-logo">
                <a href="<?= base_url('auth'); ?>" class="text-light"><b>Admin</b> Binus
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="<?= base_url('auth'); ?>" method="post">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user-lock"></span>
                                </div>
                            </div>
                        </div>
                        <small class="text-danger"> <?= form_error('username'); ?> </small>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <small class="text-danger"> <?= form_error('password'); ?> </small>
                        <div class="row">
                            <!-- <div class="col-lg-6">
                                <a href="<?= base_url('auth/registration'); ?>" class="btn btn-block btn-primary">
                                    <i class="fas fa-users mr-2"></i> Register
                                </a>
                            </div> -->
                            <!-- /.col -->
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block"> <i class="fas fa-user mr-2"></i>Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</div>
<!-- /.login-box -->