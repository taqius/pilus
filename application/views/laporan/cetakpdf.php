    <table width="100%" style="border-bottom:double; border-width:9px; ">
        <tr>
            <td rowspan="4"><img src="<?= base_url('assets/images'); ?>/logo.png"></td>
            <td align="center">
                <h3>YAYASAN BINA NUSANTARA</h3>
            </td>
        </tr>
        <tr>
            <td align="center">
                <h2>SMK BINA NUSANTARA SEMARANG</h2>
            </td>
        </tr>
        <tr>
            <td align="center">Jl. Kemantren No. 5 Kel.Wonosari Kec.Ngaliyan, Kota Semarang</td>
        </tr>
        <tr>
            <td align="center">website : binusasmg.sch.id, WA : 081391501186</td>
        </tr>

    </table>

    <div align="right">
        Semarang, <?= date('d F Y'); ?>
    </div>
    <table>
        <tr>
            <td>No.</td>
            <td>:</td>
            <td><?= $nosurat; ?></td>
        </tr>
        <tr>
            <td>Lamp.</td>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Hal</td>
            <td>:</td>
            <td>Pemberitahuan</td>
        </tr>
    </table>
    <p> Kepada Yth,<br>
        Bapak / Ibu Orang Tua Wali Murid <br>
        <?= $siswa['nama'] ?><br>
        <?= 'Kelas ' . $kelas['tingkat'] . '-' . $kelas['jurusan'] . ' TA. ' . $tahun; ?><br>
        Di tempat</p>

    Assalamu'alaikum Wr. Wb.<br>
    &nbsp; &nbsp; &nbsp; &nbsp;Puji syukur kita panjatkan kehadirat Allah SWT atas limpahan karunia-Nya, semoga bapak / ibu selalu dalam lindungan-Nya. Bersama datangnya surat ini kami informasikan :
    <div>&nbsp;</div>
    <table align="center" width="75%">
        <tbody>
            <tr>
                <td colspan="2" align="center" style="font-weight: bold; font-size:15">
                    Kekurangan Biaya Pendidikan
                </td>
            </tr>
        </tbody>
    </table>
    <table align="center" width="60%" border="1" style="border: solid;">
        <tbody>
            <tr>
                <td style="width: 50%;" align="center">
                    Keterangan
                </td>
                <td style="width: 40%;" align="center">
                    Nominal
                </td>
            </tr>
            <?php $i = 0;
            foreach ($gunabayar as $g) :
                $idsiswa = $siswa['idsiswa'];
                $idgunabayar = $g['idgunabayar'];
                $this->db->select('pembayaran.wajibbayar,pembayaran.jumlahbayar,sum(pembayaran.jumlahbayar) as totalbayar');
                $this->db->from('pembayaran');
                $this->db->where('pembayaran.idsiswa', $idsiswa);
                $this->db->where('pembayaran.idgunabayar', $idgunabayar);
                $this->db->group_by('pembayaran.idsiswa');
                $tagihan = $this->db->get()->row_array();
            ?>
                <tr>
                    <td>
                        <?php
                        error_reporting(0);
                        if ($tagihan['jumlahbayar'] == null) {
                            echo $g['gunabayar'];
                        } else {
                            $total = $tagihan['wajibbayar'] - $tagihan['totalbayar'];
                            if ($total == 0) {
                            } else {
                                echo $g['gunabayar'];
                            }
                        }; ?>
                    </td>
                    <td>
                        <?php
                        error_reporting(0);
                        if ($tagihan['jumlahbayar'] == null) {
                            echo "Rp. " . number_format($g['wajibbayar'], 0, ".", ".") . ",-";
                        } else {
                            $total = $tagihan['wajibbayar'] - $tagihan['totalbayar'];
                            if ($total == 0) {
                            } else {
                                echo "Rp. " . number_format($total, 0, ".", ".") . ",-";
                            }
                        }; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php
            $nis = $siswa['nis'];
            $this->db->select('pembayaran.wajibbayar,pembayaran.jumlahbayar,gunabayar.gunabayar,sum(pembayaran.jumlahbayar) as totalbayar');
            $this->db->from('pembayaran', 'gunabayar');
            $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
            $this->db->where('pembayaran.nis', $nis);
            $this->db->where('pembayaran.idgunabayar=15');
            $this->db->group_by('pembayaran.nis');
            $tagihan = $this->db->get()->row_array();
            $g = $this->db->get_where('gunabayar', ['gunabayar' => 'Seragam'])->row_array();
            ?>
            <tr>
                <td>
                    <?php
                    error_reporting(0);
                    if ($tagihan['jumlahbayar'] == null) {
                        echo $g['gunabayar'];
                    } else {
                        $total = $tagihan['wajibbayar'] - $tagihan['totalbayar'];
                        if ($total == 0) {
                        } else {
                            echo $g['gunabayar'];
                        }
                    }; ?>
                </td>
                <td>
                    <?php
                    error_reporting(0);
                    if ($tagihan['jumlahbayar'] == null) {
                        echo "Rp. " . number_format($g['wajibbayar'], 0, ".", ".") . ",-";
                    } else {
                        $total = $tagihan['wajibbayar'] - $tagihan['totalbayar'];
                        if ($total == 0) {
                        } else {
                            echo "Rp. " . number_format($total, 0, ".", ".") . ",-";
                        }
                    }; ?>
                </td>
            </tr>
            <?php
            $nis = $siswa['nis'];
            $this->db->select('pembayaran.wajibbayar,pembayaran.jumlahbayar,gunabayar.gunabayar,sum(pembayaran.jumlahbayar) as totalbayar');
            $this->db->from('pembayaran', 'gunabayar');
            $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
            $this->db->where('pembayaran.nis', $nis);
            $this->db->where('pembayaran.idgunabayar=14');
            $this->db->group_by('pembayaran.nis');
            $tagihan = $this->db->get()->row_array();
            $g = $this->db->get_where('gunabayar', ['gunabayar' => 'Alat Praktek'])->row_array();
            ?>
            <tr>
                <td>
                    <?php
                    error_reporting(0);
                    if ($tagihan['jumlahbayar'] == null) {
                        echo $g['gunabayar'];
                    } else {
                        $total = $tagihan['wajibbayar'] - $tagihan['totalbayar'];
                        if ($total == 0) {
                        } else {
                            echo $g['gunabayar'];
                        }
                    }; ?>
                </td>
                <td>
                    <?php
                    error_reporting(0);
                    if ($tagihan['jumlahbayar'] == null) {
                        echo "Rp. " . number_format($g['wajibbayar'], 0, ".", ".") . ",-";
                    } else {
                        $total = $tagihan['wajibbayar'] - $tagihan['totalbayar'];
                        if ($total == 0) {
                        } else {
                            echo "Rp. " . number_format($total, 0, ".", ".") . ",-";
                        }
                    }; ?>
                </td>
            </tr>
            <?php
            $nis = $siswa['nis'];
            $this->db->select('pembayaran.wajibbayar,pembayaran.jumlahbayar,gunabayar.gunabayar,sum(pembayaran.jumlahbayar) as totalbayar');
            $this->db->from('pembayaran', 'gunabayar');
            $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
            $this->db->where('pembayaran.nis', $nis);
            $this->db->where('pembayaran.idgunabayar=13');
            $this->db->group_by('pembayaran.nis');
            $tagihan = $this->db->get()->row_array();
            $g = $this->db->get_where('gunabayar', ['gunabayar' => 'Uang Gedung'])->row_array();
            ?>
            <tr>
                <td>
                    <?php
                    error_reporting(0);
                    if ($tagihan['jumlahbayar'] == null) {
                        echo $g['gunabayar'];
                    } else {
                        $total = $tagihan['wajibbayar'] - $tagihan['totalbayar'];
                        if ($total == 0) {
                        } else {
                            echo $g['gunabayar'];
                        }
                    }; ?>
                </td>
                <td>
                    <?php
                    error_reporting(0);
                    if ($tagihan['jumlahbayar'] == null) {
                        echo "Rp. " . number_format($g['wajibbayar'], 0, ".", ".") . ",-";
                    } else {
                        $total = $tagihan['wajibbayar'] - $tagihan['totalbayar'];
                        if ($total == 0) {
                        } else {
                            echo "Rp. " . number_format($total, 0, ".", ".") . ",-";
                        }
                    }; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <div>
        &nbsp;
    </div>
    <p> Kami berdoa semoga bapak / ibu senantiasa diberikan kelapangan dan keberkahan rizki dan ilmu yang diperoleh anak-anak bermanfaat.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;Demikian pemberitahuan ini kami sampaikan, atas perhatian kami ucapkan terima kasih.<br>
        Wassalamu'alaikum Wr. Wb.</p>
    <div align="right">
        Kepala Sekolah,
    </div>
    <div align="right">
        <img src="<?= base_url('assets/images'); ?>/TTD BARCODE.jpeg" height="75" width="75"></td>
    </div>
    <div align="right">
        Eka Aribawa,S.Pd.I
    </div>
