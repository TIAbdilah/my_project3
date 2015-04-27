<?php

//Programer     : Taufik Ismail Abdilah
//Created Date  : 26 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perjalanan_dinas extends CI_Controller {

    var $status = array(
        '0' => 'baru dibuat',
        '1' => 'menunggu verivikasi esselon 4',
        '2' => 'menunggu verivikasi esselon 3',
        '3' => 'menunggu verivikasi asisten satker',
        '4' => 'menunggu verivikasi PPK',
        '5' => 'lima'
    );
    var $title_page = "e-satker | Perjalanan Dinas";

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksiperjalanandinasdetail_model');
        $this->load->model('anggaran_model');
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
        $data['page'] = 'transaksi/perjalanan_dinas/list';
        $data['list_data'] = $this->perjalanan_dinas_model->select_all()->result();
        $data['status'] = $this->status;
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'transaksi/perjalanan_dinas/view';        
        $data['data'] = $this->perjalanan_dinas_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'transaksi/perjalanan_dinas/add';
        $data['SIList_anggaran'] = $this->anggaran_model->select_all()->result();
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'transaksi/perjalanan_dinas/edit';
        $data['data'] = $this->perjalanan_dinas_model->select_by_id($id)->row();
        $data['SIList_anggaran'] = $this->anggaran_model->select_all()->result();
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_anggaran'] = $this->input->post('inpIdAnggaran');
        $data['jumlah_tujuan'] = $this->input->post('inpJumlahTujuan');
        $data['maksud_perjalanan'] = $this->input->post('inpMaksudPerjalanan');

        switch ($data['jumlah_tujuan']) {
            case 1 :
                $data['jadwal_berangkat_1'] = $this->input->post('inpJadwalBerangkat1');
                $data['jadwal_berangkat_2'] = NULL;
                $data['jadwal_berangkat_3'] = NULL;
                $data['jadwal_pulang_1'] = $this->input->post('inpJadwalPulang1');
                $data['jadwal_pulang_2'] = NULL;
                $data['jadwal_pulang_3'] = NULL;
                $data['kota_tujuan_1'] = $this->input->post('inpKotaTujuan1');
                $data['kota_tujuan_2'] = NULL;
                $data['kota_tujuan_3'] = NULL;
                break;
            case 2 :
                $data['jadwal_berangkat_1'] = $this->input->post('inpJadwalBerangkat21');
                $data['jadwal_berangkat_2'] = $this->input->post('inpJadwalBerangkat22');
                $data['jadwal_berangkat_3'] = NULL;
                $data['jadwal_pulang_1'] = $this->input->post('inpJadwalPulang21');
                $data['jadwal_pulang_2'] = $this->input->post('inpJadwalPulang22');
                $data['jadwal_pulang_3'] = NULL;
                $data['kota_tujuan_1'] = $this->input->post('inpKotaTujuan21');
                $data['kota_tujuan_2'] = $this->input->post('inpKotaTujuan22');
                $data['kota_tujuan_3'] = NULL;
                break;
            case 3 :
                $data['jadwal_berangkat_1'] = $this->input->post('inpJadwalBerangkat31');
                $data['jadwal_berangkat_2'] = $this->input->post('inpJadwalBerangkat32');
                $data['jadwal_berangkat_3'] = $this->input->post('inpJadwalBerangkat33');
                $data['jadwal_pulang_1'] = $this->input->post('inpJadwalPulang31');
                $data['jadwal_pulang_2'] = $this->input->post('inpJadwalPulang32');
                $data['jadwal_pulang_3'] = $this->input->post('inpJadwalPulang33');
                $data['kota_tujuan_1'] = $this->input->post('inpKotaTujuan31');
                $data['kota_tujuan_2'] = $this->input->post('inpKotaTujuan32');
                $data['kota_tujuan_3'] = $this->input->post('inpKotaTujuan33');
                break;
            default : break;
        }
        $data['no_spt'] = '-';
        $data['status_approval'] = '0';
        if ($action == 'add') {
            $this->perjalanan_dinas_model->add($data);
        } else {
            $this->perjalanan_dinas_model->edit($id, $data);
        }

        redirect('transaksi/perjalanan_dinas');
    }

    public function delete($id) {
        $this->transaksiperjalanandinasheader_model->delete($id);
        redirect('transaksi/perjalanandinas');
    }

    // tambahan

    public function jumlahtujuan($jumlahtujuan) {
        $data['akun'] = $this->akun;
        $data['jumlahtujuan'] = $jumlahtujuan;
        $data['title'] = $this->title_page;
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

}

?>