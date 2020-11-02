<label>Data Administrasi Siswa Kelas : </label>
<label>
    <?php
    error_reporting(0);
    echo $kelas['tingkat'] . ' - ' . $kelas['jurusan'] . ' Tahun Ajaran ' . $tahun;
    ?>
</label>
<table id="tabellaporan2" class="table table-responsive table-bordered table-striped" style="width: max-content;">
    <thead>
        <th>#</th>
        <th>Nama</th>
        <th>
            <?= $idgunabayar['gunabayar']; ?>
        </th>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($siswa as $s) : ?>
            <tr>
                <td><?= ++$i; ?></td>
                <td><?= $s['nama']; ?></td>
                <td>
                    <?php
                    $idguna = $idgunabayar['idgunabayar'];
                    $idsiswa = $s['idsiswa'];
                    $tahun = $tahun;
                    $query = "SELECT SUM(`pembayaran`.`jumlahbayar`) AS total
                        FROM `pembayaran`,`siswa`,`gunabayar`
                        WHERE `pembayaran`.`idsiswa`=`siswa`.`idsiswa`
                        AND `pembayaran`.`idgunabayar`=`gunabayar`.`idgunabayar`
                        AND `siswa`.`idsiswa`='$idsiswa'
                        AND `pembayaran`.`tahun` ='$tahun'
                        AND `pembayaran`.`idgunabayar`='$idguna'";
                    $data = $this->db->query($query)->row_array();
                    echo "Rp. " . number_format($data['total'], 0, ".", ".") . ",-";
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>