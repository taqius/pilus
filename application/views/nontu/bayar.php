<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card border-top border-primary">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                        </div>
                        <form action="<?= base_url('nontu/pembayaran'); ?>" method="post">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label>Tanggal Bayar</label>
                                        <input type="date" class="form-control" id="tanggalbayar" name="tanggalbayar" value="<?= gmdate("Y-m-d"); ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" id="idkelasnon" name="idkelasnon">
                                            <option value="">Kelas</option>
                                            <?php foreach ($kelas as $k) : ?>
                                                <option value="<?= $k['idkelas']; ?>"><?= $k['tingkat'] . '-' . $k['jurusan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?= form_error('idkelas', '<div class="text-danger">', '</div>');
                                    ?>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Tahun Ajaran</label>
                                        <select class="form-control" id="tahunnon" name="tahunnon">
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
                                <div class="col-8">
                                    <div class="form-group">
                                        <label>Nama Siswa</label>
                                        <select class="form-control" id="idsiswanon" name="idsiswanon">
                                            <option value="">Pilih Siswa</option>
                                        </select>
                                        <?= form_error('idsiswa', '<div class="text-danger">', '</div>');
                                        ?>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input class="form-control" type="text" name="nis" id="nis" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Guna Bayar</label>
                                        <select class="form-control" id="idgunabayarnon" name="idgunabayarnon">
                                            <option value="">Guna Bayar</option>
                                            <?php foreach ($gunabayar as $g) : ?>
                                                <option value="<?= $g['idgunabayar']; ?>"><?= $g['gunabayar']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('idgunabayar', '<div class="text-danger">', '</div>');
                                        ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Wajib Bayar</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="wajibbayar" name="wajibbayar">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label>Jumlah Bayar</label>
                                    <input type="text" class="form-control" id="jumlahbayar" name="jumlahbayar">
                                    <?= form_error('jumlahbayar', '<div class="text-danger">', '</div>');
                                    ?>
                                </div>
                                <div class="col-5">
                                    <label>&nbsp;</label>
                                    <input type="submit" class="form-control btn btn-primary" value="Proses">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
