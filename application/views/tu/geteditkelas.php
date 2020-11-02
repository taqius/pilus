<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <div class="card border-top border-primary">
                    <div class="card-header">
                        <div class="col-12" style="text-align: center;">
                            <h3>
                                <label><?= $kelas['nama']; ?></label>
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('tu/editkelas'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" value="<?= $kelas['idkelas']; ?>">
                                    <input type="text" class="form-control" id="tingkat" name="tingkat" value="<?= $kelas['tingkat']; ?>">
                                </div>
                                <div class=" form-group">
                                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $kelas['jurusan']; ?>">
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('tu/datakelas'); ?>">
                                        <button type="button" class="btn btn-secondary">Batal</button>
                                    </a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>