<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NonTu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tu_model');
        cek_loggin();
    }
    //view index
    public function index()
    {
        $jenisket = "Non-SPP";
        //mengambil data user dari database user where username sama dengan session yang masuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Pembayaran';
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['siswa'] = $this->Tu_model->getSiswa();
        //PAGINATION
        $this->load->library('pagination');

        //config load library
        $config['base_url'] = 'http://localhost/pilus/tu/index';
        $config['total_rows'] = $this->Tu_model->countAllPembayaran($jenisket);
        $config['per_page'] = 10;
        $config['num_links'] = 5;

        //styling pagination
        $config['full_tag_open'] = '<nav>
        <ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');



        //initialize
        $this->pagination->initialize($config);



        $data['start'] = $this->uri->segment(3);
        $data['pembayaran'] = $this->Tu_model->getPembayaran($jenisket, $config['per_page'], $data['start']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('nontu/index', $data);
        $this->load->view('templates/footer');
    }
    //view bayar
    public function pembayaran()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Pembayaran';
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['tahun'] = $this->Tu_model->getTahun();
        $jenisket = 'Non-SPP';
        $data['gunabayar'] = $this->Tu_model->getGunaBayar($jenisket);
        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('idsiswa', 'Siswa', 'required');
        $this->form_validation->set_rules('idgunabayar', 'Guna Bayar', 'required');
        $this->form_validation->set_rules('jumlahbayar', 'Jumlah Bayar', 'required|numeric|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/wrapper', $data);
            $this->load->view('nontu/bayar', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'tanggalbayar' => $this->input->post('tanggalbayar', true),
                'idkelas' => $this->input->post('idkelas', true),
                'tahun' => $this->input->post('tahun', true),
                'idsiswa' => $this->input->post('idsiswa', true),
                'nis' => $this->input->post('nis', true),
                'idgunabayar' => $this->input->post('idgunabayar', true),
                'wajibbayar' => $this->input->post('wajibbayar', true),
                'jumlahbayar' => htmlspecialchars($this->input->post('jumlahbayar', true)),
            ];
            $this->db->insert('pembayaran', $data);
            $this->session->set_flashdata('flash', 'Proses Pembayaran');
            redirect('nontu/pembayaran');
        }
    }
    public function carisiswa()
    {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $data = $this->Tu_model->getSiswaByTahun($id, $tahun);
        echo json_encode($data);
    }
    public function carisiswabykelas()
    {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $data = $this->Tu_model->getSiswaByTahun($id, $tahun);
        echo json_encode($data);
    }
    public function idsiswa()
    {
        $id = $this->input->post('id');
        $data = $this->Tu_model->getSiswaById($id);
        echo json_encode($data);
    }

    public function tagihansiswa()
    {
        $id = $this->input->post('id');
        $gunabayar = $this->input->post('gunabayar');
        $jenisket = 'SPP';
        $data = $this->Tu_model->getTagihan($id, $gunabayar, $jenisket);
        if (!empty($data)) {
            echo json_encode($data);
        } else {
            echo json_encode(null);
        }
    }

    public function hapus($id)
    {
        $this->Tu_model->getHapus($id);
        $this->session->set_flashdata('flash', 'Menghapus Data');
        redirect('nontu');
    }

    public function gunakewajib()
    {
        $id = $this->input->post('id');
        $data = $this->Tu_model->getGunaBayarById($id);
        echo json_encode($data);
    }
    //UNUSED SCRIPT BUT USEFULL
    //view laporan
    // public function laporan()
    // {
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['judul'] = 'Laporan Non-SPP';
    //     $data['kelas'] = $this->Tu_model->getKelas();
    //     $data['tahun'] = $this->Tu_model->getTahun();
    //     $jenisket = 'Non-SPP';
    //     $data['gunabayar'] = $this->Tu_model->getGunaBayar($jenisket);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/wrapper', $data);
    //     $this->load->view('nontu/laporan', $data);
    //     $this->load->view('templates/footer');
    // }
    //view lappembayaran.php untuk javascript ajax laporan.php
    // public function lappembayaran()
    // {
    //     $id = $this->input->post('id');
    //     $tahun = $this->input->post('tahun');
    //     $data['siswa'] = $this->Tu_model->getSiswaByKelas($id, $tahun);
    //     $data['tahun'] = $tahun;
    //     $jenisket = 'Non-SPP';
    //     $data['gunabayar'] = $this->Tu_model->getGunaBayar($jenisket);
    //     $data['kelas'] = $this->Tu_model->getIdKelas($id);
    //     $this->load->view('nontu/lappembayaran', $data);
    // }
    // public function print()
    // {
    //     $id = $this->input->post('id');
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['judul'] = 'Print SPP';
    //     $data['pembayaran'] = $this->Tu_model->getPembayaranPrint($id);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/wrapper', $data);
    //     $this->load->view('nontu/print', $data);
    // }
}
