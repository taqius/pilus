<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user != null) {
            // $password dari input login, $user[password] berasal dari database
            if (password_verify($password, $user['password'])) {
                //menyimpan data ke halaman setelah login
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id']
                ];
                //set session dengan user data dari $data array di atas ini
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else {

                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ada !</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah dipakai'
        ]);
        $this->form_validation->set_rules('password1', 'Passwrod', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Passwrod', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('flash', 'Mendaftar');
            redirect('auth');
        }
    }
    public function logout()
    {

        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Logout!</div>');
        redirect('auth');
    }
    public function blocked()
    {
        $data['judul'] = 'Forbidden';
        $this->load->view('templates/header', $data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/footer');
    }
}
