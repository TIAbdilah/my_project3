<?php

//Programer     : Taufik Ismail Abdilah
//Created Date  : 26 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_perjalanan_dinas extends CI_Controller {
    
    var $title_page = "e-satker | Perjalanan Dinas";

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/detail_detail_perjalanan_dinas_model');
        $this->load->model('pegawai_model');
        $this->load->model('kota_tujuan_model');
        $this->load->model('listcode_model');
        $this->load->model('biaya_akomodasi_model');
        $this->load->model('biaya_penginapan_model');
        $this->load->model('biaya_tiket_model');
        $this->load->model('komentar_model');
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_perjalanan_dinas/list';
        $data['list_data'] = $this->detail_perjalanan_dinas_model->select_all()->result();
        $data['status'] = $this->status;
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_perjalanan_dinas/view';        
        $data['data'] = $this->detail_perjalanan_dinas_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_perjalanan_dinas/add';
        $data['SIList_anggaran'] = $this->anggaran_model->select_all()->result();
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_perjalanan_dinas/edit';
        $data['data'] = $this->detail_perjalanan_dinas_model->select_by_id($id)->row();
        $data['SIList_anggaran'] = $this->anggaran_model->select_all()->result();
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_anggaran'] = $this->input->post('inpIdAnggaran');
        $data['jumlah_tujuan'] = $this->input->post('inpJumlahTujuan');
        $data['maksud_perjalanan'] = $this->input->post('inpMaksudPerjalanan');
        
        if ($action == 'add') {
            $this->detail_perjalanan_dinas_model->add($data);
        } else {
            $this->detail_perjalanan_dinas_model->edit($id, $data);
        }

        redirect('transaksi/detail_perjalanan_dinas');
    }

    public function delete($id) {
        $this->detail_perjalanan_dinas_model->delete($id);
        redirect('transaksi/detail_perjalanan_dinas');
    }

    // tambahan

}

?>