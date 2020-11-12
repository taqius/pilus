<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tu_model extends CI_model
{
    public function getAllPembayaran($jenisket, $nama)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'siswa.idsiswa=pembayaran.idsiswa');
        $this->db->join('kelas', 'kelas.idkelas=pembayaran.idkelas');
        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
        $this->db->where('gunabayar.jenisket', $jenisket);
        $this->db->like('siswa.nama', $nama);
        $this->db->order_by('idpembayaran', 'DESC');
        return $this->db->get()->result_array();
    }

    public function siswasearch($nama)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->like('nama', $nama);
        return $this->db->get()->result_array();
    }

    public function countAllPembayaran($jenisket)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'siswa.idsiswa=pembayaran.idsiswa');
        $this->db->join('kelas', 'kelas.idkelas=pembayaran.idkelas');
        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
        $this->db->where('gunabayar.jenisket', $jenisket);
        return $this->db->get()->num_rows();
    }
    public function getPembayaran($jenisket, $limit, $start)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'siswa.idsiswa=pembayaran.idsiswa');
        $this->db->join('kelas', 'kelas.idkelas=pembayaran.idkelas');
        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
        $this->db->where('gunabayar.jenisket', $jenisket);
        $this->db->order_by('idpembayaran', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    public function getPembayaranPrint($id)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'siswa.idsiswa=pembayaran.idsiswa');
        $this->db->join('kelas', 'kelas.idkelas=pembayaran.idkelas');
        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
        $this->db->where('pembayaran.idpembayaran', $id);
        return $this->db->get()->row_array();
    }
    public function getTagihan($id, $gunabayar, $jenisket)
    {
        $this->db->select('pembayaran.wajibbayar,pembayaran.tanggalbayar,gunabayar.gunabayar,sum(pembayaran.jumlahbayar) as totalbayar');
        $this->db->from('pembayaran', 'gunabayar');
        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
        $this->db->where('pembayaran.idsiswa', $id);
        $this->db->where('gunabayar.gunabayar', $gunabayar);
        $this->db->where('gunabayar.jenisket', $jenisket);
        $this->db->group_by('pembayaran.idsiswa');
        return $this->db->get()->row_array();
    }

    public function getTagihan2($nis, $gunabayar, $jenisket)
    {
        $this->db->select('pembayaran.wajibbayar,pembayaran.tanggalbayar,gunabayar.gunabayar,sum(pembayaran.jumlahbayar) as totalbayar');
        $this->db->from('pembayaran', 'gunabayar');
        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
        $this->db->where('pembayaran.nis', $nis);
        $this->db->where('gunabayar.gunabayar', $gunabayar);
        $this->db->where('gunabayar.jenisket', $jenisket);
        $this->db->group_by('pembayaran.nis');
        return $this->db->get()->row_array();
    }

    public function getKelas()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->order_by('tingkat', 'ASC');
        $this->db->order_by('jurusan', 'ASC');
        return $this->db->get()->result_array();
    }
    public function getKeterangan()
    {
        $query = "SELECT DISTINCT `ket`
        FROM `keterangan` ORDER BY idket ASC";
        return $this->db->query($query)->result_array();
    }

    public function getIdKelas($idkelas)
    {
        return $this->db->get_where('kelas', ['idkelas' => $idkelas])->row_array();
    }
    public function getSiswa()
    {
        return $this->db->get('siswa')->result_array();
    }
    public function getKelasBySiswa($id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.idkelas=siswa.idkelas');
        $this->db->where('siswa.idsiswa', $id);
        $this->db->order_by('siswa.nama', 'ASC');
        return $this->db->get()->row_array();
    }
    public function getSiswaByKelas()
    {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        return $this->db->order_by('nama', 'ASC')->get_where('siswa', ['idkelas' => $id, 'tahun' => $tahun])->result_array();
    }
    public function getSiswaById($id)
    {
        $id = $this->input->post('id');
        $query = "SELECT * FROM `siswa` WHERE `idsiswa`='$id'";
        return $this->db->query($query)->row_array();
    }
    public function getTahun()
    {
        $query = "SELECT DISTINCT `tahun`
                FROM `siswa` ORDER BY tahun ASC";
        return $this->db->query($query)->result_array();
    }

    public function getSiswaByTahun($id, $tahun)
    {
        $query = "SELECT * FROM `siswa`
                WHERE `idkelas`='$id' AND `tahun`='$tahun' ORDER BY `nama`";
        return $this->db->query($query)->result();
    }
    public function getAllGunaBayar()
    {
        return $this->db->get('gunabayar')->result_array();
    }

    public function getAllGunaBayar2()
    {
        $pdf = '';
        return $this->db->get_where('gunabayar', ['pdf' => $pdf])->result_array();
    }
    public function getGunaBayar($jenisket)
    {
        $this->db->select('*');
        $this->db->from('gunabayar');
        $this->db->where('jenisket', $jenisket);
        return $this->db->get()->result_array();
    }

    public function getGunaBayarKet($ket)
    {
        $this->db->select('*');
        $this->db->from('gunabayar');
        $this->db->where('ket', $ket);
        return $this->db->get()->result_array();
    }
    public function getGunaBayarByCheck($idgunabayar)
    {
        $this->db->select('*');
        $this->db->from('gunabayar');
        $this->db->where_in('idgunabayar', $idgunabayar);
        return $this->db->get()->result_array();
    }
    public function getGunaBayarById($id)
    {
        $query = "SELECT * FROM `gunabayar` WHERE `idgunabayar`='$id'";
        return $this->db->query($query)->row_array();
    }


    public function getPengeluaran($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->order_by('idpengeluaran', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }
    public function countAllPengeluaran()
    {
        return $this->db->get('pengeluaran')->num_rows();
    }
    public function getHapusPengeluaran($id)
    {
        $this->db->delete('pengeluaran', ['idpengeluaran' => $id]);
    }
    public function cariPengeluaran($tanggal1, $tanggal2)
    {
        $query = "SELECT * FROM pengeluaran
                    WHERE tanggalsimpan BETWEEN '$tanggal1' AND '$tanggal2'";
        return $this->db->query($query)->result_array();
    }
    public function totalPengeluaran($tanggal1, $tanggal2)
    {
        $query = "SELECT SUM(jumlahbayar) AS total FROM pengeluaran
                    WHERE tanggalsimpan BETWEEN '$tanggal1' AND '$tanggal2'";
        return $this->db->query($query)->row_array();
    }
    public function cariPemasukan($tanggal1, $tanggal2, $ket)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'siswa.idsiswa=pembayaran.idsiswa');
        $this->db->join('kelas', 'kelas.idkelas=pembayaran.idkelas');
        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
        $this->db->where('pembayaran.tanggalbayar BETWEEN "' . date('Y-m-d', strtotime($tanggal1)) . '" and "' . date('Y-m-d', strtotime($tanggal2)) . '"');
        $this->db->where('gunabayar.ket', $ket);
        return $this->db->get()->result_array();
    }
    public function totalPemasukan($tanggal1, $tanggal2, $ket)
    {

        $this->db->select('SUM(pembayaran.jumlahbayar) AS total');
        $this->db->from('pembayaran');
        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
        $this->db->where('gunabayar.ket', $ket);
        $this->db->where('pembayaran.tanggalbayar BETWEEN "' . date('Y-m-d', strtotime($tanggal1)) . '" and "' . date('Y-m-d', strtotime($tanggal2)) . '"');
        $this->db->group_by('gunabayar.ket');
        return $this->db->get()->row_array();
    }

    public function totalPengeluaranBulan()
    {
        $bulan = gmdate("m");
        $tahun = gmdate('Y');
        $query = "SELECT SUM(jumlahbayar) AS total FROM pengeluaran
                    WHERE MONTH(tanggalsimpan) ='$bulan'
		 AND  YEAR(tanggalsimpan) ='$tahun'";
        return $this->db->query($query)->row_array();
    }

    public function totalPemasukanBulan()
    {
        $jenisket = 'SPP';
        $bulan = gmdate('m');
        $tahun = gmdate('Y');
        $this->db->select('SUM(pembayaran.jumlahbayar) AS total');
        $this->db->from('pembayaran');
        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
        $this->db->where('gunabayar.jenisket', $jenisket);
        $this->db->where('MONTH(pembayaran.tanggalbayar)', $bulan);
        $this->db->where('YEAR(pembayaran.tanggalbayar)', $tahun);
        $this->db->group_by('gunabayar.jenisket');
        return $this->db->get()->row_array();
    }
    public function totalPemasukanBulanSPP()
    {
        $ket = '1';
        $bulan = gmdate('m');
        $tahun = gmdate('Y');
        $this->db->select('SUM(pembayaran.jumlahbayar) AS total');
        $this->db->from('pembayaran');
        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
        $this->db->where('gunabayar.ket', $ket);
        $this->db->where('MONTH(pembayaran.tanggalbayar)', $bulan);
        $this->db->where('YEAR(pembayaran.tanggalbayar)', $tahun);
        $this->db->group_by('gunabayar.ket');
        return $this->db->get()->row_array();
    }
    public function totalPemasukanBulanNonSPP()
    {
        $ket = '2';
        $bulan = gmdate('m');
        $tahun = gmdate('Y');
        $this->db->select('SUM(pembayaran.jumlahbayar) AS total');
        $this->db->from('pembayaran');
        $this->db->join('gunabayar', 'gunabayar.idgunabayar=pembayaran.idgunabayar');
        $this->db->where('gunabayar.ket', $ket);
        $this->db->where('MONTH(pembayaran.tanggalbayar)', $bulan);
        $this->db->where('YEAR(pembayaran.tanggalbayar)', $tahun);
        $this->db->group_by('gunabayar.ket');
        return $this->db->get()->row_array();
    }



    public function getHapus($id)
    {
        $this->db->delete('pembayaran', ['idpembayaran' => $id]);
    }
    public function getHapusSiswa($id)
    {
        $this->db->delete('siswa', ['idsiswa' => $id]);
    }
    public function getHapusKelas($id)
    {
        $this->db->delete('kelas', ['idkelas' => $id]);
    }
    public function getHapusGunaBayar($id)
    {
        $this->db->delete('gunabayar', ['idgunabayar' => $id]);
    }
}
