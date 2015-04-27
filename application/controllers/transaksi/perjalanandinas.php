<?php

//Programer     : Rizal Fauzi Rahman
//Created Date  : 11 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perjalanandinas extends CI_Controller {

    var $akun = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksiperjalanandinasheader_model');
        $this->load->model('transaksiperjalanandinasdetail_model');
        $this->load->model('akun_model');
        $this->load->model('kegiatan_model');
        $this->load->model('anggaran_model');
        $this->load->model('pegawai_model');
        $this->load->model('kota_tujuan_model');
        $this->load->model('listcode_model');
        $this->load->model('biaya_akomodasi_model');
        $this->load->model('biaya_penginapan_model');
        $this->load->model('biaya_tiket_model');
        $this->load->model('komentar_model');
        $this->akun = array(
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role')
        );
    }

    public function index() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Perjalanan Dinas";
        $data['page'] = 'transaksi/perjalanandinas/list';
        $data['SIList_anggaran'] = $this->anggaran_model->select_all()->result();
        $data['SIList_kota_tujuan'] = $this->biaya_akomodasi_model->select_all()->result();
        $data['SIList_jenisKendaraan'] = $this->listcode_model->select_by_field('list_name', 'Jenis Kendaraan')->result();
        $data['list_data'] = $this->transaksiperjalanandinasheader_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Perjalanan Dinas";
        $data['page'] = 'admin/anggaran/view';
        $data['row'] = $this->anggaran_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Perjalanan Dinas";
        $data['page'] = 'admin/anggaran/add';
        $data['SIList_akun'] = $this->akun_model->select_all()->result();
        $data['SIList_kegiatan'] = $this->kegiatan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function jumlahtujuan($jumlahtujuan) {
        $data['akun'] = $this->akun;
        $data['jumlahtujuan'] = $jumlahtujuan;
        $data['title'] = "e-satker | Perjalanan Dinas";
        $data['page'] = 'transaksi/perjalanandinas/add';
        $data['SIList_akun'] = $this->akun_model->select_all()->result();
        $data['SIList_kegiatan'] = $this->kegiatan_model->select_all()->result();
        $data['perjalanan_detail'] = $this->transaksiperjalanandinasdetail_model->select_all()->result();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_kota_tujuan'] = $this->biaya_akomodasi_model->select_all()->result();
        $data['SIList_jenis_penginapan'] = $this->biaya_penginapan_model->select_all()->result();
        $data['SIList_jenisKendaraan'] = $this->listcode_model->select_by_field('list_name', 'Jenis Kendaraan')->result();
        $data['SIList_jenisPenginapan'] = $this->listcode_model->select_by_field('list_name', 'Jenis Penginapan')->result();
        $data['SIList_jenisKendaraanPendukung'] = $this->listcode_model->select_by_field('list_name', 'Jenis Kendaraan Pendukung')->result();
        $data['SIList_anggaran'] = $this->anggaran_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Perjalanan Dinas";
        $data['page'] = 'transaksi/perjalanandinas/edit';
        $data['jumlahtujuan'] = $this->transaksiperjalanandinasheader_model->get_jumlah_tujuan($id);
        $data['row'] = $this->transaksiperjalanandinasheader_model->select_by_id($id)->row();
        $data['SIList_anggaran'] = $this->anggaran_model->select_all()->result();
        $data['perjalanan_detail'] = $this->transaksiperjalanandinasdetail_model->select_by_header_id($id)->result();
        $data['SIList_kota_tujuan'] = $this->biaya_akomodasi_model->select_all()->result();
        $data['SIList_kota_tujuancoba'] = $this->biaya_akomodasi_model->select_all()->result_array();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_jenis_penginapan'] = $this->biaya_penginapan_model->select_all()->result();
        $data['SIList_jenisKendaraan'] = $this->listcode_model->select_by_field('list_name', 'Jenis Kendaraan')->result();
        $data['SIList_jenisPenginapan'] = $this->listcode_model->select_by_field('list_name', 'Jenis Penginapan')->result();
        $data['SIList_jenisKendaraanPendukung'] = $this->listcode_model->select_by_field('list_name', 'Jenis Kendaraan Pendukung')->result();

        $data['data_komentar'] = $this->komentar_model->select_by_id_header($id)->result();

        $this->load->view('admin/index', $data);
    }

    public function updateStatus($aksi, $status) {
        $id_header = $this->input->post('inIdHeader');
        if ($aksi == 'ya') {
            $data['status_approval'] = $status + 1;            
            $this->transaksiperjalanandinasheader_model->updateStatus($id_header, $data);
            if ($this->akun['role'] == 'kepala satker') {
                $data['no_spt'] = 'SPT/001/2015/001';
                $this->transaksiperjalanandinasheader_model->updateSPT($id_header, $data);
            }
        } else {
            $data['status_approval'] = $status - 1;
            $this->transaksiperjalanandinasheader_model->updateStatus($id_header, $data);

            $data['id_header'] = $id_header;
            $data['username'] = $this->akun['username'];
            $data['komentar'] = $this->input->post('inComment');
            $this->komentar_model->add($data);
        }
        redirect('transaksi/perjalanandinas');
    }

    public function process($action, $id = null) {

        $data['no_spt'] = 'Auto Generated';
        $data['status_approval'] = '1';
        $data['id_anggaran'] = $this->input->post('inAnggaran');
        $data['jumlah_tujuan'] = $this->input->post('inJumTujuan');
        $data['maksud_perjalanan_1'] = $this->input->post('inMaksudPerjalanan1');
        $data['maksud_perjalanan_2'] = $this->input->post('inMaksudPerjalanan2');
        $data['maksud_perjalanan_3'] = $this->input->post('inMaksudPerjalanan3');
        $data['jadwal_berangkat_1'] = $this->input->post('inJadwalBerangkat1');
        $data['jadwal_berangkat_2'] = $this->input->post('inJadwalBerangkat2');
        $data['jadwal_berangkat_3'] = $this->input->post('inJadwalBerangkat3');
        $data['jadwal_pulang_1'] = $this->input->post('inJadwalPulang1');
        $data['jadwal_pulang_2'] = $this->input->post('inJadwalPulang2');
        $data['jadwal_pulang_3'] = $this->input->post('inJadwalPulang3');
        $data['kota_tujuan_1'] = $this->input->post('inKotaTujuan1');
        $data['kota_tujuan_2'] = $this->input->post('inKotaTujuan2');
        $data['kota_tujuan_3'] = $this->input->post('inKotaTujuan3');
        $data['transport_utama_1'] = $this->input->post('inKendaraanUtama1');
        $data['transport_utama_2'] = $this->input->post('inKendaraanUtama2');
        $data['transport_utama_3'] = $this->input->post('inKendaraanUtama3');

        if ($action == 'add') {
            $this->transaksiperjalanandinasheader_model->add($data);
        } else {
            $data['idHeader'] = $this->input->post('inIdHeader');

            $this->transaksiperjalanandinasheader_model->edit($id, $data);
        }

        redirect('transaksi/perjalanandinas');
    }

    public function delete($id) {
        $this->transaksiperjalanandinasheader_model->delete($id);
        redirect('transaksi/perjalanandinas');
    }

}

?>