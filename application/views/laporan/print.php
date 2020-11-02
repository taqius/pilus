<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-purple">
                    <div class="card-header">
                        <div class="row"></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8" style="text-align: center;">

                                <h6>
                                    SMK BINA NUSANTARA SEMARANG
                                </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: center;">
                                <h7>
                                    Jl. Kemantren No. 5 Wonosari-Ngaliyan, Semarang
                                </h7>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: center;">
                                <h6>
                                    Kwitansi Pembayaran Sah
                                </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Telah terima dari
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-6">
                                <?= $pembayaran['nama']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Kelas
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-6">
                                <?= $pembayaran['tingkat'] . ' - ' . $pembayaran['jurusan']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Uang Sebesar
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-6">
                                <?= "Rp. " . number_format($pembayaran['jumlahbayar'], 0, ".", ".") . ",-"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Guna Pembayaran
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-6">
                                <?= $pembayaran['gunabayar'] . ' Tahun ' . $pembayaran['tahun']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: right;">
                                <?= 'Semarang, ' . date("d M Y", strtotime($pembayaran['tanggalbayar'])); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: right;">
                                Bendahara
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: right;">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: right;">
                                <?= $user['nama']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    window.load = print_d();

    function print_d() {
        window.print();
    }
</script>