<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <div class="card border-top border-primary">
                    <div class="card-header text-light">
                        <div class="col-5">
                            <a class="btn btn-primary addSiswa" data-toggle="modal" data-target="#siswaModal"> Add Siswa <i class="fas fa-user-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select class="form-control" id="idkelassiswa" name="idkelassiswa">
                                        <option value="">Kelas</option>
                                        <?php foreach ($kelas as $k) : ?>
                                            <option value="<?= $k['idkelas']; ?>"><?= $k['tingkat'] . '-' . $k['jurusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?= form_error('idkelas', '<div class="text-danger">', '</div>');
                                ?>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <select class="form-control" id="tahunsiswa" name="tahunsiswa">
                                        <option value="">Tahun</option>
                                        <?php foreach ($tahun as $t) : ?>
                                            <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('tahun', '<div class="text-danger">', '</div>');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11 divlaporan">
                <div class="card border-top border-warning">
                    <div class="card-body">
                        <table class="table table-responsive table-bordered table-striped" style="width: max-content;">
                            <thead>
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Nama Ortu / Wali</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="tabelsiswa">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="siswaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="siswaModalLabel">Add Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('tu/addsiswa'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ortu" name="ortu" placeholder="Nama Orang Tua Siswa">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS Siswa">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="idkelasmodal" name="idkelasmodal">
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($kelas as $k) : ?>
                                <option value="<?= $k['idkelas']; ?>"><?= $k['tingkat'] . '-' . $k['jurusan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tahunmodal" name="tahunmodal" placeholder="Tahun Ajaran ,ex. 2020 / 2021">
                    </div>
                    <div class="form-group">
                        <label>Pilih Keterangan</label>
                        <select class="form-control" id="ket" name="ket">
                            <option value="">Pilih Keterangan</option>
                            <?php foreach ($keterangan as $ket) : ?>
                                <option value="<?= $ket['ket']; ?>"><?= $ket['ket']; ?></option>
                            <?php endforeach; ?>
                        </select>
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