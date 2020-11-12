<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Default box -->
        <div class="card col-lg-11">
            <div class="card-title text-light mt-3 ml-3">
                <a class="btn btn-primary addPengeluaran" data-toggle="modal" data-target="#pengeluaranModal">Add Pengeluaran</a>
            </div>
            <div class="card-header">
                <div class="card-title text-light mt-3 ml-3">
                    <?= $this->pagination->create_links(); ?>
                </div>
            </div>
            <div class=" card-body">
                <?= form_error('pengeluaran', '<div class="text-danger">', '</div>');
                ?>
                <?= $this->session->flashdata('message'); ?>
                <div class="row">
                    <div class="col">
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                        </div>
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal Simpan</th>
                                    <th scope="col">Tanggal Nota</th>
                                    <th scope="col">Pengeluaran</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($pengeluaran as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= date('d M Y', strtotime($p['tanggalsimpan'])); ?></td>
                                        <td><?= date('d M Y', strtotime($p['tanggalnota'])); ?></td>
                                        <td><?= $p['keterangan']; ?></td>
                                        <td><?= "Rp. " . number_format($p['jumlahbayar'], 0, ".", ".") . ",-"; ?></td>
                                        <td>
                                            <a href="<?= base_url('tu/hapuspengeluaran'); ?>/<?= $p['idpengeluaran']; ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </div>
</section>
<!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="pengeluaranModal" tabindex="-1" aria-labelledby="pengeluaranModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pengeluaranModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('tu/pengeluaran'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label>Tanggal Simpan</label>
                                <input type="date" class="form-control" id="tanggalsimpan" name="tanggalsimpan" value="<?= gmdate("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label>Tanggal Nota</label>
                                <input type="date" class="form-control" id="tanggalnota" name="tanggalnota" value="<?= gmdate("Y-m-d"); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label>Keterangan Pengeluaran</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                                <?= form_error('keterangan', '<div class="text-danger">', '</div>');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" class="form-control" id="jumlahbayar" name="jumlahbayar">
                                <?= form_error('jumlahbayar', '<div class="text-danger">', '</div>');
                                ?>
                            </div>
                        </div>
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
