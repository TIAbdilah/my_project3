<?php

//Programer     : Taufik Ismail Abdilah
//Created Date  : 26 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('counter.php');

class Perjalanan_dinas extends CI_Controller {

    var $status = array(
        '0' => 'baru dibuat',
        '1' => 'menunggu verivikasi esselon 4',
        '2' => 'menunggu verivikasi esselon 3',
        '3' => 'menunggu verivikasi asisten satker',
        '4' => 'menunggu verivikasi PPK',
        '5' => 'lima'
    );
    var $bulan_romawi = array(
        '01' => 'I',
        '02' => 'II',
        '03' => 'III',
        '04' => 'IV',
        '05' => 'V',
        '06' => 'VI',
        '07' => 'VII',
        '08' => 'VIII',
        '09' => 'IX',
        '10' => 'X',
        '11' => 'XI',
        '12' => 'XII'
    );
    var $title_page = "e-satker | Perjalanan Dinas";

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/detail_perjalanan_dinas_model');
        $this->load->model('transaksi/komentar_model');
        $this->load->model('anggaran_model');
        $this->load->model('pegawai_model');
        $this->load->model('kota_tujuan_model');
        $this->load->model('listcode_model');
        $this->load->model('biaya_akomodasi_model');
        $this->load->model('biaya_penginapan_model');
        $this->load->model('biaya_tiket_model');
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/perjalanan_dinas/list';
        $data['list_data'] = $this->perjalanan_dinas_model->select_all()->result();
        $data['status'] = $this->status;
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/perjalanan_dinas/view';
        $data['data'] = $this->perjalanan_dinas_model->select_by_id($id)->row();
        $param = array(
            'id_header' => $id
        );
        $data['list_data_detail'] = $this->detail_perjalanan_dinas_model->select_by_field($param)->result();
        $data['list_data_komentar'] = $this->komentar_model->select_by_field($param)->result();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/perjalanan_dinas/add';
        $data['SIList_anggaran'] = $this->anggaran_model->select_all()->result();
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/perjalanan_dinas/edit';
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
        $this->perjalanan_dinas_model->delete($id);
        redirect('transaksi/perjalanan_dinas');
    }

    // tambahan

    public function update_status($id_header) {
        $aksi = $this->input->post('inpAksi');
        $status = $this->input->post('inpStatus');
        if ($aksi == 'Setuju' || $aksi == 'Ajukan') {
            $data['status'] = $status + 1;
            $this->perjalanan_dinas_model->update_status($id_header, $data);
            if ($this->session->userdata('role') == 'ppk') {
                $this->counter = new Counter();
                $pattern = $this->bulan_romawi[date('m')] . "-" . date('Y');
                $counter = $this->counter->generateId($pattern);
                $data['no_spt'] = $counter."/SPPD/SATKER/LP/" . $this->bulan_romawi[date('m')] . "/" . date('Y');
                $this->perjalanan_dinas_model->update_no_spt($id_header, $data);
            }
        } else {
            $data['status'] = $status - 1;
            $this->perjalanan_dinas_model->update_status($id_header, $data);

            $data['id_header'] = $id_header;
            $data['username'] = $this->session->userdata('role');
            $data['komentar'] = $this->input->post('inpKomentar');
            $this->komentar_model->add($data);
        }
        redirect('transaksi/perjalanan_dinas');
    }

    //tambahan untuk ajax
    public function getDetailPegawai() {
        $id = $this->input->post('id', TRUE);
        $data['golAndStat'] = $this->pegawai_model->getDetailPegawai($id);
        $output1 = null;
        $output2 = null;
        foreach ($data['golAndStat'] as $row) {
            $output1 .=$row->golongan;
            $arr[0] = $output1;
            $output2 .=$row->status;
            $arr[1] = $output2;
        }
        echo json_encode($arr);
    }

    public function cek_counter() {
        $this->counter = new Counter();
        $kode = $this->bulan_romawi[date('m')] . "-" . date('Y');
        echo $this->counter->generateId($kode);
    }

}

?>
