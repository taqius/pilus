<label>Data Administrasi Siswa Kelas : </label>
<label>
    <?php
    error_reporting(0);
    echo $kelas['tingkat'] . ' - ' . $kelas['jurusan'] . ' Tahun Ajaran ' . $tahun;
    ?>
</label>
<table id="tabellaporan" class="table table-responsive table-bordered table-striped" style="width: max-content;">
    <thead>
        <th>#</th>
        <th>Nama</th>
        <?php foreach ($gunabayar as $tg) : ?>
            <th>
                <?= $tg['gunabayar']; ?>
            </th>
        <?php endforeach; ?>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($siswa as $s) : ?>
            <tr>
                <td><?= ++$i; ?></td>
                <td><?= $s['nama']; ?></td>
                <?php foreach ($gunabayar as $g) : ?>
                    <td>
                        <?php
                        $guna = $g['idgunabayar'];
                        $idsiswa = $s['idsiswa'];
                        $this->db->select('pembayaran.wajibbayar,pembayaran.tanggalbayar,gunabayar.gunabayar,sum(pembayaran.jumlahbayar) as total');
                        $this->db->from('pembayaran', 'gunabayar');
                        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
                        $this->db->where('pembayaran.idsiswa', $idsiswa);
                        $this->db->where('gunabayar.idgunabayar', $guna);
                        $this->db->group_by('pembayaran.idsiswa');
                        $data = $this->db->get()->row_array();
                        echo "Rp. " . number_format($data['total'], 0, ".", ".") . ",-";
                        ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>