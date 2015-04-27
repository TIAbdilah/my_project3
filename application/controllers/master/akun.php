<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 10 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun extends CI_Controller {

    var $akun = array(); 
    
    public function __construct() {
        parent::__construct();
        $this->load->model('akun_model');
        $this->akun = array(
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role')
        );
    }

    public function index() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/akun/list';
        $data['list_data'] = $this->akun_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {  
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/akun/view';
        $data['row'] = $this->akun_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/akun/add';
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/akun/edit';
        $data['row'] = $this->akun_model->select_by_id($id)->row();      
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['kode_akun'] = $this->input->post('inpKodeAkun');
        $data['jenis_belanja'] = $this->input->post('inpJenisBelanja');

        if ($action == 'add') {
            $this->akun_model->add($data);
        } else {
            $this->akun_model->edit($id, $data);
        }

        redirect('master/akun');
    }

    public function delete($id) {
        $this->akun_model->delete($id);
        redirect('master/akun');
    }
    
}

?>