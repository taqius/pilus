<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tu_model extends CI_model
{
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
        return $this->db->get_where('siswa', ['idkelas' => $id, 'tahun' => $tahun])->result_array();
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
