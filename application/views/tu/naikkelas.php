<section class="content">
    <div class="container-fluid">
        <form action="<?= base_url('tu/naikkelas'); ?>" method="post">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card border-top border-primary">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Kelas Lama</label>
                                        <select class="form-control" id="idkelas" name="idkelas">
                                            <option value="">Kelas Lama</option>
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
                                        <label>Tahun Ajaran Lama</label>
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
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Kelas Baru : Naik</label>
                                        <select class="form-control" id="idkelasbaru" name="idkelasbaru">
                                            <option value="">Kelas Baru</option>
                                            <?php foreach ($kelas as $k) : ?>
                                                <option value="<?= $k['idkelas']; ?>"><?= $k['tingkat'] . '-' . $k['jurusan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <?= form_error('idkelasbaru', '<div class="text-danger">', '</div>');
                                ?>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tahunbaru">Tahun Ajaran Baru</label>
                                        <input type="text" name="tahunbaru" id="tahunbaru" class="form-control" placeholder="2020 / 2021" required>
                                        <?= form_error('tahunbaru', '<div class="text-danger">', '</div>');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" value="Naik Kelas">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
</section>