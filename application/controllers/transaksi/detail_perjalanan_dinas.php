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

//        'id_pegawai' => $data['id_pegawai'],
//            'id_header' => $data['id_header'],
//            'jenis_biaya' => $data['jenis_biaya'],
//            'tgl_berangkat' => $data['tgl_berangkat'],
//            'tgl_pulang' => $data['tgl_pulang'],
//            'kota_asal' => $data['kota_asal'],
//            'kota_tujuan' => $data['kota_tujuan'],
//            'jenis_penginapan' => $data['jenis_penginapan'],
//            'jenis_kendaraan' => $data['jenis_kendaraan'],
//            'biaya' => $data['biaya']
                
        $jml_tujuan = $this->input->post('inJmlTujuan');
        if ($jml_tujuan == 1) {
            $data['id_header'] = $this->input->post('inIdHeader');
            $data['tgl_berangkat'] = $this->input->post('inTglBerangkat');
            $data['tgl_pulang'] = $this->input->post('inTglPulang');
            
            $data['id_pegawai'] = $this->input->post('inNamaPegawai');
            
            //insert biaya akomodasi
            $data['jenis_biaya'] = 'harian';
            $data['kota_asal'] = $this->input->post('inNamaPegawai');
            $data['kota_tujuan'] = $this->input->post('inNamaPegawai');
            $data['jenis_penginapan'] = $this->input->post('inNamaPegawai');
            $data['jenis_kendaraan'] = $this->input->post('inNamaPegawai');
            $data['biaya'] = $this->input->post('inNamaPegawai');
            
            //insert biaya penginapan
            $data['jenis_biaya'] = 'penginapan';
            
            //insert biaya transport utama
            $data['jenis_biaya'] = 'transport_utama';
            
            //insert biaya transport pendukung
            $data['jenis_biaya'] = 'transport_pendukung';
            
            //insert biaya representatif
            $data['jenis_biaya'] = 'representatif';
            
            //insert biaya riil
            $data['jenis_biaya'] = 'riil';
        }


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