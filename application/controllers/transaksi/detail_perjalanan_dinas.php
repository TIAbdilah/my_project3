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
        $this->load->model('transaksi/detail_perjalanan_dinas_model');
        $this->load->model('master/pegawai_model');
        $this->load->model('master/kota_tujuan_model');
        $this->load->model('master/listcode_model');
        $this->load->model('master/biaya_akomodasi_model');
        $this->load->model('master/biaya_penginapan_model');
        $this->load->model('master/biaya_tiket_model');
        $this->load->model('master/transaksi/komentar_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_perjalanan_dinas/list';
        $data['list_data'] = $this->detail_perjalanan_dinas_model->select_all()->result();
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
        $jml_tujuan = $this->input->post('inJmlTujuan');
        if ($jml_tujuan == 1) {
            $data['id_header'] = $this->input->post('inIdHeader');
            $data['tgl_berangkat'] = $this->input->post('inTglBerangkat');
            $data['tgl_pulang'] = $this->input->post('inTglPulang');
            
            $data['id_pegawai'] = $this->input->post('inNamaPegawai');
            
            //insert biaya akomodasi
            $data['jenis_biaya'] = 'harian';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaUangHarian1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalUangHarian1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);
            
            //insert biaya penginapan
            $data['jenis_biaya'] = 'penginapan';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inPenginapan1');
            $data['jenis_penginapan'] = $this->input->post('inJenisPenginapan1');
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalUangPenginapan1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);
            
            //insert biaya transport utama
            $data['jenis_biaya'] = 'transport_utama';
            $data['kota_asal'] = $this->input->post('inKotaAsal1');
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = $this->input->post('idJenisTransportUtama1');
            $data['biaya'] = $this->input->post('inSubtotalTransportUtama1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);
            
            //insert biaya transport pendukung
            $data['jenis_biaya'] = 'transport_pendukung';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = NULL;
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalTransportPendukung');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya representatif
            $data['jenis_biaya'] = 'representatif';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = NULL;
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalRepresentatif');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);
            
            //insert biaya riil
            $data['jenis_biaya'] = 'riil';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = NULL;
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);
        }

        redirect('transaksi/perjalanan_dinas');
    }

    public function delete($id) {
        $this->detail_perjalanan_dinas_model->delete($id);
        redirect('transaksi/detail_perjalanan_dinas');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }
    
}

?>