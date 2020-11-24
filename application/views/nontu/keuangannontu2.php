<div class="small-box bg-success">
    <div class="inner">
        <?php error_reporting(0); ?>
        <h4><?= "Rp. " . number_format($pemasukan['total'], 0, ".", ".") . ",-"; ?></h4>
        <p>Pemasukan <?= $gunabayar['gunabayar']; ?></p>
        <p>Tahun Ajaran <?= $tahun; ?></p>
    </div>
    <div class="icon">
        <i class="fas fa-donate"></i>
    </div>
    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
</div>