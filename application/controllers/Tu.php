<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tu_model');
        cek_loggin();
    }
public function index2()
    {
        $jenisket = 'SPP';
        //mengambil data user dari database user where username sama dengan session yang masuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data SPP';
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['siswa'] = $this->Tu_model->getSiswa();
        //PAGINATION
        $this->load->library('pagination');
        $data['start'] = $this->uri->segment(3);
        $data['pembayaran'] = $this->Tu_model->getAllPembayaran($jenisket);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('tu/index', $data);
        $this->load->view('templates/footer');
    }
    //view index
    public function index()
    {
        $jenisket = 'SPP';
        //mengambil data user dari database user where username sama dengan session yang masuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data SPP';
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['siswa'] = $this->Tu_model->getSiswa();
        //PAGINATION
        $this->load->library('pagination');

        //config load library
        $config['base_url'] = 'http://192.168.3.2/tu/index';
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
        $this->load->view('tu/index', $data);
        $this->load->view('templates/footer');
    }
    //view data NON-SPP
    public function indexnon()
    {
        $jenisket = "Non-SPP";
        //mengambil data user dari database user where username sama dengan session yang masuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Non-SPP';
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['siswa'] = $this->Tu_model->getSiswa();
        //PAGINATION
        $this->load->library('pagination');

        //config load library
        $config['base_url'] = 'http://192.168.3.2/tu/indexnon';
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
        $this->load->view('tu/indexnon', $data);
        $this->load->view('templates/footer');
    }

    //view bayar
    public function bayar()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Bayar SPP';
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['tahun'] = $this->Tu_model->getTahun();
        $jenisket = 'SPP';
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
            $this->load->view('tu/bayar', $data);
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
            redirect('tu/bayar');
        }
    }

    //view data siswa
    public function datasiswa()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Siswa';
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['tahun'] = $this->Tu_model->getTahun();
        $data['keterangan'] = $this->Tu_model->getKeterangan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('tu/datasiswa', $data);
        $this->load->view('templates/footer');
    }
    public function addsiswa()
    {
        $data = [
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'idkelas' => htmlspecialchars($this->input->post('idkelasmodal', true)),
            'tahun' => htmlspecialchars($this->input->post('tahunmodal', true)),
            'ortu' => htmlspecialchars($this->input->post('ortu', true)),
            'ket' => htmlspecialchars($this->input->post('ket', true))
        ];
        $this->db->insert('siswa', $data);
        $this->session->set_flashdata('flash', 'Add Siswa');
        redirect('tu/datasiswa');
    }
    public function geteditsiswa()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Siswa';
        $id = $this->input->post('id', true);
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['kelas2'] = $this->Tu_model->getKelasBySiswa($id);
        $data['siswa'] = $this->Tu_model->getSiswaById($id);
        $data['keterangan'] = $this->Tu_model->getKeterangan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('tu/geteditsiswa', $data);
        $this->load->view('templates/footer');
    }
    public function editsiswa()
    {
        $id = $this->input->post('id');
        $data = [
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'idkelas' => htmlspecialchars($this->input->post('idkelasmodal', true)),
            'tahun' => htmlspecialchars($this->input->post('tahunmodal', true)),
            'ortu' => htmlspecialchars($this->input->post('ortu', true)),
            'ket' => htmlspecialchars($this->input->post('ket', true))
        ];
        // $this->db->set($data);
        $this->db->where('idsiswa', $id);
        $update = $this->db->update('siswa', $data);
        if ($update) {
            $this->session->set_flashdata('message', '<div class="text-success">Edit Siswa Successfull</div>');
            redirect('tu/datasiswa');
        } else {
            $this->session->set_flashdata('message', '<div class="text-success">Edit Siswa Failed</div>');
            redirect('tu/datasiswa');
        }
    }

    //view data kelas
    public function datakelas()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Data Kelas';
        $data['kelas'] = $this->Tu_model->getKelas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('tu/datakelas', $data);
        $this->load->view('templates/footer');
    }
    public function addkelas()
    {
        $data = [
            'tingkat' => htmlspecialchars($this->input->post('tingkat', true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true))
        ];
        $this->db->insert('kelas', $data);
        $this->session->set_flashdata('flash', 'Add Kelas');
        redirect('tu/datakelas');
    }
    public function editkelas()
    {
        $id = $this->input->post('id');
        $data = [
            'tingkat' => htmlspecialchars($this->input->post('tingkat', true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true))
        ];
        // $this->db->set($data);
        $this->db->where('idkelas', $id);
        $update = $this->db->update('kelas', $data);
        if ($update) {
            $this->session->set_flashdata('message', '<div class="text-success">Edit Kelas Successfull</div>');
            redirect('tu/datakelas');
        } else {
            $this->session->set_flashdata('message', '<div class="text-success">Edit Kelas Failed</div>');
            redirect('tu/datakelas');
        }
    }

    //END DATA SISWA DAN KELAS
    //VIEW NAIK KELAS
    public function naikkelas()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Naik Kelas';
        $data['kelas'] = $this->Tu_model->getKelas();
        $data['tahun'] = $this->Tu_model->getTahun();

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('idkelasbaru', 'Kelas Baru', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun Ajaran Lama', 'required');
        $this->form_validation->set_rules('tahunbaru', 'Tahun Ajaran Baru', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/wrapper', $data);
            $this->load->view('tu/naikkelas', $data);
            $this->load->view('templates/footer');
        } else {
            $idkelas = $this->input->post('idkelas', true);
            $tahun = $this->input->post('tahun', true);
            $query = "INSERT INTO siswasementara (nis,nama,idkelas,tahun,ortu) SELECT nis,nama,idkelas,tahun,ortu FROM siswa WHERE idkelas=$idkelas and tahun='$tahun'";
            $this->db->query($query);
            $idkelasbaru = $this->input->post('idkelasbaru', true);
            $tahunbaru = $this->input->post('tahunbaru', true);
            $this->db->set('idkelas', $idkelasbaru);
            $this->db->set('tahun', $tahunbaru);
            $this->db->where('idkelas', $idkelas);
            $this->db->update('siswasementara');
            $query2 = "INSERT INTO siswa (nis,nama,idkelas,tahun,ortu,ket) SELECT nis,nama,idkelas,tahun,ortu,ket FROM siswasementara";
            $this->db->query($query2);
            $this->db->empty_table('siswasementara');
            $this->session->set_flashdata('message', '<div class="text-success">Naik Kelas Successful</div>');
            redirect('tu/naikkelas');
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

public function tagihansiswa2()
    {
        $id = $this->input->post('id');
        $gunabayar = $this->input->post('gunabayar');
        $data['siswa'] = $this->Tu_model->getSiswaById($id);
        $nis = $data['siswa']['nis'];
        $jenisket = 'SPP';
        $data = $this->Tu_model->getTagihan2($nis, $gunabayar, $jenisket);
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
        redirect('tu');
    }
    public function hapussiswa($id)
    {
        $this->Tu_model->getHapusSiswa($id);
        $this->session->set_flashdata('flash', 'Menghapus Data');
        redirect('tu/datasiswa');
    }

    public function hapuskelas($id)
    {
        $this->Tu_model->getHapusKelas($id);
        $this->session->set_flashdata('flash', 'Menghapus Data');
        redirect('tu/datakelas');
    }

    public function gunakewajib()
    {
        $id = $this->input->post('id');
        $data = $this->Tu_model->getGunaBayarById($id);
        echo json_encode($data);
    }

//view pengeluaran
    public function pengeluaran()
    {
        //mengambil data user dari database user where username sama dengan session yang masuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Pengeluaran';
        //PAGINATION
        $this->load->library('pagination');

        //config load library
        $config['base_url'] = 'http://192.168.3.2/tu/pengeluaran';
        $config['total_rows'] = $this->Tu_model->countAllPengeluaran();
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
        $data['pengeluaran'] = $this->Tu_model->getPengeluaran($config['per_page'], $data['start']);
        $this->form_validation->set_rules('tanggalsimpan', 'Tanggal Simpan', 'required');
        $this->form_validation->set_rules('tanggalnota', 'Tanggal Nota', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('jumlahbayar', 'Jumlah Bayar', 'required|numeric|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/wrapper', $data);
            $this->load->view('tu/pengeluaran', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'tanggalsimpan' => $this->input->post('tanggalsimpan', true),
                'tanggalnota' => $this->input->post('tanggalnota', true),
                'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                'jumlahbayar' => htmlspecialchars($this->input->post('jumlahbayar', true))
            ];
            $this->db->insert('pengeluaran', $data);
            $this->session->set_flashdata('flash', 'Input Pengeluaran');
            redirect('tu/pengeluaran');
        }
    }
    public function hapuspengeluaran($id)
    {
        $this->Tu_model->getHapusPengeluaran($id);
        $this->session->set_flashdata('flash', 'Menghapus Data');
        redirect('tu/pengeluaran');
    }
    public function laporankeuangan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pemasukan'] = $this->Tu_model->totalPemasukanBulan();
        $data['SPP'] = $this->Tu_model->totalPemasukanBulanSPP();
        $data['NonSPP'] = $this->Tu_model->totalPemasukanBulanNonSPP();
	$data['pengeluaran'] = $this->Tu_model->totalPengeluaranBulan();
        $data['judul'] = 'Laporan Keuangan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('tu/laporankeuangan', $data);
        $this->load->view('templates/footer');
    }
    public function laporankeuangan2()
    {
        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');
        $pilihlaporan = $this->input->post('pilihlaporan');
        if ($pilihlaporan == "Pengeluaran") {
            $data['laporan'] = $this->Tu_model->cariPengeluaran($tanggal1, $tanggal2);
            $data['total'] = $this->Tu_model->totalPengeluaran($tanggal1, $tanggal2);
            $data['tanggal1'] = $tanggal1;
            $data['tanggal2'] = $tanggal2;
            $this->load->view('tu/laporankeuangan2', $data);
        } elseif ($pilihlaporan == "SPP") {
            $ket = '1';
            $data['laporan'] = $this->Tu_model->cariPemasukan($tanggal1, $tanggal2, $ket);
            $data['total'] = $this->Tu_model->totalPemasukan($tanggal1, $tanggal2, $ket);
            $data['tanggal1'] = $tanggal1;
            $data['tanggal2'] = $tanggal2;
            $this->load->view('tu/laporankeuangan3', $data);
        } elseif ($pilihlaporan == "Non-SPP") {
            $ket = '2';
            $data['laporan'] = $this->Tu_model->cariPemasukan($tanggal1, $tanggal2, $ket);
            $data['total'] = $this->Tu_model->totalPemasukan($tanggal1, $tanggal2, $ket);
            $data['tanggal1'] = $tanggal1;
            $data['tanggal2'] = $tanggal2;
            $this->load->view('tu/laporankeuangan3', $data);
        }
    }

    // UNUSED_SCRIPT BUT USEFULL
    //view laporan
    // public function laporan()
    // {
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['judul'] = 'Laporan SPP';
    //     $data['kelas'] = $this->Tu_model->getKelas();
    //     $data['tahun'] = $this->Tu_model->getTahun();
    //     $jenisket = 'SPP';
    //     $data['gunabayar'] = $this->Tu_model->getGunaBayar($jenisket);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/wrapper', $data);
    //     $this->load->view('tu/laporan', $data);
    //     $this->load->view('templates/footer');
    // }
    //vie sppkelas.php untuk javascript ajax laporan.hp
    // public function sppkelas()
    // {
    //     $id = $this->input->post('id');
    //     $tahun = $this->input->post('tahun');
    //     $data['siswa'] = $this->Tu_model->getSiswaByKelas($id, $tahun);
    //     $data['tahun'] = $tahun;
    //     $jenisket = 'SPP';
    //     $data['gunabayar'] = $this->Tu_model->getGunaBayar($jenisket);
    //     $data['kelas'] = $this->Tu_model->getIdKelas($id);
    //     $this->load->view('tu/sppkelas', $data);
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
    //     $this->load->view('tu/print', $data);
    //     // $this->load->view('templates/footer');
    // }
}
