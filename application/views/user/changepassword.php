<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Default box -->
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
                <?= form_open_multipart('user/changepassword'); ?>
                <div class="form-group">
                    <label for="currentpassword">Current Password</label>
                    <input type="text" class="form-control" id="currentpassword" name="currentpassword">
                    <small class="text-danger"> <?= form_error('currentpassword'); ?> </small>
                </div>
                <div class="form-group">
                    <label for="newpassword1">New Password</label>
                    <input type="text" class="form-control" id="newpassword1" name="newpassword1">
                    <small class="text-danger"> <?= form_error('newpassword1'); ?> </small>
                </div>
                <div class="form-group">
                    <label for="newpassword2">Repeat Password</label>
                    <input type="text" class="form-control" id="newpassword2" name="newpassword2">
                    <small class="text-danger"> <?= form_error('newpassword2'); ?> </small>

                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Change Password</button>
                </div>


                </form>

            </div>
        </div>
        <!-- /.card -->
    </div>
</section>
<!-- /.content -->