<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-light">
                        <div class="col-5">
                            <a class="btn btn-primary addKelas" data-toggle="modal" data-target="#kelasModal"> Add Kelas <i class="fas fa-user-plus"></i></a>
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
                                    <th scope="col">Id Kelas</th>
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($kelas as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $m['idkelas']; ?></td>
                                        <td><?= $m['tingkat'] . ' - ' . $m['jurusan']; ?></td>
                                        <td>
                                            <a href="<?= base_url('tu/editkelas'); ?>/<?= $m['idkelas']; ?>" class="badge badge-success editKelas" data-toggle="modal" data-target="#kelasModal" data-id="<?= $m['idkelas']; ?>" data-tingkat="<?= $m['tingkat']; ?>" data-jurusan="<?= $m['jurusan']; ?>">Edit</a>
                                            <a href="<?= base_url('tu/hapuskelas'); ?>/<?= $m['idkelas']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
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
<div class="modal fade" id="kelasModal" tabindex="-1" aria-labelledby="kelasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kelasModalLabel">Add Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('tu/addkelas'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label>Tingkat</label>
                        <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="Contoh X, XI, XII">
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Contoh TKJ2, TKJ3, AKL">
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