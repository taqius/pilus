<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-light">
                        <div class="col-5">
                            <a class="btn btn-primary addGunaBayar" data-toggle="modal" data-target="#gunaBayarModal"> Add Guna Bayar <i class="fas fa-user-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= form_error('menu', '<div class="text-danger">', '</div>');
                        ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                        </div>
                        <table class="table table-bordered table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Guna Bayar</th>
                                    <th scope="col">Wajib Bayar</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($gunabayar as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $m['gunabayar']; ?></td>
                                        <td><?= "Rp. " . number_format($m['wajibbayar'], 0, ".", ".") . ",-"; ?></td>
                                        <td><?= $m['jenisket']; ?></td>
                                        <td>
                                            <a href="<?= base_url('laporan/editgunabayar'); ?>/<?= $m['idgunabayar']; ?>" class="badge badge-success editGunaBayar" data-toggle="modal" data-target="#gunaBayarModal" data-id="<?= $m['idgunabayar']; ?>" data-gunabayar="<?= $m['gunabayar']; ?>" data-wajibbayar="<?= $m['wajibbayar']; ?>">Edit</a>
                                            <!-- <a href="<?= base_url('laporan/hapusgunabayar'); ?>/<?= $m['idgunabayar']; ?>" class="badge badge-danger tombol-hapus">Delete</a> -->
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Modal -->
<div class="modal fade" id="gunaBayarModal" tabindex="-1" aria-labelledby="gunaBayarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gunaBayarModalLabel">Add Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('laporan/addgunabayar'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label>Guna Bayar</label>
                        <input type="text" class="form-control" id="gunabayar" name="gunabayar" placeholder="Contoh PAS GASAL">
                    </div>
                    <div class="form-group">
                        <label>Wajib Bayar</label>
                        <input type="text" class="form-control" id="wajibbayar" name="wajibbayar" placeholder="Contoh 100000">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>