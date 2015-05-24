<?php

//Created By    : Rizal
//Updated By    : Rizal
//Created Date  : 1 Mei 2015
//Updated Date  : 1 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/counter.php');

class Detail_pengajuan_honorarium extends CI_Controller {

    var $status_approval = array(
        '0' => 'baru dibuat',
        '1' => 'menunggu verifikasi esselon 4',
        '2' => 'menunggu verifikasi esselon 3',
        '3' => 'menunggu verifikasi asisten satker',
        '4' => 'menunggu verifikasi PPK',
        '5' => 'lengkap'
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
        $this->load->model('transaksi/pengajuan_honorarium_model');
        $this->load->model('transaksi/detail_pengajuan_honorarium_model');
        $this->load->model('master/anggaran_model');
        $this->load->model('master/pegawai_model');
        $this->load->model('master/kota_tujuan_model');
        $this->load->model('master/listcode_model');
        $this->load->model('master/biaya_akomodasi_model');
        $this->load->model('master/biaya_penginapan_model');
        $this->load->model('master/biaya_tiket_model');
        $this->load->model('master/barang_model');
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_honorarium/list';
        $data['list_data'] = $this->pengajuan_honorarium_model->select_all()->result();
        $data['status_approval'] = $this->status_approval;
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_honorarium/view';
        $data['data'] = $this->pengajuan_honorarium_model->select_by_id($id)->row();
        $param = array(
            'id_header' => $id
        );
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_jenisBarang'] = $this->listcode_model->select_by_field('list_name', 'Jenis Barang')->result();
        $data['SIList_nama_barang'] = $this->barang_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_honorarium/add';
        $data['SIList_anggaran'] = $this->anggaran_model->select_all()->result();
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_jenisBarang'] = $this->listcode_model->select_by_field('list_name', 'Jenis Barang')->result();
        $data['SIList_nama_barang'] = $this->barang_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id, $kodejenis) {
        $data['title'] = $this->title_page;
        $data['id_detail_barang'] = $this->input->post('inIdDetailBarang');
        $data['page'] = 'admin/transaksi/detail_pengajuan_honorarium/edit';
        
        
        if (strpos($kodejenis, '%20') !== false) {
            $x = explode('%20', $kodejenis);
            $y = $x[0] . ' ' . $x[1];
        } else {
            $y = $kodejenis;
        }
        $data['data'] = $this->detail_pengajuan_honorarium_model->select_by_field('id', $id)->row();

        print_r($data);
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_jenisBarang'] = $this->listcode_model->select_by_field('list_name', 'Jenis Barang')->result();
        $data['SIList_nama_barang'] = $this->barang_model->select_all()->result();
//        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {
        $data['id_pengajuan_honorarium'] = $this->input->post('inIdHeader');
        $data['id_jenis_barang'] = $this->input->post('inKodeJenisBarang');
        $data['id_barang'] = $this->input->post('inNamaBarang');
        $data['jumlah'] = $this->input->post('inJumlah');

//        print_r($data);

        if ($action == 'add') {
            $this->detail_pengajuan_honorarium_model->add($data);
        } else {
            $this->detail_pengajuan_honorarium_model->edit($id, $data);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id) {
        $this->detail_pengajuan_honorarium_model->delete($id);
        redirect($_SERVER['HTTP_REFERER']);
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
                $data['no_spt'] = $counter . "/SPPD/SATKER/LP/" . $this->bulan_romawi[date('m')] . "/" . date('Y');
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
    public function getDetailBarang() {
        $id = $this->input->post('id', TRUE);
        $data['data'] = $this->barang_model->getDetailBarang($id);
        $output1 = null;
        $output2 = null;
        foreach ($data['data'] as $row) {
            $output1 .=$row->satuan;
            $arr[0] = $output1;
            $output2 .=$row->pagu_harga;
            $arr[1] = $output2;
        }
        echo json_encode($arr);
    }

    public function cek_counter() {
        $this->counter = new Counter();
        $kode = $this->bulan_romawi[date('m')] . "-" . date('Y');
        echo $this->counter->generateId($kode);
    }

    public function getSubtotalBiaya() {
        $nama_kota = $this->input->post('nama_kota', TRUE);
        $statuspeg = $this->input->post('statuspeg', TRUE);

        $data['uangharian'] = $this->biaya_akomodasi_model->getBiayaHarian($nama_kota, $statuspeg);
        $output1 = null;

        foreach ($data['uangharian'] as $row) {
            $output1 .=$row->biaya;
            $arr[0] = $output1;
        }
        echo json_encode($arr);
    }

    public function getSubtotalPenginapan() {
        $nama_kota = $this->input->post('nama_kota', TRUE);
        $golongan = $this->input->post('golongan', TRUE);

        $pieces = explode("/", $golongan);

        $data['penginapan'] = $this->biaya_penginapan_model->getBiayaPenginapan($nama_kota, $pieces[0]);
        $output1 = null;

        foreach ($data['penginapan'] as $row) {
            $output1 .=$row->biaya;
            $arr[0] = $output1;
        }
        echo json_encode($arr);
    }

    public function getBiayaHotelNonHotel() {
        $id = $this->input->post('id', TRUE);
        $nama_kota = $this->input->post('nama_kota', TRUE);
        $golongan = $this->input->post('golongan', TRUE);

        $pieces = explode("/", $golongan);

        $data['penginapan'] = $this->biaya_penginapan_model->getBiayaPenginapan($nama_kota, $pieces[0]);
        $output1 = null;

        foreach ($data['penginapan'] as $row) {
            $output1 .=$row->biaya;
            if ($id === 'Non Hotel') {
                $arr[0] = ($output1 * 30) / 100;
            } else {
                $arr[0] = $output1;
            }
        }
        echo json_encode($arr);
    }

    public function populateTransport() {
        $param = $this->input->post('kota_asal', TRUE);
        $param2 = $this->input->post('kota_tujuan', TRUE);
        $data['transport'] = $this->biaya_tiket_model->populateTransport($param, $param2);
        $output = null;
        $output = "<option value=''>Pilih</option>";
        if ($data['transport']) {
            foreach ($data['transport'] as $row) {
                $output .= "<option value='" . $row->jenis_kendaraan . "'>" . $row->jenis_kendaraan . "</option>";
            }
            echo $output;
        } else {
            $output .= "<option value=''>-Data Master Belum Diisi-</option>";
            echo $output;
        }
    }

    public function calculateTransport() {
        $param = $this->input->post('id', TRUE);
        $param2 = $this->input->post('kota_asal', TRUE);
        $param3 = $this->input->post('kota_tujuan', TRUE);
        $data['transport'] = $this->biaya_tiket_model->calculateTransport($param, $param2, $param3);
        $output = null;
        foreach ($data['transport'] as $row) {
            $output .=$row->biaya;
        }
        echo $output;
    }

    public function hitungTotal() {
        $param = $this->input->post('a', TRUE);
        $param2 = $this->input->post('b', TRUE);
        $param3 = $this->input->post('c', TRUE);
        $param4 = $this->input->post('d', TRUE);
        $param5 = $this->input->post('e', TRUE);
        echo $param + $param2 + $param3 + $param4 + $param5;
    }

    public function dayBetweenTwoDates() {
        $par1 = $this->input->post('par1', TRUE);
        $par2 = $this->input->post('par2', TRUE);
        $datediff = (strtotime($par1) - strtotime($par2));
        $floor = floor($datediff / (60 * 60 * 24));
        echo $floor + 1;
    }

}

?>
