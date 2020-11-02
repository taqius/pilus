<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        cek_loggin();
    }

    public function index()
    { //mengambil data user dari database user where username sama dengan session yang masuk
        $data['judul'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/wrapper', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="text-success">Menu Berhasil ditambahkan</div>');
            redirect('menu');
        }
    }
    public function submenu()
    {
        $data['judul'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['subMenu'] = $this->Menu_model->getSubmenu();
        $data['menu'] = $this->Menu_model->getAllMenu();
        $this->form_validation->set_rules('submenu', 'Submenu Name', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/wrapper', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('submenu'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="text-success">Sub Menu Berhasil ditambahkan</div>');
            redirect('menu/submenu');
        }
    }
    public function hapus($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
        $this->session->set_flashdata('flash', 'Menghapus Data');
        redirect('menu');
    }
    public function ubah()
    {
        $menu = $this->input->post('menu');
        $id = $this->input->post('id');
        $this->db->set('menu', $menu);
        $this->db->where('id', $id);
        $update = $this->db->update('user_menu');
        if ($update) {
            $this->session->set_flashdata('message', '<div class="text-success">Menu Edit Successfull</div>');
            redirect('menu');
        } else {
            $this->session->set_flashdata('message', '<div class="text-success">Menu Edit Failed</div>');
            redirect('menu');
        }
    }
    public function getubahsub()
    {
        echo json_encode($this->Menu_model->getSubmenuById($_POST['id']));
    }
    public function hapussub($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('flash', 'Menghapus Data');
        redirect('menu/submenu');
    }

    public function ubahsub()
    {

        if ($this->Menu_model->ubahDataSub($_POST) > 0) {
            $this->session->set_flashdata('message', '<div class="text-success">Sub Menu Edit Successfull</div>');
            redirect('menu/submenu');
        } else {
            $this->session->set_flashdata('message', '<div class="text-success">Sub Menu Edit Failed</div>');
            redirect('menu/submenu');
        }
    }
}
