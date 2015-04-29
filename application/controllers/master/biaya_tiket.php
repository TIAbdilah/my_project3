<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_tiket extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('master/biaya_tiket_model');
        $this->load->model('master/kota_tujuan_model');
        $this->load->model('master/listcode_model');
        $this->is_logged_in();
    }

    public function index() {        
        $data['title'] = "e-satker | Biaya Tiket";
        $data['page'] = 'admin/master/biaya_tiket/list';
        $data['list_data'] = $this->biaya_tiket_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['title'] = "e-satker | Biaya Tiket";
        $data['page'] = 'admin/master/biaya_tiket/view';
        $data['row'] = $this->biaya_tiket_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | Biaya Tiket";
        $data['page'] = 'admin/master/biaya_tiket/add';
        $data['SIList_kota'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_jenisKendaraan'] = $this->listcode_model->select_by_field('list_name','Jenis Kendaraan')->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Biaya Tiket";
        $data['page'] = 'admin/master/biaya_tiket/edit';
        $data['row'] = $this->biaya_tiket_model->select_by_id($id)->row();
        $data['SIList_kota'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_jenisKendaraan'] = $this->listcode_model->select_by_field('list_name','Jenis Kendaraan')->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['kota_asal'] = $this->input->post('inpKotaAsal');
        $data['kota_tujuan'] = $this->input->post('inpKotaTujuan');
        $data['jenis_kendaraan'] = $this->input->post('inpJenisKendaraan');
        $data['biaya'] = $this->input->post('inpBiaya');

        if ($action == 'add') {
            $this->biaya_tiket_model->add($data);
        } else {
            $this->biaya_tiket_model->edit($id, $data);
        }

        redirect('master/biaya_tiket');
    }

    public function delete($id) {
        $this->biaya_tiket_model->delete($id);
        redirect('master/biaya_tiket');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>