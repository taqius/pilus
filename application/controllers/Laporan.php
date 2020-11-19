<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tu_model');
        cek_loggin();
    }
    public function laporan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Laporan SPP';
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['tahun'] = $this->Tu_model->getTahun();
        $jenisket = 'SPP';
        $data['gunabayar'] = $this->Tu_model->getGunaBayar($jenisket);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('laporan/laporan', $data);
        $this->load->view('templates/footer');
    }
    public function laporannon()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Laporan Non-SPP';
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['tahun'] = $this->Tu_model->getTahun();
        $jenisket = 'Non-SPP';
        $data['gunabayar'] = $this->Tu_model->getGunaBayar($jenisket);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('laporan/laporannon', $data);
        $this->load->view('templates/footer');
    }
    public function lappembayaran()
    {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $gunabayar = $this->input->post('gunabayar');
        $data['siswa'] = $this->Tu_model->getSiswaByKelas($id, $tahun);
        $data['tahun'] = $tahun;
        $jenisket = 'Non-SPP';
        $data['gunabayar'] = $this->Tu_model->getGunaBayar($jenisket);
        $data['kelas'] = $this->Tu_model->getIdKelas($id);
        $data['idgunabayar'] = $this->Tu_model->getGunaBayarById($gunabayar);
        $this->load->view('laporan/lappembayaran', $data);
    }
    public function sppkelas()
    {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $data['siswa'] = $this->Tu_model->getSiswaByKelas($id, $tahun);
        $data['tahun'] = $tahun;
        $ket1 = '1';
        $ket2 = '2';
        $data['gunabayar1'] = $this->Tu_model->getGunaBayarKet($ket1);
        $data['gunabayar2'] = $this->Tu_model->getGunaBayarKet($ket2);
        $data['kelas'] = $this->Tu_model->getIdKelas($id);
        $this->load->view('laporan/sppkelas', $data);
    }
    public function keuangannontu()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pemasukan'] = $this->Tu_model->totalPemasukanBulan();
        $data['SPP'] = $this->Tu_model->totalPemasukanBulanSPP();
        $data['NonSPP'] = $this->Tu_model->totalPemasukanBulanNonSPP();
        $data['pengeluaran'] = $this->Tu_model->totalPengeluaranBulan();
        $data['judul'] = 'Keuangan Non-TU';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('laporan/keuangannontu', $data);
        $this->load->view('templates/footer');
    }

    public function print()
    {
        $id = $this->input->post('id');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Print Pembayaran';
        $data['pembayaran'] = $this->Tu_model->getPembayaranPrint($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('laporan/print', $data);
        // $this->load->view('templates/footer');
    }
    //view Cetak PDF
    public function tocetak()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Cetak PDF';
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['tahun'] = $this->Tu_model->getTahun();
        $data['gunabayar'] = $this->Tu_model->getAllGunaBayar2();
        $data['keterangan'] = $this->Tu_model->getKeterangan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('laporan/tocetak', $data);
        $this->load->view('templates/footer');
    }
    public function tocetak2()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Cetak PDF';
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $nosurat = $this->input->post('nosurat', true);
        $idgunabayar = $this->input->post('gunabayartoprint[]');
        $data['kelas'] = $this->Tu_model->getIdKelas($id);
        $data['siswa'] = $this->Tu_model->getSiswaByKelas($id, $tahun);
        $data['tahun'] = $tahun;
        $data['nosurat'] = $nosurat;
        $data['gunabayar'] = $this->Tu_model->getGunaBayarByCheck($idgunabayar);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('laporan/tocetak2', $data);
        $this->load->view('templates/footer');
    }
    //View PDF
    public function cetakpdf()
    {

        $idgunabayar = $this->input->post('gunabayartoprint[]');
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $nosurat = $this->input->post('nosurat');
        $data['nosurat'] = $nosurat;
        $data['tahun'] = $tahun;
        $data['kelas'] = $this->Tu_model->getKelasBySiswa($id);
        $data['siswa'] = $this->Tu_model->getSiswaById($id);
        $data['gunabayar'] = $this->Tu_model->getGunaBayarByCheck($idgunabayar);
        $html = $this->load->view('laporan/cetakpdf', $data, true);
        $nama = $data['siswa']['nama'];
        // Create an instance of the class:
        $this->mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $this->mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $this->mpdf->Output('Tagihan ' . $nama . '.pdf', \Mpdf\Output\Destination::DOWNLOAD);
    }
    //VIEWDATA GUNA BAYAR
    public function gunabayar()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Guna Bayar';
        $jenisket = 'Non-SPP';
        $data['gunabayar'] = $this->Tu_model->getGunaBayar($jenisket);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('laporan/gunabayar', $data);
        $this->load->view('templates/footer');
    }
    public function addgunabayar()
    {
        $data = [
            'gunabayar' => htmlspecialchars($this->input->post('gunabayar', true)),
            'wajibbayar' => htmlspecialchars($this->input->post('wajibbayar', true)),
            'jenisket' => 'Non-SPP'
        ];
        $this->db->insert('gunabayar', $data);
        $this->session->set_flashdata('flash', 'Add Guna Bayar');
        redirect('laporan/gunabayar');
    }

    public function editgunabayar()
    {
        $id = $this->input->post('id');
        $data = [
            'gunabayar' => htmlspecialchars($this->input->post('gunabayar', true)),
            'wajibbayar' => htmlspecialchars($this->input->post('wajibbayar', true))
        ];
        $this->db->where('idgunabayar', $id);
        $update = $this->db->update('gunabayar', $data);
        if ($update) {
            $this->session->set_flashdata('message', '<div class="text-success">Edit Guna Bayar Successfull</div>');
            redirect('laporan/gunabayar');
        } else {
            $this->session->set_flashdata('message', '<div class="text-success">Edit Guna Bayar Failed</div>');
            redirect('laporan/gunabayar');
        }
    }

    public function hapusgunabayar($id)
    {
        $this->Tu_model->getHapusGunaBayar($id);
        $this->session->set_flashdata('flash', 'Menghapus Guna Bayar');
        redirect('laporan/gunabayar');
    }
    public function carisiswa()
    {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $data = $this->Tu_model->getSiswaByTahun($id, $tahun);
        echo json_encode($data);
    }
}
