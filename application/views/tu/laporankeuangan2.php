<label>Data Laporan Pengeluaran : </label>
<label>
    <?php
    error_reporting(0);
    echo 'Mulai Tanggal : ' . date('d M Y', strtotime($tanggal1)) . ' Sampai Dengan : ' . date('d M Y', strtotime($tanggal2));
    ?>
</label>
<table id="tabellaporan" class="table table-responsive table-bordered table-striped" style="width: max-content;">
    <thead>
        <th>#</th>
        <th>Tanggal Simpan</th>
        <th>Tanggal Nota</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($laporan as $l) : ?>
            <tr>
                <td><?= ++$i; ?></td>
                <td><?= date('d M Y', strtotime($l['tanggalsimpan'])); ?></td>
                <td><?= date('d M Y', strtotime($l['tanggalnota'])); ?></td>
                <td><?= $l['keterangan']; ?></td>
                <td><?= "Rp. " . number_format($l['jumlahbayar'], 0, ".", ".") . ",-"; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4"><b>Total</b></td>
            <td><b><?= "Rp. " . number_format($total['total'], 0, ".", ".") . ",-"; ?></b>
            </td>
        </tr>
    </tbody>
</table>