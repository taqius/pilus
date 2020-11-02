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
                                <label>
                                    <h6>
                                        SMK BINA NUSANTARA SEMARANG
                                    </h6>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: center;">
                                <label>
                                    <h7>
                                        Jl. Kemantren No. 5 Wonosari-Ngaliyan, Semarang
                                    </h7>
                                    <hr>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: center;">
                                <label>
                                    <h6>
                                        Kwitansi Pembayaran Sah
                                    </h6>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>
                                    Telah terima dari
                                </label>
                            </div>
                            <div class="col-1">
                                <label>
                                    :
                                </label>
                            </div>
                            <div class="col-6">
                                <label>
                                    <?= $pembayaran['nama']; ?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>
                                    Kelas
                                </label>
                            </div>
                            <div class="col-1">
                                <label>
                                    :
                                </label>
                            </div>
                            <div class="col-6">
                                <label>
                                    <?= $pembayaran['tingkat'] . ' - ' . $pembayaran['jurusan']; ?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>
                                    Uang Sebesar
                                </label>
                            </div>
                            <div class="col-1">
                                <label>
                                    :
                                </label>
                            </div>
                            <div class="col-6">
                                <label>
                                    <?= "Rp. " . number_format($pembayaran['jumlahbayar'], 0, ".", ".") . ",-"; ?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>
                                    Guna Pembayaran
                                </label>
                            </div>
                            <div class="col-1">
                                <label>
                                    :
                                </label>
                            </div>
                            <div class="col-6">
                                <label>
                                    <?= $pembayaran['gunabayar'] . ' Tahun ' . $pembayaran['tahun']; ?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: right;">
                                <label>
                                    <?= 'Semarang, ' . date("d M Y", strtotime($pembayaran['tanggalbayar'])); ?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: right;">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: right;">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8" style="text-align: right;">
                                <label>
                                    <?= $user['nama']; ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <script>
    window.print();
</script> -->