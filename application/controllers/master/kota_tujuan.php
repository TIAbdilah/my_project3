<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kota_tujuan extends CI_Controller {

    var $akun = array(); 
    
    public function __construct() {
        parent::__construct();
        $this->load->model('kota_tujuan_model');
        $this->akun = array(
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role')
        );
    }

    public function index() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Kota Tujuan";
        $data['page'] = 'admin/kota_tujuan/list';
        $data['list_data'] = $this->kota_tujuan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Kota Tujuan";
        $data['page'] = 'admin/kota_tujuan/view';
        $data['row'] = $this->kota_tujuan_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Kota Tujuan";
        $data['page'] = 'admin/kota_tujuan/add';
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Kota Tujuan";
        $data['page'] = 'admin/kota_tujuan/edit';
        $data['row'] = $this->kota_tujuan_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['kode_wilayah'] = $this->input->post('inpKodeWilayah');
        $data['nama_provinsi'] = $this->input->post('inpNamaProvinsi');
        $data['nama_kota'] = $this->input->post('inpNamaKota');
        
        if ($action == 'add') {
            $this->kota_tujuan_model->add($data);
        } else {
            $this->kota_tujuan_model->edit($id, $data);
        }

        redirect('master/kota_tujuan');
    }

    public function delete($id) {
        $this->kota_tujuan_model->delete($id);
        redirect('master/kota_tujuan');
    }

}

?>