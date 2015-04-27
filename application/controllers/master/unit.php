<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Unit extends CI_Controller {

    var $akun = array(); 
    
    public function __construct() {
        parent::__construct();
        $this->load->model('unit_model');
        $this->load->model('pegawai_model');
        $this->akun = array(
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role')
        );
    }

    public function index() {        
        $data['title'] = "e-satker | Unit";
        $data['page'] = 'admin/master/unit/list';
        $data['list_data'] = $this->unit_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['title'] = "e-satker | Unit";
        $data['page'] = 'admin/master/unit/view';
        $data['row'] = $this->unit_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | Unit";
        $data['page'] = 'admin/master/unit/add';
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Unit";
        $data['page'] = 'admin/master/unit/edit';
        $data['row'] = $this->unit_model->select_by_id($id)->row();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['kode_unit'] = $this->input->post('inpKodeUnit');
        $data['nama_unit'] = $this->input->post('inpNamaUnit');
        $data['kepala'] = $this->input->post('inpKepala');
        
        if ($action == 'add') {
            $this->unit_model->add($data);
        } else {
            $this->unit_model->edit($id, $data);
        }

        redirect('master/unit');
    }

    public function delete($id) {
        $this->unit_model->delete($id);
        redirect('master/unit');
    }

}

?>