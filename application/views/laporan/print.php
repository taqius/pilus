<section class="content">
    <div class="container-fluid">
        <div class="row ml-5">
            <div class="col-lg-8">
                <div class="card card-purple">
                    <div class="card-header">
                        <div class="row ml-5"></div>
                    </div>
                    <div class="card-body">
                        <div class="row ml-5">
                            <div class="col-8" style="text-align: center;">
                                <h4>
                                    SMK BINA NUSANTARA SEMARANG
                                </h4>
                            </div>
                        </div>
                        <div class="row ml-5">
                            <div class="col-8" style="text-align: center;">
                                <h5>
                                    Jl. Kemantren No. 5 Wonosari-Ngaliyan, Semarang
                                </h5>
                            </div>
                        </div>
                        <div class="row ml-5">
                            <div class="col-8" style="text-align: center;">
                                <h6>
                                    Kwitansi Pembayaran Sah
                                </h6>
                            </div>
                        </div>
                        <div class="row ml-5">
                            <div class="col-3">
                                <h6>
                                    Telah terima dari
                                </h6>
                            </div>
                            <div class="col-1">
                                <h6>
                                    :
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6>
                                    <?= $pembayaran['nama']; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="row ml-5">
                            <div class="col-3">
                                <h6>
                                    Kelas
                                </h6>
                            </div>
                            <div class="col-1">
                                <h6>
                                    :
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6>
                                    <?= $pembayaran['tingkat'] . ' - ' . $pembayaran['jurusan']; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="row ml-5">
                            <div class="col-3">
                                <h6>

                                    Uang Sebesar
                                </h6>
                            </div>
                            <div class="col-1">
                                <h6>

                                    :
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6>

                                    <?= "Rp. " . number_format($pembayaran['jumlahbayar'], 0, ".", ".") . ",-"; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="row ml-5">
                            <div class="col-3">
                                <h6>

                                    Guna Pembayaran
                                </h6>
                            </div>
                            <div class="col-1">
                                <h6>

                                    :
                                </h6>

                            </div>
                            <div class="col-6">
                                <h6>

                                    <?= $pembayaran['gunabayar'] . ' Tahun ' . $pembayaran['tahun']; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="row ml-5">
                            <div class="col-8" style="text-align: right;">
                                <h6>

                                    <?= 'Semarang, ' . date("d M Y", strtotime($pembayaran['tanggalbayar'])); ?>
                                </h6>
                            </div>
                        </div>
                        <div class="row ml-5">
                            <div class="col-8" style="text-align: right;">
                                <h6>

                                    Bendahara
                                </h6>
                            </div>
                        </div>
                        <div class="row ml-5">
                            <div class="col-8" style="text-align: right;">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row ml-5">
                            <div class="col-8" style="text-align: right;">
                                <h6>

                                    <?= $user['nama']; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style type="text/css" media="print">
    @page {
        size: landscape;
    }
</style>
<script>
    window.load = print_d();

    function print_d() {
        window.print();
    }
</script>