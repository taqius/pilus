<section class="content">
    <div class="container-fluid">
        <form action="<?= base_url('laporan/tocetak2'); ?>" method="post">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-top border-primary">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" id="id" name="id">
                                            <option value="">Kelas</option>
                                            <?php foreach ($kelas as $k) : ?>
                                                <option value="<?= $k['idkelas']; ?>"><?= $k['tingkat'] . '-' . $k['jurusan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?= form_error('idkelas', '<div class="text-danger">', '</div>');
                                    ?>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Tahun Ajaran</label>
                                        <select class="form-control" id="tahun" name="tahun">
                                            <option value="">Tahun</option>
                                            <?php foreach ($tahun as $t) : ?>
                                                <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('tahun', '<div class="text-danger">', '</div>');
                                        ?>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="nosurat">Nomor Surat : Mintalah ke TU</label>
                                        <input type="text" name="nosurat" id="nosurat" class="form-control" placeholder="001/SMK.BN/SP/XI/2020" required>
                                        <?= form_error('nosurat', '<div class="text-danger">', '</div>');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label>Pilih Tagihan Siswa</label>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-12 form-check">
                                            <?php foreach ($gunabayar as $g) : ?>
                                                <input type="checkbox" value="<?= $g['idgunabayar']; ?>" name="gunabayartoprint[]" id="<?= $g['gunabayar']; ?>">
                                                <label class="form-check-label mr-3" for="<?= $g['gunabayar']; ?>"><?= $g['gunabayar']; ?></label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary" value="Proses">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>