<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komentar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/komentar_model');
        $this->is_logged_in();
    }
    
    public function index() {        
        $data['page'] = 'admin/transaksi/komentar/list';
        $data['list_data'] = $this->komentar_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {
        $data['id_header'] = $this->input->post('inHeader');
        $data['username'] = $this->input->post('inUsername');
        $data['komentar'] = $this->input->post('inKomentar');

        if ($action == 'add') {
            $this->komentar_model->add($data);
        } else {
            $this->komentar_model->edit($id, $data);
        }

        redirect('transaksi/perjalanandinas');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>