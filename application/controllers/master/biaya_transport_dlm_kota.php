<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_transport_dlm_kota extends CI_Controller {

    var $akun = array(); 
    
    public function __construct() {
        parent::__construct();
        $this->load->model('biaya_transport_dlm_kota_model');
        $this->load->model('kota_tujuan_model');
        $this->load->model('listcode_model');
        $this->akun = array(
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role')
        );
    }

    public function index() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Biaya Transportasi Dalam Kota";
        $data['page'] = 'admin/biaya_transport_dlm_kota/list';
        $data['list_data'] = $this->biaya_transport_dlm_kota_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Biaya Transportasi Dalam Kota";
        $data['page'] = 'admin/biaya_transport_dlm_kota/view';
        $data['row'] = $this->biaya_transport_dlm_kota_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Biaya Transportasi Dalam Kota";
        $data['page'] = 'admin/biaya_transport_dlm_kota/add';
        $data['SIList_kota'] = $this->kota_tujuan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Biaya Transportasi Dalam Kota";
        $data['page'] = 'admin/biaya_transport_dlm_kota/edit';
        $data['row'] = $this->biaya_transport_dlm_kota_model->select_by_id($id)->row();
        $data['SIList_kota'] = $this->kota_tujuan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['nama_kota'] = $this->input->post('inpNamaKota');
        $data['biaya'] = $this->input->post('inpBiaya');

        if ($action == 'add') {
            $this->biaya_transport_dlm_kota_model->add($data);
        } else {
            $this->biaya_transport_dlm_kota_model->edit($id, $data);
        }

        redirect('master/biaya_transport_dlm_kota');
    }

    public function delete($id) {
        $this->biaya_transport_dlm_kota_model->delete($id);
        redirect('master/biaya_transport_dlm_kota');
    }

}

?>