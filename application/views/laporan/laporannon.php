<section class="content">
    <div class="container-fluid">
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
                                    <select class="form-control" id="idkelas" name="idkelas">
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Pembayaran</label>
                                    <select class="form-control" id="gunabayar" name="gunabayar">
                                        <option value="">Pembayaran</option>
                                        <?php foreach ($gunabayar as $g) : ?>
                                            <option value="<?= $g['idgunabayar']; ?>"><?= $g['gunabayar']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('gunabayar', '<div class="text-danger">', '</div>');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 divlaporan">
                <div class="card border-top border-warning">
                    <div class="card-body">
                        <div id="tabellaporan2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>