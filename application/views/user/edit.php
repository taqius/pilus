<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Default box -->
        <div class="card col-sm-10">

            <div class="card-body">
                <?= form_open_multipart('user/edit'); ?>

                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                        <small class="text-danger"> <?= form_error('nama'); ?> </small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Picture</label>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="<?= base_url('assets/images/') . $user['image']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
                </form>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
</section>
<!-- /.content -->