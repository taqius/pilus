<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Pilih Pembayaran</label>
                    <select name="pilihpembayaran" id="pilihpembayaran" class="form-control">
                        <option class="form-control" value="">Pilih Pembayaran</option>
                        <?php foreach ($gunabayar as $g) : ?>
                            <option value="<?= $g['idgunabayar']; ?>"><?= $g['gunabayar']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <select name="tahun" id="tahun" class="form-control">
                        <option class="form-control" value="">Tahun</option>
                        <?php foreach ($tahun as $t) : ?>
                            <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 divkeuangan" id="divkeuangan">
            </div>
        </div>
</section>