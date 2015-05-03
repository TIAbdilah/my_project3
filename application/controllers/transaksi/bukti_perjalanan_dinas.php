<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bukti_perjalanan_dinas extends CI_Controller {

    var $title_page = "e-satker | Bukti Perjalanan Dinas";

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/bukti_perjalanan_dinas_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/bukti_perjalanan_dinas/list';
        $data['list_data'] = $this->perjalanan_dinas_model->select_all()->result();
        $data['status'] = $this->status;
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = "e-satker | Biaya Sewa";
        $data['page'] = 'admin/master/biaya_sewa/view';
        $data['row'] = $this->biaya_sewa_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add($id_header, $id_pegawai, $jumlah_tujuan) {
        $data['title'] = "e-satker | Bukti Perjalanan Dinas";
        $data['page'] = 'admin/transaksi/bukti_perjalanan_dinas/add';
        $data['id_header'] = $id_header;
        $data['id_pegawai'] = $id_pegawai;
        $data['jumlah_tujuan'] = $jumlah_tujuan;
        $data['data_detail'] = $this->bukti_perjalanan_dinas_model->select_biaya_from_detail($id_header, $id_pegawai)->row();
        $this->load->view('admin/index', $data);
    }

    public function edit($id_header, $id_pegawai, $jumlah_tujuan) {
        $data['title'] = "e-satker | Bukti Perjalanan Dinas";
        $data['page'] = 'admin/transaksi/bukti_perjalanan_dinas/edit';
        $data['id_header'] = $id_header;
        $data['id_pegawai'] = $id_pegawai;
        $data['jumlah_tujuan'] = $jumlah_tujuan;
        $data['data_detail'] = $this->bukti_perjalanan_dinas_model->select_biaya_from_detail($id_header, $id_pegawai)->row();
        $data['data_bukti'] = $this->bukti_perjalanan_dinas_model->select_biaya_from_bukti($id_header, $id_pegawai)->row();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $jml_tujuan = $this->input->post('inJmlTujuan');
        if ($jml_tujuan == 1) {
            $data['id_header'] = $this->input->post('inIdHeader');
            $data['id_pegawai'] = $this->input->post('inIdPegawai');

            //insert bukti akomodasi
            $data['jenis_biaya'] = 'harian';
            $data['biaya'] = $this->input->post('inSubtotalUangHarian1');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiUangHarian1');
            $data['jumlah_bukti'] = $this->input->post('inJumlahUangHarian1');
            $this->bukti_perjalanan_dinas_model->add($data);

            //insert bukti penginapan
            $data['jenis_biaya'] = 'penginapan';
            $data['biaya'] = $this->input->post('inSubtotalUangPenginapan1');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiUangPenginapan1');
            $data['jumlah_bukti'] = $this->input->post('inJumlahUangPenginapan1');
            $this->bukti_perjalanan_dinas_model->add($data);

            //insert biaya transport utama
            $data['jenis_biaya'] = 'transport_utama';
            $data['biaya'] = $this->input->post('inSubtotalTransportUtama1');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiTransportUtama1');
            $data['jumlah_bukti'] = $this->input->post('inJumlahTransportUtama1');
            $this->bukti_perjalanan_dinas_model->add($data);

            $data['jenis_biaya'] = 'transport_utama_2';
            $data['biaya'] = $this->input->post('inSubtotalTransportUtama2');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiTransportUtama2');
            $data['jumlah_bukti'] = $this->input->post('inJumlahTransportUtama2');
            $this->bukti_perjalanan_dinas_model->add($data);

            //insert biaya transport pendukung
            $data['jenis_biaya'] = 'transport_pendukung';
            $data['biaya'] = $this->input->post('inSubtotalTransportPendukung');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiTransportPendukung');
            $data['jumlah_bukti'] = $this->input->post('inJumlahTransportPendukung');
            $this->bukti_perjalanan_dinas_model->add($data);

            //insert biaya representatif
            $data['jenis_biaya'] = 'representatif';
            $data['biaya'] = $this->input->post('inSubtotalRepresentatif');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiRepresentatif');
            $data['jumlah_bukti'] = $this->input->post('inJumlahUangRepresentatif');
            $this->bukti_perjalanan_dinas_model->add($data);

            //insert biaya riil
            $data['jenis_biaya'] = 'riil';
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil');
            $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil');
            $this->bukti_perjalanan_dinas_model->add($data);

            $data['jenis_biaya'] = 'riil_2';
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil2');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil2');
            $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil2');
            $this->bukti_perjalanan_dinas_model->add($data);

            $data['jenis_biaya'] = 'riil_3';
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil3');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil3');
            $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil3');
            $this->bukti_perjalanan_dinas_model->add($data);

            $data['jenis_biaya'] = 'riil_4';
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil4');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil4');
            $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil4');
            $this->bukti_perjalanan_dinas_model->add($data);

            $data['jenis_biaya'] = 'riil_5';
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil5');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil5');
            $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil5');
            $this->bukti_perjalanan_dinas_model->add($data);

            $data['jenis_biaya'] = 'riil_6';
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil6');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil6');
            $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil6');
            $this->bukti_perjalanan_dinas_model->add($data);

            $data['jenis_biaya'] = 'riil_7';
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil7');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil7');
            $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil7');
            $this->bukti_perjalanan_dinas_model->add($data);

            $data['jenis_biaya'] = 'riil_8';
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil8');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil8');
            $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil8');
            $this->bukti_perjalanan_dinas_model->add($data);

            $data['jenis_biaya'] = 'riil_9';
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil9');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil9');
            $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil9');
            $this->bukti_perjalanan_dinas_model->add($data);

            $data['jenis_biaya'] = 'riil_10';
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil10');
            $data['nomor_bukti'] = $this->input->post('inNomorBuktiPengeluaranRiil10');
            $data['jumlah_bukti'] = $this->input->post('inJumlahPengeluaranRiil10');
            $this->bukti_perjalanan_dinas_model->add($data);
        }

        redirect('transaksi/perjalanan_dinas');
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