<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_diklat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/biaya_diklat_model');
        $this->load->model('master/kota_tujuan_model');
        $this->load->model('master/listcode_model');
        $this->is_logged_in();
    }

    public function index() {        
        $data['title'] = "e-satker | Biaya Diklat";
        $data['page'] = 'admin/master/biaya_diklat/list';
        $data['list_data'] = $this->biaya_diklat_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['title'] = "e-satker | Biaya Diklat";
        $data['page'] = 'admin/master/biaya_diklat/view';
        $data['row'] = $this->biaya_diklat_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | Biaya Diklat";
        $data['page'] = 'admin/master/biaya_diklat/add';
        $data['SIList_kota'] = $this->kota_tujuan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Biaya Diklat";
        $data['page'] = 'admin/master/biaya_diklat/edit';
        $data['row'] = $this->biaya_diklat_model->select_by_id($id)->row();
        $data['SIList_kota'] = $this->kota_tujuan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['nama_provinsi'] = $this->input->post('inpNamaKota');
        $data['biaya'] = $this->input->post('inpBiaya');

        if ($action == 'add') {
            $this->biaya_diklat_model->add($data);
        } else {
            $this->biaya_diklat_model->edit($id, $data);
        }

        redirect('master/biaya_diklat');
    }

    public function delete($id) {
        $this->biaya_diklat_model->delete($id);
        redirect('master/biaya_diklat');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>