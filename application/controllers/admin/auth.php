<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    var $role;
    var $username;

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function index() {
         if($this->session->userdata('login_status')) {
            redirect('home');
        } else {
            $data['title'] = "Login";
            $this->load->view('login', $data);
        }

        $this->validasi();
    }

    public function validasi($username, $password) {
//        $username = $this->input->post('username');
//        $password = $this->input->post('password');
        
        $row_count = $this->users_model->checkUser($username, $password)->num_rows();        

        if ($row_count == 1) {
            $row = $this->users_model->select_by_field('username', $username)->row();        
            $data['role_name'] = $row->nama_role;
            $data['username'] = $row->username;
            $this->session->set_userdata($data);
            redirect('admin/home');
        } else {           
            redirect('admin/auth');
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

}
