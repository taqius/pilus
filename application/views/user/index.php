<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Default box -->
        <div class="card mb-3 col-lg-8">
            <?= $this->session->flashdata('message'); ?>
            <div class="row no-gutters">
                <div class="col-md-4"><img src="<?= base_url('assets/images/') . $user['image']; ?>" class="card-img" /></div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="card-title"><?= $user['nama']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </div>
</section>
<!-- /.content -->