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
        $this->load->model('transaksi/komentar_model');
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
//        print_r($id);
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
//transport utama pulang

            $data['tgl_berangkat'] = $this->input->post('inTglPulang');

            $data['jenis_biaya'] = 'transport_utama';
            $data['kota_asal'] = $this->input->post('inKotaAsal2');
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = $this->input->post('idJenisTransportUtama2');
            $data['biaya'] = $this->input->post('inSubtotalTransportUtama2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            $data['tgl_berangkat'] = $this->input->post('inTglBerangkat');

            //insert biaya transport pendukung
            $data['jenis_biaya'] = 'transport_pendukung';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            ;
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalTransportPendukung');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya representatif
            $data['jenis_biaya'] = 'representatif';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalRepresentatif1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya diklat
            $data['jenis_biaya'] = 'diklat';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalDiklat1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya sewa
            $data['jenis_biaya'] = 'sewa';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalSewa1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya riil
            $data['jenis_biaya'] = 'riil';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            ;
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);
        } else if ($jml_tujuan == 2) {
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
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalTransportPendukung');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya representatif
            $data['jenis_biaya'] = 'representatif';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalRepresentatif1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya diklat
            $data['jenis_biaya'] = 'diklat';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalDiklat1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya sewa
            $data['jenis_biaya'] = 'sewa';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalSewa1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya riil
            $data['jenis_biaya'] = 'riil';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

//------------------------------------------------------INSERT DATA KEDUA---------------------------------------------------------------

            $data['tgl_berangkat'] = $this->input->post('inTglBerangkat2');
            $data['tgl_pulang'] = $this->input->post('inTglPulang2');
            $data['id_pegawai'] = $this->input->post('inNamaPegawai');
            $data['id_header'] = $this->input->post('inIdHeader');

            //insert biaya akomodasi
            $data['jenis_biaya'] = 'harian';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaUangHarian2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalUangHarian2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya penginapan
            $data['jenis_biaya'] = 'penginapan';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inPenginapan2');
            $data['jenis_penginapan'] = $this->input->post('inJenisPenginapan2');
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalUangPenginapan2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya transport utama
            $data['jenis_biaya'] = 'transport_utama';
            $data['kota_asal'] = $this->input->post('inKotaAsal2');
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = $this->input->post('idJenisTransportUtama2');
            $data['biaya'] = $this->input->post('inSubtotalTransportUtama2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);


//          transport utama pulang

            $data['tgl_berangkat'] = $this->input->post('inTglPulang2');

            $data['jenis_biaya'] = 'transport_utama';
            $data['kota_asal'] = $this->input->post('inKotaAsal3');
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan3');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = $this->input->post('idJenisTransportUtama3');
            $data['biaya'] = $this->input->post('inSubtotalTransportUtama3');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //representatif kota kedua
            $data['jenis_biaya'] = 'representatif';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalRepresentatif2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya diklat
            $data['jenis_biaya'] = 'diklat';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalDiklat2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya sewa
            $data['jenis_biaya'] = 'sewa';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalSewa2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya riil
            $data['jenis_biaya'] = 'riil';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya transport pendukung
            $data['jenis_biaya'] = 'transport_pendukung';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalTransportPendukung2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);
        } else if ($jml_tujuan == 3) {
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
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalTransportPendukung');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya representatif
            $data['jenis_biaya'] = 'representatif';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalRepresentatif1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya diklat
            $data['jenis_biaya'] = 'diklat';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalDiklat1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya sewa
            $data['jenis_biaya'] = 'sewa';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalSewa1');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya riil
            $data['jenis_biaya'] = 'riil';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan1');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

//------------------------------------------------------INSERT DATA KEDUA---------------------------------------------------------------

            $data['tgl_berangkat'] = $this->input->post('inTglBerangkat2');
            $data['tgl_pulang'] = $this->input->post('inTglPulang2');
            $data['id_pegawai'] = $this->input->post('inNamaPegawai');
            $data['id_header'] = $this->input->post('inIdHeader');

            //insert biaya akomodasi
            $data['jenis_biaya'] = 'harian';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaUangHarian2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalUangHarian2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya penginapan
            $data['jenis_biaya'] = 'penginapan';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inPenginapan2');
            $data['jenis_penginapan'] = $this->input->post('inJenisPenginapan2');
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalUangPenginapan2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya transport utama
            $data['jenis_biaya'] = 'transport_utama';
            $data['kota_asal'] = $this->input->post('inKotaAsal2');
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = $this->input->post('idJenisTransportUtama2');
            $data['biaya'] = $this->input->post('inSubtotalTransportUtama2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //representatif kota kedua
            $data['jenis_biaya'] = 'representatif';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalRepresentatif2');
            $this->detail_perjalanan_dinas_model->add($data);


            //insert biaya diklat
            $data['jenis_biaya'] = 'diklat';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalDiklat2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya sewa
            $data['jenis_biaya'] = 'sewa';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalSewa2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);


            //insert biaya riil
            $data['jenis_biaya'] = 'riil';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya transport pendukung
            $data['jenis_biaya'] = 'transport_pendukung';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan2');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalTransportPendukung2');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);
            //------------------------------------------------------INSERT DATA KETIGA---------------------------------------------------------------

            $data['tgl_berangkat'] = $this->input->post('inTglBerangkat3');
            $data['tgl_pulang'] = $this->input->post('inTglPulang3');
            $data['id_pegawai'] = $this->input->post('inNamaPegawai');
            $data['id_header'] = $this->input->post('inIdHeader');

            //insert biaya akomodasi
            $data['jenis_biaya'] = 'harian';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaUangHarian3');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalUangHarian3');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya penginapan
            $data['jenis_biaya'] = 'penginapan';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inPenginapan3');
            $data['jenis_penginapan'] = $this->input->post('inJenisPenginapan3');
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalUangPenginapan3');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya transport utama
            $data['jenis_biaya'] = 'transport_utama';
            $data['kota_asal'] = $this->input->post('inKotaAsal3');
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan3');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = $this->input->post('idJenisTransportUtama3');
            $data['biaya'] = $this->input->post('inSubtotalTransportUtama3');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);
//transport utama pulang

            $data['tgl_berangkat'] = $this->input->post('inTglPulang3');

            $data['jenis_biaya'] = 'transport_utama';
            $data['kota_asal'] = $this->input->post('inKotaAsal4');
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan4');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = $this->input->post('idJenisTransportUtama4');
            $data['biaya'] = $this->input->post('inSubtotalTransportUtama4');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //representatif kota ketiga
            $data['jenis_biaya'] = 'representatif';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan3');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalRepresentatif3');
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya diklat
            $data['jenis_biaya'] = 'diklat';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan3');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalDiklat3');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya sewa
            $data['jenis_biaya'] = 'sewa';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan3');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalSewa3');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya riil
            $data['jenis_biaya'] = 'riil';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan3');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalPengeluaranRiil3');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);

            //insert biaya transport pendukung
            $data['jenis_biaya'] = 'transport_pendukung';
            $data['kota_asal'] = NULL;
            $data['kota_tujuan'] = $this->input->post('inKotaTujuan3');
            $data['jenis_penginapan'] = NULL;
            $data['jenis_kendaraan'] = NULL;
            $data['biaya'] = $this->input->post('inSubtotalTransportPendukung3');
//            print_r($data);echo '<br>';
            $this->detail_perjalanan_dinas_model->add($data);
        }
        redirect($_SERVER['HTTP_REFERER']);
//        redirect('transaksi/perjalanan_dinas/');
    }

    public function delete($id_header, $id_pegawai) {
        $this->detail_perjalanan_dinas_model->delete($id_header, $id_pegawai);
        redirect('transaksi/perjalanan_dinas');
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>
