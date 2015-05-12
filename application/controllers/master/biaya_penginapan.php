<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_penginapan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('master/biaya_penginapan_model');
        $this->load->model('master/kota_tujuan_model');
        $this->load->model('master/listcode_model');
        $this->is_logged_in();
    }

    public function index() {        
        $data['title'] = "e-satker | Biaya Penginapan";
        $data['page'] = 'admin/master/biaya_penginapan/list';
        $data['list_data'] = $this->biaya_penginapan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['title'] = "e-satker | Biaya Penginapan";
        $data['page'] = 'admin/master/biaya_penginapan/view';
        $data['row'] = $this->biaya_penginapan_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | Biaya Penginapan";
        $data['page'] = 'admin/master/biaya_penginapan/add';
        $data['SIList_kota'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_golongan'] = $this->listcode_model->select_by_field('list_name','Golongan (Biaya Penginapan)')->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Biaya Penginapan";
        $data['page'] = 'admin/master/biaya_penginapan/edit';
        $data['row'] = $this->biaya_penginapan_model->select_by_id($id)->row();
        $data['SIList_kota'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_golongan'] = $this->listcode_model->select_by_field('list_name','Golongan (Biaya Penginapan)')->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['nama_kota'] = $this->input->post('inpNamaKota');
        $data['golongan'] = $this->input->post('inpGolongan');
        $data['biaya'] = $this->input->post('inpBiaya');

        if ($action == 'add') {
            $this->biaya_penginapan_model->add($data);
        } else {
            $this->biaya_penginapan_model->edit($id, $data);
        }

        redirect('master/biaya_penginapan');
    }

    public function delete($id) {
        $this->biaya_penginapan_model->delete($id);
        redirect('master/biaya_penginapan');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>