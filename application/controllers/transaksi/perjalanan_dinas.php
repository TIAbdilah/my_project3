<?php

//Programer     : Taufik Ismail Abdilah
//Created Date  : 26 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/counter.php');

class Perjalanan_dinas extends CI_Controller {

    var $status = array(
        '0' => 'baru dibuat',
        '1' => 'menunggu verifikasi esselon 4',
        '2' => 'menunggu verifikasi esselon 3',
        '3' => 'menunggu verifikasi asisten satker',
        '4' => 'menunggu verifikasi PPK',
        '5' => 'lengkap'
    );
    var $status_diklat = array(
        '0' => 'Tidak',
        '1' => 'Ya',
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
        $this->load->model('master/anggaran_model');
        $this->load->model('master/pegawai_model');
        $this->load->model('master/kota_tujuan_model');
        $this->load->model('master/listcode_model');
        $this->load->model('master/biaya_akomodasi_model');
        $this->load->model('master/biaya_penginapan_model');
        $this->load->model('master/biaya_tiket_model');
        $this->load->model('master/biaya_representatif_model');
        $this->load->model('master/biaya_diklat_model');
        $this->load->model('master/biaya_sewa_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/perjalanan_dinas/list';
        $data['list_data'] = $this->perjalanan_dinas_model->select_all()->result();
        $data['status'] = $this->status;
        $this->load->view('admin/index', $data);
    }

    public function view($id, $jumlah_tujuan) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/perjalanan_dinas/view';
        $data['data'] = $this->perjalanan_dinas_model->select_by_id($id)->row();
        $param = array(
            'id_header' => $id
        );
        if ($jumlah_tujuan == 3) {
            $data['list_data_detail'] = $this->detail_perjalanan_dinas_model->select_by_field_1($param)->result();
        } else {
            $data['list_data_detail'] = $this->detail_perjalanan_dinas_model->select_by_field_1($param)->result();
        }
        $data['list_data_komentar'] = $this->komentar_model->select_by_field($param)->result();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_jenisPenginapan'] = $this->listcode_model->select_by_field('list_name', 'Jenis Penginapan')->result();
        $data['SIList_jenisKendaraan'] = $this->listcode_model->select_by_field('list_name', 'Jenis Kendaraan')->result();
        $data['status_diklat'] = $this->status_diklat;
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
        if ($this->input->post('inDiklat') == 'Ya') {
            $data['status_diklat'] = '1';
        } else {
            $data['status_diklat'] = '0';
        }

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
                $data['no_spt'] = $counter . "/SPPD/SATKER/LP/" . $this->bulan_romawi[date('m')] . "/" . date('Y');
                $data['tanggal_approval'] = date('yyyy-mm-dd');
                $this->perjalanan_dinas_model->update_no_spt($id_header, $data);
                $data['status_penolakan'] = 0;
                $this->perjalanan_dinas_model->update_status_penolakan($id_header, $data);
            }
        } else {
            $data['status'] = $status - 1;
            $data['status_penolakan'] = 1;
            $this->perjalanan_dinas_model->update_status_penolakan($id_header, $data);

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
        if ($data['golAndStat'] == null) {
            $arr[0] = '';
            $arr[1] = '';
        }
        echo json_encode($arr);
    }

    public function getSubtotalBiaya() {
        $nama_kota = $this->input->post('nama_kota', TRUE);
        $id_pegawai = $this->input->post('id', TRUE);

        $data['uangharian'] = $this->biaya_akomodasi_model->getBiayaHarian($nama_kota, $id_pegawai);
        $output1 = null;

        foreach ($data['uangharian'] as $row) {
            $output1 .=$row->biaya;
            $arr[0] = $output1;
        }
        if ($data['uangharian'] == null) {
            $arr[0] = 0;
        }
        echo json_encode($arr);
    }

    public function getBiayaRepresentatif() {
        $nama_kota = $this->input->post('nama_kota', TRUE);
        $id_pegawai = $this->input->post('id', TRUE);

        $data['uangrepresentatif'] = $this->biaya_representatif_model->getBiayaRepresentatif($nama_kota, $id_pegawai);
        $output1 = null;

        foreach ($data['uangrepresentatif'] as $row) {
            $output1 .=$row->biaya;
            $arr[0] = $output1;
        }
        if ($data['uangrepresentatif'] == null) {
            $arr[0] = 0;
        }
        echo json_encode($arr);
    }

    public function getBiayaDiklat() {
        $nama_kota = $this->input->post('nama_kota', TRUE);

        $data['uangdiklat'] = $this->biaya_diklat_model->getBiayaDiklat($nama_kota);
        $output1 = null;

        foreach ($data['uangdiklat'] as $row) {
            $output1 .=$row->biaya;
            $arr[0] = $output1;
        }
        if ($data['uangdiklat'] == null) {
            $arr[0] = 0;
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
        if ($data['penginapan'] == null) {
            $arr[0] = 0;
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
        $param = $this->input->post('kota_asal1', TRUE);
        $param2 = $this->input->post('kota_tujuan1', TRUE);
        $param3 = $this->input->post('kota_asal2', TRUE);
        $param4 = $this->input->post('kota_tujuan2', TRUE);
        $param5 = $this->input->post('kota_asal3', TRUE);
        $param6 = $this->input->post('kota_tujuan3', TRUE);


        $data['transport'] = $this->biaya_tiket_model->populateTransport($param, $param2);
        $output1 = null;
        $output1 = "<option value=''>Pilih</option>";
        if ($data['transport']) {
            foreach ($data['transport'] as $row) {
                $output1 .= "<option value='" . $row->jenis_kendaraan . "'>" . $row->jenis_kendaraan . "</option>";
            }
            $arr[0] = $output1;
        } else {
            $output1 .= "<option value=''>-Data Master Belum Diisi-</option>";
            $arr[0] = $output1;
        }

        $data['transport2'] = $this->biaya_tiket_model->populateTransport($param3, $param4);
        $output2 = null;
        $output2 = "<option value=''>Pilih</option>";
        if ($data['transport2']) {
            foreach ($data['transport2'] as $row) {
                $output2 .= "<option value='" . $row->jenis_kendaraan . "'>" . $row->jenis_kendaraan . "</option>";
            }
            $arr[1] = $output2;
        } else {
            $output2 .= "<option value=''>-Data Master Belum Diisi-</option>";
            $arr[1] = $output2;
        }

        $data['transport'] = $this->biaya_tiket_model->populateTransport($param5, $param6);
        $output3 = null;
        $output3 = "<option value=''>Pilih</option>";
        if ($data['transport']) {
            foreach ($data['transport'] as $row) {
                $output3 .= "<option value='" . $row->jenis_kendaraan . "'>" . $row->jenis_kendaraan . "</option>";
            }
            $arr[2] = $output3;
        } else {
            $output3 .= "<option value=''>-Data Master Belum Diisi-</option>";
            $arr[2] = $output3;
        }

        $data['transport'] = $this->biaya_tiket_model->populateTransport($param5, $param6);
        $output4 = null;
        $output4 = "<option value=''>Pilih</option>";
        if ($data['transport']) {
            foreach ($data['transport'] as $row) {
                $output4 .= "<option value='" . $row->jenis_kendaraan . "'>" . $row->jenis_kendaraan . "</option>";
            }
            $arr[3] = $output4;
        } else {
            $output4 .= "<option value=''>-Data Master Belum Diisi-</option>";
            $arr[3] = $output4;
        }

        echo json_encode($arr);
    }

    public function populateSewa() {
        $param1 = $this->input->post('kota_tujuan1', TRUE);
        $param2 = $this->input->post('kota_tujuan2', TRUE);
        $param3 = $this->input->post('kota_tujuan3', TRUE);


        $data['transportsewa'] = $this->biaya_sewa_model->populateSewa($param1);
        $output1 = null;
        $output1 = "<option value=''>Pilih</option>";
        if ($data['transportsewa']) {
            foreach ($data['transportsewa'] as $row) {
                $output1 .= "<option value='" . $row->jenis_kendaraan . "'>" . $row->jenis_kendaraan . "</option>";
            }
            $arr[0] = $output1;
        } else {
            $output1 .= "<option value=''>- Master Biaya Sewa Belum Diisi -</option>";
            $arr[0] = $output1;
        }
        
        $data['transportsewa'] = $this->biaya_sewa_model->populateSewa($param2);
        $output2 = null;
        $output2 = "<option value=''>Pilih</option>";
        if ($data['transportsewa']) {
            foreach ($data['transportsewa'] as $row) {
                $output2 .= "<option value='" . $row->jenis_kendaraan . "'>" . $row->jenis_kendaraan . "</option>";
            }
            $arr[0] = $output2;
        } else {
            $output2 .= "<option value=''>- Master Biaya Sewa Belum Diisi -</option>";
            $arr[0] = $output2;
        }
        
                $data['transportsewa'] = $this->biaya_sewa_model->populateSewa($param2);
        $output3 = null;
        $output3 = "<option value=''>Pilih</option>";
        if ($data['transportsewa']) {
            foreach ($data['transportsewa'] as $row) {
                $output3 .= "<option value='" . $row->jenis_kendaraan . "'>" . $row->jenis_kendaraan . "</option>";
            }
            $arr[0] = $output3;
        } else {
            $output3 .= "<option value=''>- Master Biaya Sewa Belum Diisi -</option>";
            $arr[0] = $output3;
        }

        echo json_encode($arr);
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
        if ($data['transport'] == null) {
            $arr[0] = 0;
        }
        echo $output;
    }
    
    public function calculateSewa() {
        $param = $this->input->post('id', TRUE);
        $param2 = $this->input->post('kota_tujuan', TRUE);
        $data['transportsewa'] = $this->biaya_sewa_model->calculateSewa($param, $param2);
        $output = null;
        foreach ($data['transportsewa'] as $row) {
            $output .=$row->biaya;
        }
        if ($data['transportsewa'] == null) {
            $arr[0] = 0;
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

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>
