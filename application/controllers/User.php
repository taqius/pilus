<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['judul'] = 'My Profile';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wrapper', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Edit Profile';
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/wrapper', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            //cek jika ganti gambar
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/images/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_image);
                    }


                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('nama', $nama);
            $this->db->where('username', $username);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated !</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        //mengambil data user dari database user where username sama dengan session yang masuk
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Change Password';

        $this->form_validation->set_rules('currentpassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newpassword1', 'New Password', 'required|trim|min_length[6]|matches[newpassword2]');
        $this->form_validation->set_rules('newpassword2', 'New Password', 'required|trim|min_length[6]|matches[newpassword1]');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/wrapper', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $currentpassword = $this->input->post('currentpassword');
            $newpassword = $this->input->post('newpassword1');
            if (!password_verify($currentpassword, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password !</div>');
                redirect('user/changepassword');
            } else {
                if ($currentpassword == $newpassword) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password Cannot same with Current Password !</div>');
                    redirect('user/changepassword');
                } else {
                    $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $data['user']['username']);
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Has Been Changed !</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
