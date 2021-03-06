<?php

//Created By    : Rizal
//Updated By    : Rizal
//Created Date  : 1 Mei 2015
//Updated Date  : 1 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bukti_perjalanan_dinas extends CI_Controller {

    var $status = array(
        '0' => 'baru dibuat',
        '1' => 'menunggu verifikasi esselon 4',
        '2' => 'menunggu verifikasi esselon 3',
        '3' => 'menunggu verifikasi asisten satker',
        '4' => 'menunggu verifikasi PPK',
        '5' => 'lengkap'
    );
    var $title_page = "e-satker | Bukti Perjalanan Dinas";

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/bukti_perjalanan_dinas_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('master/pegawai_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/bukti_perjalanan_dinas/list';
        $data['list_data'] = $this->perjalanan_dinas_model->select_all()->result();
        $data['status'] = $this->status;
        $this->load->view('admin/index', $data);
    }

    public function add($id_header, $id_pegawai, $jumlah_tujuan, $kota_tujuan) {
        $data['title'] = "e-satker | Bukti Perjalanan Dinas";
        $data['page'] = 'admin/transaksi/bukti_perjalanan_dinas/add';
        $data['id_header'] = $id_header;
        $data['id_pegawai'] = $id_pegawai;
        $data['jumlah_tujuan'] = $jumlah_tujuan;
        $data['data_pegawai'] =  $this->pegawai_model->select_by_id($id_pegawai)->row();
        if (strpos($kota_tujuan, '%20') !== false) {
            $x = explode('%20', $kota_tujuan);
            $y = $x[0] . ' ' . $x[1];
        } else {
            $y = $kota_tujuan;
        }
        $data['kota_tujuan'] = $y;
        
        $data['data_detail'] = $this->bukti_perjalanan_dinas_model->select_biaya_from_detail($id_header, $id_pegawai, $y)->row();
        $this->load->view('admin/index', $data);
    }

    public function edit($id_header, $id_pegawai, $jumlah_tujuan, $kota_tujuan) {
        $data['title'] = "e-satker | Bukti Perjalanan Dinas";
        $data['page'] = 'admin/transaksi/bukti_perjalanan_dinas/edit';
        $data['id_header'] = $id_header;
        $data['id_pegawai'] = $id_pegawai;
        $data['jumlah_tujuan'] = $jumlah_tujuan;
        if (strpos($kota_tujuan, '%20') !== false) {
            $x = explode('%20', $kota_tujuan);
            $y = $x[0] . ' ' . $x[1];
        } else {
            $y = $kota_tujuan;
        }

        $data['data_detail'] = $this->bukti_perjalanan_dinas_model->select_biaya_from_detail($id_header, $id_pegawai, $y)->row();
        $data['data_bukti'] = $this->bukti_perjalanan_dinas_model->select_biaya_from_bukti($id_header, $id_pegawai, $y)->row();
        $this->load->view('admin/index', $data);
    }

    public function view($id_header, $id_pegawai, $jumlah_tujuan, $kota_tujuan) {
        $data['title'] = "e-satker | Bukti Perjalanan Dinas";
        $data['page'] = 'admin/transaksi/bukti_perjalanan_dinas/view';
        $data['id_header'] = $id_header;
        $data['id_pegawai'] = $id_pegawai;
        $data['jumlah_tujuan'] = $jumlah_tujuan;
        if (strpos($kota_tujuan, '%20') !== false) {
            $x = explode('%20', $kota_tujuan);
            $y = $x[0] . ' ' . $x[1];
        } else {
            $y = $kota_tujuan;
        }
        $data['kota_tujuan'] = $y;
        $data['data_detail'] = $this->bukti_perjalanan_dinas_model->select_biaya_from_detail($id_header, $id_pegawai, $y)->row();
        $data['data_bukti'] = $this->bukti_perjalanan_dinas_model->select_biaya_from_bukti($id_header, $id_pegawai, $y)->row();
        if ($this->ceknumrows($id_header, $id_pegawai, $y) > 0) {
            $this->load->view('admin/index', $data);
        } else {
            $this->session->set_flashdata('bukti', '<div class="alert alert-danger" role="alert">Bukti untuk kota dan pegawai ini belum diisi.</div>');
            redirect($_SERVER['HTTP_REFERER'], $data);
        }
    }

    public function ceknumrows($id_header, $id_pegawai, $kota_tujuan) {

        return $this->bukti_perjalanan_dinas_model->ceknumrows($id_header, $id_pegawai, $kota_tujuan);
    }

    public function process($action, $id = null) {

        $jml_tujuan = $this->input->post('inJmlTujuan');
        $id_pegawai = $this->input->post('inIdPegawai');
        $id_header = $this->input->post('inIdHeader');
        $kota_tujuan = $this->input->post('inKotaTujuan');
        $data['id_header'] = $this->input->post('inIdHeader');
        $data['id_pegawai'] = $this->input->post('inIdPegawai');


        if (($this->bukti_perjalanan_dinas_model->ceknumrows($id_header, $id_pegawai, $kota_tujuan) > 0)) {
            $this->bukti_perjalanan_dinas_model->delete($id_header, $id_pegawai, $kota_tujuan);
        }

        //insert bukti akomodasi
        $data['jenis_biaya'] = 'harian';
        $data['biaya'] = $this->input->post('inSubtotalUangHarian1');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiUangHarian1');
        $data['jumlah_bukti'] = $this->input->post('inJumlahUangHarian1');
        $data['kota_tujuan'] = $kota_tujuan;
//            print_r($data);
        $this->bukti_perjalanan_dinas_model->add($data);

        //insert bukti penginapan
        $data['jenis_biaya'] = 'penginapan';
        $data['biaya'] = $this->input->post('inSubtotalUangPenginapan1');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiUangPenginapan1');
        $data['jumlah_bukti'] = $this->input->post('inJumlahUangPenginapan1');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        //insert biaya transport utama
        $data['jenis_biaya'] = 'transport_utama';
        $data['biaya'] = $this->input->post('inSubtotalTransportUtama1');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiTransportUtama1');
        $data['jumlah_bukti'] = $this->input->post('inJumlahTransportUtama1');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        //insert biaya transport pendukung
        $data['jenis_biaya'] = 'transport_pendukung';
        $data['biaya'] = $this->input->post('inSubtotalTransportPendukung');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiTransportPendukung');
        $data['jumlah_bukti'] = $this->input->post('inJumlahTransportPendukung');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        //insert biaya representatif
        $data['jenis_biaya'] = 'representatif';
        $data['biaya'] = $this->input->post('inSubtotalRefresentatif');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiRefresentatif');
        $data['jumlah_bukti'] = $this->input->post('inJumlahRefresentatif');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        //insert biaya sewa
        $data['jenis_biaya'] = 'sewa';
        $data['biaya'] = $this->input->post('inSubtotalSewa');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiSewa');
        $data['jumlah_bukti'] = $this->input->post('inJumlahSewa');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        //insert biaya diklat
        $data['jenis_biaya'] = 'diklat';
        $data['biaya'] = $this->input->post('inSubtotalDiklat');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiDiklat');
        $data['jumlah_bukti'] = $this->input->post('inJumlahDiklat');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        //insert biaya riil
        $data['jenis_biaya'] = 'riil';
        $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil');
        $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        $data['jenis_biaya'] = 'riil_2';
        $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil2');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil2');
        $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil2');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        $data['jenis_biaya'] = 'riil_3';
        $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil3');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil3');
        $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil3');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        $data['jenis_biaya'] = 'riil_4';
        $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil4');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil4');
        $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil4');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        $data['jenis_biaya'] = 'riil_5';
        $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil5');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil5');
        $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil5');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        $data['jenis_biaya'] = 'riil_6';
        $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil6');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil6');
        $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil6');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        $data['jenis_biaya'] = 'riil_7';
        $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil7');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil7');
        $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil7');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        $data['jenis_biaya'] = 'riil_8';
        $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil8');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil8');
        $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil8');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        $data['jenis_biaya'] = 'riil_9';
        $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil9');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil9');
        $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil9');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        $data['jenis_biaya'] = 'riil_10';
        $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil10');
        $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil10');
        $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil10');
        $data['kota_tujuan'] = $kota_tujuan;
        $this->bukti_perjalanan_dinas_model->add($data);

        redirect('transaksi/perjalanan_dinas/view/' . $id_header . '/' . $jml_tujuan);
    }

    public function delete($id) {
        $this->biaya_sewa_model->delete($id);
        redirect('master/biaya_sewa');
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>