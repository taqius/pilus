<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card border-top border-primary">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                        </div>
                        <form action="<?= base_url('tu/bayar'); ?>" method="post">
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
                                <div class="col-4">
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
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label>Nama Siswa</label>
                                        <select class="form-control" id="idsiswa" name="idsiswa">
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
                                        <select class="form-control" id="idgunabayar" name="idgunabayar">
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
                                        <input type="text" class="form-control" id="wajibbayar" name="wajibbayar" readonly>
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
            <div class="col-lg-6">
                <div class="card border-top border-warning">
                    <div class="card-body">
                        <label>Data Tagihan Siswa</label>
                        <table class="table table-responsive table-bordered" style="width: max-content;">
                            <thead>
                                <td>Guna Bayar</td>
                                <td>Wajib Bayar</td>
                                <td>Jumlah Bayar</td>
                                <td>Tanggal Bayar</td>
                            </thead>
                            <tbody>

                                <tr id="juli">

                                </tr>
                                <tr id="agustus">

                                </tr>
                                <tr id="september">

                                </tr>
                                <tr id="oktober">

                                </tr>
                                <tr id="november">

                                </tr>
                                <tr id="desember">

                                </tr>
                                <tr id="januari">

                                </tr>
                                <tr id="februari">

                                </tr>
                                <tr id="maret">

                                </tr>
                                <tr id="april">

                                </tr>
                                <tr id="mei">

                                </tr>
                                <tr id="juni">

                                </tr>
                                <tr id="seragam">

                                </tr>
                                <tr id="alatpraktek">

                                </tr>
                                <tr id="uanggedung">

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>