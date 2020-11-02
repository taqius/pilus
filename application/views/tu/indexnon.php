<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- Default box -->
                <div class="card">
                    <!-- <div class="card-header">
                        <div class="card-title text-light mt-3 ml-3">
                            <a class="btn btn-primary addpembayaran" data-toggle="modal" data-target="#pembayaranModal">Add <i class="fas fa-plus"></i></a>
                        </div>
                    </div> -->

                    <div class="card-body">
                        <?= form_error('menu', '<div class="text-danger">', '</div>');

                        ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                        </div>
                        <table class="table table-bordered table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tgl Bayar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Guna Bayar</th>
                                    <th scope="col">Jml Bayar</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pembayaran as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$start; ?></th>
                                        <td><?= date("d M Y", strtotime($m['tanggalbayar'])); ?></td>
                                        <td><?= $m['nama']; ?></td>
                                        <td><?= $m['tingkat'] . ' - ' . $m['jurusan']; ?></td>
                                        <td><?= $m['gunabayar']; ?></td>
                                        <td><?= "Rp. " . number_format($m['jumlahbayar'], 0, ".", ".") . ",-"; ?></td>
                                        <td>
                                            <form method="POST" action="<?= base_url('laporan/print'); ?>">
                                                <input type="hidden" name="id" value="<?= $m['idpembayaran']; ?>"><button class="btn btn-primary mb-1"><img src="<?= base_url('assets/images/printer.png'); ?>" class="img img-fluid img-sm"></button>
                                                <!-- <a href="<?= base_url('tu/hapus'); ?>/<?= $m['idpembayaran']; ?>" class="btn btn-danger tombol-hapus"><i class="far fa-trash-alt"></i></a> -->
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $this->pagination->create_links(); ?>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->