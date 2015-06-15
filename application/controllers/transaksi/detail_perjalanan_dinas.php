<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Rizal
//Created Date  : 26 Apr 2015
//Updated Date  : 30 Apr 2015
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

    public function cleanCommas($string) {
        return str_replace(',', '', $string);
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
        $data_head['id_header'] = $this->input->post('inIdHeader');
        $data_head['tgl_berangkat'] = $this->input->post('inTglBerangkat');
        $data_head['tgl_pulang'] = $this->input->post('inTglPulang');
        $data_head['id_pegawai'] = $this->input->post('inNamaPegawai');
        if ($jml_tujuan == 1) {
            //insert biaya akomodasi
            $this->add_detil_perjalanan(
                    $data_head, 'harian', NULL, $this->input->post('inKotaUangHarian1'), NULL, NULL, $this->input->post('inSubtotalUangHarian1'));
            //insert biaya penginapan            
            $this->add_detil_perjalanan(
                    $data_head, 'penginapan', NULL, $this->input->post('inPenginapan1'), $this->input->post('inJenisPenginapan1'), NULL, $this->input->post('inSubtotalUangPenginapan1'));
            //insert biaya transport utama            
            $this->add_detil_perjalanan(
                    $data_head, 'transport_utama', $this->input->post('inKotaAsal1'), $this->input->post('inKotaTujuan1'), NULL, $this->input->post('idJenisTransportUtama1'), $this->input->post('inSubtotalTransportUtama1'));
            //insert biaya transport pendukung
            $this->add_detil_perjalanan(
                    $data_head, 'transport_pendukung', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalTransportPendukung'));
            //insert biaya representatif            
            $this->add_detil_perjalanan(
                    $data_head, 'representatif', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalRepresentatif1'));
            //insert biaya diklat
            $this->add_detil_perjalanan(
                    $data_head, 'diklat', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalDiklat1'));
            //insert biaya sewa
            $this->add_detil_perjalanan(
                    $data_head, 'sewa', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalSewa1'));
            //insert biaya riil
            $this->add_detil_perjalanan(
                    $data_head, 'riil', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalPengeluaranRiil'));
            //transport utama pulang
            $data_head['tgl_berangkat'] = $this->input->post('inTglPulang');
            $this->add_detil_perjalanan(
                    $data_head, 'transport_utama', $this->input->post('inKotaAsal2'), $this->input->post('inKotaTujuan2'), NULL, $this->input->post('idJenisTransportUtama2'), $this->input->post('inSubtotalTransportUtama2'));
        } else
        if ($jml_tujuan == 2) {
            //insert biaya akomodasi
            $this->add_detil_perjalanan(
                    $data_head, 'harian', NULL, $this->input->post('inKotaUangHarian1'), NULL, NULL, $this->input->post('inSubtotalUangHarian1'));
            //insert biaya penginapan            
            $this->add_detil_perjalanan(
                    $data_head, 'penginapan', NULL, $this->input->post('inPenginapan1'), $this->input->post('inJenisPenginapan1'), NULL, $this->input->post('inSubtotalUangPenginapan1'));
            //insert biaya transport utama            
            $this->add_detil_perjalanan(
                    $data_head, 'transport_utama', $this->input->post('inKotaAsal1'), $this->input->post('inKotaTujuan1'), NULL, $this->input->post('idJenisTransportUtama1'), $this->input->post('inSubtotalTransportUtama1'));
            //insert biaya transport pendukung
            $this->add_detil_perjalanan(
                    $data_head, 'transport_pendukung', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalTransportPendukung'));
            //insert biaya representatif            
            $this->add_detil_perjalanan(
                    $data_head, 'representatif', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalRepresentatif1'));
            //insert biaya diklat
            $this->add_detil_perjalanan(
                    $data_head, 'diklat', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalDiklat1'));
            //insert biaya sewa
            $this->add_detil_perjalanan(
                    $data_head, 'sewa', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalSewa1'));
            //insert biaya riil
            $this->add_detil_perjalanan(
                    $data_head, 'riil', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalPengeluaranRiil'));

            //-----------------------------------------INSERT DATA KEDUA---------------------------------------------------------------

            $data_head['tgl_berangkat'] = $this->input->post('inTglBerangkat2');
            $data_head['tgl_pulang'] = $this->input->post('inTglPulang2');

            //insert biaya akomodasi
            $this->add_detil_perjalanan(
                    $data_head, 'harian', NULL, $this->input->post('inKotaUangHarian2'), NULL, NULL, $this->input->post('inSubtotalUangHarian2'));
            //insert biaya penginapan            
            $this->add_detil_perjalanan(
                    $data_head, 'penginapan', NULL, $this->input->post('inPenginapan2'), $this->input->post('inJenisPenginapan2'), NULL, $this->input->post('inSubtotalUangPenginapan2'));
            //insert biaya transport utama            
            $this->add_detil_perjalanan(
                    $data_head, 'transport_utama', $this->input->post('inKotaAsal2'), $this->input->post('inKotaTujuan2'), NULL, $this->input->post('idJenisTransportUtama2'), $this->input->post('inSubtotalTransportUtama2'));
            //insert biaya transport pendukung
            $this->add_detil_perjalanan(
                    $data_head, 'transport_pendukung', NULL, $this->input->post('inKotaTujuan2'), NULL, NULL, $this->input->post('inSubtotalTransportPendukung2'));
            //insert biaya representatif            
            $this->add_detil_perjalanan(
                    $data_head, 'representatif', NULL, $this->input->post('inKotaTujuan2'), NULL, NULL, $this->input->post('inSubtotalRepresentatif2'));
            //insert biaya diklat
            $this->add_detil_perjalanan(
                    $data_head, 'diklat', NULL, $this->input->post('inKotaTujuan2'), NULL, NULL, $this->input->post('inSubtotalDiklat2'));
            //insert biaya sewa
            $this->add_detil_perjalanan(
                    $data_head, 'sewa', NULL, $this->input->post('inKotaTujuan2'), NULL, NULL, $this->input->post('inSubtotalSewa2'));
            //insert biaya riil
            $this->add_detil_perjalanan(
                    $data_head, 'riil', NULL, $this->input->post('inKotaTujuan2'), NULL, NULL, $this->input->post('inSubtotalPengeluaranRiil2'));
            //transport utama pulang
            $data_head['tgl_berangkat'] = $this->input->post('inTglPulang2');
            $this->add_detil_perjalanan(
                    $data_head, 'transport_utama', $this->input->post('inKotaAsal3'), $this->input->post('inKotaTujuan3'), NULL, $this->input->post('idJenisTransportUtama3'), $this->input->post('inSubtotalTransportUtama3'));
        } else
        if ($jml_tujuan == 3) {
            //insert biaya akomodasi
            $this->add_detil_perjalanan(
                    $data_head, 'harian', NULL, $this->input->post('inKotaUangHarian1'), NULL, NULL, $this->input->post('inSubtotalUangHarian1'));
            //insert biaya penginapan            
            $this->add_detil_perjalanan(
                    $data_head, 'penginapan', NULL, $this->input->post('inPenginapan1'), $this->input->post('inJenisPenginapan1'), NULL, $this->input->post('inSubtotalUangPenginapan1'));
            //insert biaya transport utama            
            $this->add_detil_perjalanan(
                    $data_head, 'transport_utama', $this->input->post('inKotaAsal1'), $this->input->post('inKotaTujuan1'), NULL, $this->input->post('idJenisTransportUtama1'), $this->input->post('inSubtotalTransportUtama1'));
            //insert biaya transport pendukung
            $this->add_detil_perjalanan(
                    $data_head, 'transport_pendukung', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalTransportPendukung'));
            //insert biaya representatif            
            $this->add_detil_perjalanan(
                    $data_head, 'representatif', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalRepresentatif1'));
            //insert biaya diklat
            $this->add_detil_perjalanan(
                    $data_head, 'diklat', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalDiklat1'));
            //insert biaya sewa
            $this->add_detil_perjalanan(
                    $data_head, 'sewa', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalSewa1'));
            //insert biaya riil
            $this->add_detil_perjalanan(
                    $data_head, 'riil', NULL, $this->input->post('inKotaTujuan1'), NULL, NULL, $this->input->post('inSubtotalPengeluaranRiil'));
            //transport utama pulang
            $data_head['tgl_berangkat'] = $this->input->post('inTglPulang');
            $this->add_detil_perjalanan(
                    $data_head, 'transport_utama', $this->input->post('inKotaAsal2'), $this->input->post('inKotaTujuan2'), NULL, $this->input->post('idJenisTransportUtama2'), $this->input->post('inSubtotalTransportUtama2'));

            //-----------------------------------------INSERT DATA KEDUA---------------------------------------------------------------

            $data['tgl_berangkat'] = $this->input->post('inTglBerangkat2');
            $data['tgl_pulang'] = $this->input->post('inTglPulang2');

            //insert biaya akomodasi
            $this->add_detil_perjalanan(
                    $data_head, 'harian', NULL, $this->input->post('inKotaUangHarian2'), NULL, NULL, $this->input->post('inSubtotalUangHarian2'));
            //insert biaya penginapan            
            $this->add_detil_perjalanan(
                    $data_head, 'penginapan', NULL, $this->input->post('inPenginapan2'), $this->input->post('inJenisPenginapan2'), NULL, $this->input->post('inSubtotalUangPenginapan2'));
            //insert biaya transport utama            
            $this->add_detil_perjalanan(
                    $data_head, 'transport_utama', $this->input->post('inKotaAsal2'), $this->input->post('inKotaTujuan2'), NULL, $this->input->post('idJenisTransportUtama2'), $this->input->post('inSubtotalTransportUtama2'));
            //insert biaya transport pendukung
            $this->add_detil_perjalanan(
                    $data_head, 'transport_pendukung', NULL, $this->input->post('inKotaTujuan2'), NULL, NULL, $this->input->post('inSubtotalTransportPendukung2'));
            //insert biaya representatif            
            $this->add_detil_perjalanan(
                    $data_head, 'representatif', NULL, $this->input->post('inKotaTujuan2'), NULL, NULL, $this->input->post('inSubtotalRepresentatif2'));
            //insert biaya diklat
            $this->add_detil_perjalanan(
                    $data_head, 'diklat', NULL, $this->input->post('inKotaTujuan2'), NULL, NULL, $this->input->post('inSubtotalDiklat2'));
            //insert biaya sewa
            $this->add_detil_perjalanan(
                    $data_head, 'sewa', NULL, $this->input->post('inKotaTujuan2'), NULL, NULL, $this->input->post('inSubtotalSewa2'));
            //insert biaya riil
            $this->add_detil_perjalanan(
                    $data_head, 'riil', NULL, $this->input->post('inKotaTujuan2'), NULL, NULL, $this->input->post('inSubtotalPengeluaranRiil2'));

            //------------------------------------------------------INSERT DATA KETIGA---------------------------------------------------------------

            $data['tgl_berangkat'] = $this->input->post('inTglBerangkat3');
            $data['tgl_pulang'] = $this->input->post('inTglPulang3');

            //insert biaya akomodasi
            $this->add_detil_perjalanan(
                    $data_head, 'harian', NULL, $this->input->post('inKotaUangHarian3'), NULL, NULL, $this->input->post('inSubtotalUangHarian3'));
            //insert biaya penginapan            
            $this->add_detil_perjalanan(
                    $data_head, 'penginapan', NULL, $this->input->post('inPenginapan3'), $this->input->post('inJenisPenginapan3'), NULL, $this->input->post('inSubtotalUangPenginapan3'));
            //insert biaya transport utama            
            $this->add_detil_perjalanan(
                    $data_head, 'transport_utama', $this->input->post('inKotaAsal3'), $this->input->post('inKotaTujuan3'), NULL, $this->input->post('idJenisTransportUtama3'), $this->input->post('inSubtotalTransportUtama3'));
            //insert biaya transport pendukung
            $this->add_detil_perjalanan(
                    $data_head, 'transport_pendukung', NULL, $this->input->post('inKotaTujuan3'), NULL, NULL, $this->input->post('inSubtotalTransportPendukung3'));
            //insert biaya representatif            
            $this->add_detil_perjalanan(
                    $data_head, 'representatif', NULL, $this->input->post('inKotaTujuan3'), NULL, NULL, $this->input->post('inSubtotalRepresentatif3'));
            //insert biaya diklat
            $this->add_detil_perjalanan(
                    $data_head, 'diklat', NULL, $this->input->post('inKotaTujuan3'), NULL, NULL, $this->input->post('inSubtotalDiklat3'));
            //insert biaya sewa
            $this->add_detil_perjalanan(
                    $data_head, 'sewa', NULL, $this->input->post('inKotaTujuan3'), NULL, NULL, $this->input->post('inSubtotalSewa3'));
            //insert biaya riil
            $this->add_detil_perjalanan(
                    $data_head, 'riil', NULL, $this->input->post('inKotaTujuan3'), NULL, NULL, $this->input->post('inSubtotalPengeluaranRiil3'));
            //transport utama pulang
            $data_head['tgl_berangkat'] = $this->input->post('inTglPulang3');
            $this->add_detil_perjalanan(
                    $data_head, 'transport_utama', $this->input->post('inKotaAsal4'), $this->input->post('inKotaTujuan4'), NULL, $this->input->post('idJenisTransportUtama4'), $this->input->post('inSubtotalTransportUtama4'));
        }
        redirect($_SERVER['HTTP_REFERER']);
//        redirect('transaksi/perjalanan_dinas/');
    }

    public function add_detil_perjalanan($data_head, $jenis_biaya, $kota_asal, $kota_tujuan, $jenis_penginapan, $jenis_kendaraan, $biaya) {
        $data['id_header'] = $data_head['id_header'];
        $data['tgl_berangkat'] = $data_head['tgl_berangkat'];
        $data['tgl_pulang'] = $data_head['tgl_pulang'];
        $data['id_pegawai'] = $data_head['id_pegawai'];
        $data['jenis_biaya'] = $jenis_biaya;
        $data['kota_asal'] = $kota_asal;
        $data['kota_tujuan'] = $kota_tujuan;
        $data['jenis_penginapan'] = $jenis_penginapan;
        $data['jenis_kendaraan'] = $jenis_kendaraan;
        $data['biaya'] = $this->cleanCommas($biaya);
        $this->detail_perjalanan_dinas_model->add($data);
    }

    public function delete($id_header, $id_pegawai) {
        $this->detail_perjalanan_dinas_model->delete($id_header, $id_pegawai);
        $data2['flag'] = 0;
        $this->pegawai_model->update_flag($id_pegawai, $data2);
        // redirect('transaksi/perjalanan_dinas');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>
