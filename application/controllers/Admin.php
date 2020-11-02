<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_loggin();
    }

    public function index()
    {
        //mengambil data user dari database user where username sama dengan session yang masuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userrole'] = $this->db->get_where('user')->result_array();
        $data['role'] = $this->db->get_where('user_role')->result_array();
        $data['judul'] = 'User Role';
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah dipakai'
        ]);
        $this->form_validation->set_rules('password1', 'Passwrod', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Passwrod', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/wrapper', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', true)
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="text-success">User Berhasil ditambahkan</div>');
            redirect('admin');
        }
    }
    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['role'] = $this->db->get_where('user_role')->result_array();
        $data['judul'] = 'Role';
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/wrapper', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="text-success">User Role Berhasil ditambahkan</div>');
            redirect('admin/role');
        }
    }
    public function roleAccess($role_id)
    {
        $data['judul'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        // $this->db->where('id!=', 1);
        $data['menu'] = $this->db->get_where('user_menu', 'id!= 1')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed</div>');
    }
    public function hapus($id)
    {
        $this->db->delete('user', ['id' => $id]);
        $this->session->set_flashdata('flash', 'Menghapus Data');
        redirect('admin');
    }
    public function setrole()
    {
        $id = $this->input->post('id');
        $role_id = $this->input->post('role_id');
        $this->db->set('role_id', $role_id);
        $this->db->where('id', $id);
        $this->db->update('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Set Role Successfull</div>');
        redirect('admin');
    }
}
