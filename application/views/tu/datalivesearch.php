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
        <?php $i = 0;
        foreach ($pembayaran as $m) : ?>
            <tr>
                <th scope="row"><?= ++$i; ?></th>
                <td><?= date("d M Y", strtotime($m['tanggalbayar'])); ?></td>
                <td><?= $m['nama']; ?></td>
                <td><?= $m['tingkat'] . ' - ' . $m['jurusan']; ?></td>
                <td><?= $m['gunabayar']; ?></td>
                <td><?= "Rp. " . number_format($m['jumlahbayar'], 0, ".", ".") . ",-"; ?></td>
                <td>
                    <form method="POST" action="<?= base_url('laporan/print'); ?>">
                        <input type="hidden" name="id" value="<?= $m['idpembayaran']; ?>"><button class="btn btn-primary mb-1"><img src="<?= base_url('assets/images/printer.png'); ?>" class="img img-fluid img-sm"></button>
                        <a href="<?= base_url('tu/hapus'); ?>/<?= $m['idpembayaran']; ?>" class="btn btn-danger tombol-hapus"><i class="far fa-trash-alt"></i></a>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    // tombol-hapus
    $('.tombol-hapus').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');
        Swal({
            title: 'Apakah anda yakin',
            text: "data akan dihapus",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

    });
</script>