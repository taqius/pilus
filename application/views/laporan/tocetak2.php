<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-top border-primary">
                    <div class="card-body">
                        <div class="row">
                            <label>Adm. Tagihan Kelas : <?= $kelas['tingkat'] . ' - ' . $kelas['jurusan'] . ' Tahun Ajaran ' . $tahun; ?> By PDF Download</label>
                        </div>
                        <div class="row">
                            <table class="table table-striped">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Action</th>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($siswa as $s) : ?>
                                        <form action="<?= base_url('laporan/cetakpdf'); ?>" method="post">
                                            <tr>
                                                <td>
                                                    <?= ++$i; ?>
                                                </td>
                                                <td>
                                                    <?= $s['nama']; ?>
                                                    <input type="hidden" name="id" id="id" value="<?= $s['idsiswa']; ?>">
                                                    <input type="hidden" name="tahun" id="tahun" value="<?= $s['tahun']; ?>">
                                                    <input type="hidden" name="nosurat" id="nosurat" value="<?= $nosurat; ?>">
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <div class="col-12 form-check" hidden>
                                                            <?php foreach ($gunabayar as $g) : ?>
                                                                <input type="checkbox" value="<?= $g['idgunabayar']; ?>" name="gunabayartoprint[]" id="<?= $g['gunabayar']; ?>" checked>
                                                                <label class="form-check-label mr-2" for="<?= $g['gunabayar']; ?>"><?= $g['gunabayar']; ?></label>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary" value="Download">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>