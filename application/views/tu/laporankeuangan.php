<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <?php error_reporting(0); ?>
                        <h4><?= "Rp. " . number_format($SPP['total'], 0, ".", ".") . ",-"; ?></h4>
                        <p>Pemasukan SPP <?= gmdate('M Y'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-donate"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4><?= "Rp. " . number_format($NonSPP['total'], 0, ".", ".") . ",-"; ?></h4>
                        <p>UG,AP,Seragam <?= gmdate('M Y'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h4><?= "Rp. " . number_format($pemasukan['total'], 0, ".", ".") . ",-"; ?></h4>
                        <p>Total Pemasukan <?= gmdate('M Y'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-down"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4><?= "Rp. " . number_format(($pengeluaran['total']), 0, ".", ".") . ",-"; ?></h4>
                        <p>Pengeluaran <?= gmdate('M Y'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-down"></i></a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4><?= "Rp. " . number_format(($pemasukan['total'] - $pengeluaran['total']), 0, ".", ".") . ",-"; ?></h4>
                        <p>Sisa Saldo Bulan <?= gmdate('M Y'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-down"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11">
            <div class="card border-top border-warning">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tanggal1" name="tanggal1" value="<?= gmdate("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Sampai Dengan</label>
                                <input type="date" class="form-control" id="tanggal2" name="tanggal2" value="<?= gmdate("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Pilih Laporan</label>
                                <select name="pilihlaporan" id="pilihlaporan" class="form-control">
                                    <option class="form-control" value="">Pilih Laporan</option>
                                    <option class="form-control" value="SPP">Pemasukan SPP</option>
                                    <option class="form-control" value="Non-SPP">Uang Gedung,Seragam,Alat P</option>
                                    <option class="form-control" value="Pengeluaran">Pengeluaran</option>
                                </select>
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
                    <div id="tabellaporan"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>