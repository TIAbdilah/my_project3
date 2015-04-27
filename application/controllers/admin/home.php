<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    var $akun = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('transaksiperjalanandinasheader_model');
        $this->akun = array(
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role')
        );
    }

    public function index() {
        $data['title'] = "e-satker | Home";
        $data['akun'] = $this->akun;
        $inRole = $this->akun['role'];
        $data['list_data'] = $this->transaksiperjalanandinasheader_model->select_all_by_role($inRole)->result();
        $this->load->view('admin/index', $data);
    }

}

?>