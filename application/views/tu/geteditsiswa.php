<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <div class="card border-top border-primary">
                    <div class="card-header">
                        <div class="col-12" style="text-align: center;">
                            <h3>

                                <label><?= $siswa['nama'] . '<br>' . $kelas2['tingkat'] . ' - ' . $kelas2['jurusan']; ?></label>
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('tu/editsiswa'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" value="<?= $siswa['idsiswa']; ?>">
                                    <label>Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama']; ?>">
                                </div>
                                <div class=" form-group">
                                    <label>Nama Orang Tua / Wali</label>
                                    <input type="text" class="form-control" id="ortu" name="ortu" value="<?= $siswa['ortu']; ?>">
                                </div>
                                <div class=" form-group">
                                    <label>NIS</label>
                                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>">
                                </div>
                                <div class=" form-group">
                                    <label>Kelas</label>
                                    <select class="form-control" id="idkelasmodal" name="idkelasmodal">
                                        <option value="<?= $siswa['idkelas']; ?>">Pilih Kelas</option>
                                        <?php foreach ($kelas as $k) : ?>
                                            <option value="<?= $k['idkelas']; ?>"><?= $k['tingkat'] . '-' . $k['jurusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <input type="text" class="form-control" id="tahunmodal" name="tahunmodal" value="<?= $siswa['tahun']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Pilih Keterangan</label>
                                    <select class="form-control" id="ket" name="ket">
                                        <option value="<?= $siswa['ket']; ?>">Pilih Keterangan</option>
                                        <?php foreach ($keterangan as $ket) : ?>
                                            <option value="<?= $ket['ket']; ?>"><?= $ket['ket']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url('tu/datasiswa'); ?>">
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