<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('master/users_model');
    }

    public function index() {
        if ($this->session->userdata('is_login')) {
            redirect('admin/home');
        } else {
            $data['title'] = "Login | e-satker";
            
            $this->load->view('public/login', $data);
        }
    }

    public function process_login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $row_count = $this->users_model->checkUser($username, $password)->num_rows();        
            if ($row_count == 1) {
                $row = $this->users_model->select_by_field('username', $username)->row();        
                $sessionData['username'] = $row->username;
                $sessionData['role'] = $row->nama_role;
                $sessionData['is_login'] = TRUE;

                $this->session->set_userdata($sessionData);
                redirect('admin/home');
//                if ($this->session->userdata('id_jenis_pengguna') == 1) {
//                    redirect('admin/homes');
//                } else {
//                    redirect('admin/homes');
//                }
            } else {
                $this->session->set_flashdata('message', 'Login Gagal!, username atau password salah ' . $this->session->userdata('id_jenis_pengguna'));
//                redirect('login', $data);
                $this->load->view('public/login');
            }
        } else {
            $this->session->set_flashdata('message', 'Login Gagal!, username atau password salah ');
            $data['title'] = "Login | e-satker";
            $this->load->view('public/login', $data);
        }
    }

    public function process_logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
