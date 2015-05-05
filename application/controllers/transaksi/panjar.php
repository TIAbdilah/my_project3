<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panjar extends CI_Controller {

    var $status = array(
        '0' => 'baru dibuat',
        '1' => 'menunggu verifikasi esselon 4',
        '2' => 'menunggu verifikasi esselon 3',
        '3' => 'menunggu verifikasi asisten satker',
        '4' => 'menunggu verifikasi PPK',
        '5' => 'lengkap'
    );
    var $title_page = "e-satker | Perjalanan Dinas";

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/panjar_model');        
        $this->load->model('master/pegawai_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/panjar/list';
        $data['list_data'] = $this->perjalanan_dinas_model->select_all()->result();
        $data['status'] = $this->status;
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = "e-satker | Biaya Sewa";
        $data['page'] = 'admin/transaksi/panjar/view';
        $data['data'] = $this->perjalanan_dinas_model->select_by_id($id)->row();
        $data['list_data'] = $this->panjar_model->select_by_header($id)->result();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = "e-satker | Biaya Sewa";
        $data['page'] = 'admin/master/panjar/add';
        $data['SIList_kota'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_jenisKendaraan'] = $this->listcode_model->select_by_field('list_name', 'Jenis Kendaraan')->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = "e-satker | Biaya Sewa";
        $data['page'] = 'admin/master/panjar/edit';
        $data['row'] = $this->panjar_model->select_by_id($id)->row();
        $data['SIList_kota'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_jenisKendaraan'] = $this->listcode_model->select_by_field('list_name', 'Jenis Kendaraan')->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_header'] = $this->input->post('inpIdHeader');
        $data['id_pegawai'] = $this->input->post('inpIdPegawai');
        $data['jml_panjar'] = $this->input->post('inpJmlPanjar');
        $data['penerima'] = $this->input->post('inpPenerima');

        if ($action == 'add') {
            $this->panjar_model->add($data);
        } else {
            $this->panjar_model->edit($id, $data);
        }

        redirect('transaksi/panjar/view/'.$data['id_header']);
    }

    public function delete($id) {
        $this->panjar_model->delete($id);
        redirect('master/panjar');
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>