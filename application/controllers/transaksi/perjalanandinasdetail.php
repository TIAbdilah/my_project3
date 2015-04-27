<?php

//Programer     : Rizal Fauzi Rahman
//Created Date  : 11 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perjalanandinasdetail extends CI_Controller {

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
        $this->akun = array(
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role')
        );
    }

    public function index() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Perjalanan Dinas";
        $data['page'] = 'transaksi/perjalanandinas/list';
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
        $data['title'] = "e-satker | Perjalanan Dinas Detail";
        $data['page'] = 'transaksi/perjalanandinas/detail/add';
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_kota_tujuan'] = $this->biaya_akomodasi_model->select_all()->result();
        $data['SIList_jenis_penginapan'] = $this->biaya_penginapan_model->select_all()->result();
        $data['SIList_jenisKendaraan'] = $this->listcode_model->select_by_field('list_name', 'Jenis Kendaraan')->result();
        $data['SIList_jenisPenginapan'] = $this->listcode_model->select_by_field('list_name', 'Jenis Penginapan')->result();
        $data['SIList_jenisKendaraanPendukung'] = $this->listcode_model->select_by_field('list_name', 'Jenis Kendaraan Pendukung')->result();
        $this->load->view('admin/index', $data);
    }

    public function jumlahtujuan($jumlahtujuan) {
        $data['akun'] = $this->akun;
        $data['jumlahtujuan'] = $jumlahtujuan;
        $data['title'] = "e-satker | Perjalanan Dinas";
        $data['page'] = 'transaksi/perjalanandinas/detail/add';
        $data['SIList_akun'] = $this->akun_model->select_all()->result();
        $data['SIList_kegiatan'] = $this->kegiatan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Perjalanan Dinas";
        $data['page'] = 'transaksi/perjalanandinas/detail/edit';
        $data['row'] = $this->anggaran_model->select_by_id($id)->row();
        $data['SIList_akun'] = $this->akun_model->select_all()->result();
        $data['SIList_kegiatan'] = $this->kegiatan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_pegawai'] = $this->input->post('inPegawai');
        $data['id_transaksi_perjalanandinas_header'] = $this->input->post('inputIdHeader');
        $data['transport_pendukung'] = $this->input->post('inTransportPendukung');
        $data['jenis_penginapan'] = $this->input->post('inPengingapan');
        $data['pengeluaran_riil'] = $this->input->post('inPengeluaranRiil');

        $data['jadwal_berangkat1'] = $this->input->post('outJadwalBerangkat1');
        $data['jadwal_pulang1'] = $this->input->post('outJadwalPulang1');
        $data['jadwal_berangkat2'] = $this->input->post('outJadwalBerangkat2');
        $data['jadwal_pulang2'] = $this->input->post('outJadwalPulang2');
        $data['jadwal_berangkat3'] = $this->input->post('outJadwalBerangkat3');
        $data['jadwal_pulang3'] = $this->input->post('outJadwalPulang3');

        $data['biaya_akomodasi1'] = $this->input->post('inBiayaAkomodasi1');
        $data['biaya_akomodasi2'] = $this->input->post('inBiayaAkomodasi2');
        $data['biaya_akomodasi3'] = $this->input->post('inBiayaAkomodasi3');

        $data['biaya_penginapan1'] = $this->input->post('inBiayaPenginapan1');
        $data['biaya_penginapan2'] = $this->input->post('inBiayaPenginapan2');
        $data['biaya_penginapan3'] = $this->input->post('inBiayaPenginapan3');

        $data['kota_tujuan1'] = $this->input->post('detailKotaTujuan1');
        $data['kota_tujuan2'] = $this->input->post('detailKotaTujuan2');
        $data['kota_tujuan3'] = $this->input->post('detailKotaTujuan3');

        $data['transport_utama'] = $this->input->post('inTransportUtamaTotal');

        if ($action == 'add3') {
            $this->transaksiperjalanandinasdetail_model->add3($data);
        } else if ($action == 'add2') {
            $this->transaksiperjalanandinasdetail_model->add2($data);
        } else if ($action == 'add1') {
            $this->transaksiperjalanandinasdetail_model->add1($data);
        } else {
            $this->transaksiperjalanandinasdetail_model->edit($id, $data);
        }

        redirect('transaksi/perjalanandinas');
    }

    public function delete($id) {
        $this->transaksiperjalanandinasdetail_model->delete($id);
        redirect('transaksi/perjalanandinas');
    }

    public function getNip() {
        $id_nip = $this->input->post('id', TRUE);
        $data['nipDanGolongan'] = $this->pegawai_model->getNipDanGolongan($id_nip);
        $output = null;
        foreach ($data['nipDanGolongan'] as $row) {
//            $output .="<input value='" . $row->nip . "' id='inNIP'>";
            $output .=$row->nip;
        }
        echo $output;
    }

    public function getGolongan() {

        $id_nip = $this->input->post('id', TRUE);
        $data['nipDanGolongan'] = $this->pegawai_model->getNipDanGolongan($id_nip);
        $output = null;
        foreach ($data['nipDanGolongan'] as $row) {
            $output .=$row->golongan;
        }
        echo $output;
    }

    public function calculateAkomodasi() {

        $id_kota = $this->input->post('id', TRUE);
//        echo '<script language="javascript">';
//        echo 'alert("message successfully sent' . $id_kota . '")';
//        echo '</script>';
        $data['akomodasi'] = $this->biaya_akomodasi_model->calculateAkomodasi($id_kota);
        $output = null;

        foreach ($data['akomodasi'] as $row) {
            $output .=$row->biaya;
        }
        echo $output;
    }

    public function calculatePenginapan() {
        $nama_kota = $this->input->post('nama_kota', TRUE);

        $data['penginapan'] = $this->biaya_penginapan_model->calculatePenginapan($nama_kota);
        $output = null;
        foreach ($data['penginapan'] as $row) {
            $output .=$row->biaya;
        }
        echo $output;
    }

    public function populateTransport() {
        $param = $this->input->post('nama_kota', TRUE);

        $data['transport'] = $this->biaya_tiket_model->populateTransport($param);
        $output = null;
        $output = "<option value=''>--Jenis Kendaraan--</option>";
        if ($data['transport']) {
            foreach ($data['transport'] as $row) {
                $output .= "<option value='" . $row->id . "'>" . $row->jenis_kendaraan . "</option>";
            }
            echo $output;
        } else {
            $output .= "<option value=''>-Data Master Belum Diisi-</option>";
            echo $output;
        }
    }

    public function calculateTransport() {
        $param = $this->input->post('id', TRUE);

        $data['transport'] = $this->biaya_tiket_model->calculateTransport($param);
        $output = null;
        foreach ($data['transport'] as $row) {
            $output .=$row->biaya;
        }
        echo $output;
    }

    public function dayBetweenTwoDates() {
        $par1 = $this->input->post('par1', TRUE);
        $par2 = $this->input->post('par2', TRUE);
        $par3 = $this->input->post('par3', TRUE);
        $par4 = $this->input->post('par4', TRUE);
        $par5 = $this->input->post('par5', TRUE);
        $par6 = $this->input->post('par6', TRUE);
        $datediff = (strtotime($par5) - strtotime($par6)) + (strtotime($par3) - strtotime($par4)) + (strtotime($par1) - strtotime($par2));
        echo floor($datediff / (60 * 60 * 24));
    }

    public function hitungAkomodasi() {
        $par1 = $this->input->post('par1', TRUE);
        $par2 = $this->input->post('par2', TRUE);
        $par3 = $this->input->post('par3', TRUE);
        $par4 = $this->input->post('par4', TRUE);
        $par5 = $this->input->post('par5', TRUE);
        $par6 = $this->input->post('par6', TRUE);

        $arr = array();
        $arr[0] = floor((strtotime($par1) - strtotime($par2)) / (60 * 60 * 24));
        $arr[1] = floor((strtotime($par3) - strtotime($par4)) / (60 * 60 * 24));
        $arr[2] = floor((strtotime($par5) - strtotime($par6)) / (60 * 60 * 24));

        $par7 = $this->input->post('par7', TRUE);
        $par8 = $this->input->post('par8', TRUE);
        $par9 = $this->input->post('par9', TRUE);
//calculate akomodasi
        $data['akomodasi'] = $this->biaya_akomodasi_model->calculateAkomodasi($par7);
        $output1 = null;
        foreach ($data['akomodasi'] as $row) {
            $output1 .=$row->biaya;
        }
        $arr[3] = $output1;

        $data['akomodasi'] = $this->biaya_akomodasi_model->calculateAkomodasi($par8);
        $output2 = null;
        foreach ($data['akomodasi'] as $row) {
            $output2 .=$row->biaya;
        }
        $arr[4] = $output2;

        $data['akomodasi'] = $this->biaya_akomodasi_model->calculateAkomodasi($par9);
        $output3 = null;
        foreach ($data['akomodasi'] as $row) {
            $output3 .=$row->biaya;
        }
        $arr[5] = $output3;
        $arr[6] = ($arr[0] * $output1) + ($arr[1] * $output2) + ($arr[2] * $output3);
//calculate penginapan
        $data['penginapan'] = $this->biaya_penginapan_model->calculatePenginapan($par7);
        $output4 = null;
        foreach ($data['penginapan'] as $row) {
            $output4 .=$row->biaya;
        }
        $arr[7] = $output4;

        $data['penginapan'] = $this->biaya_penginapan_model->calculatePenginapan($par8);
        $output5 = null;
        foreach ($data['penginapan'] as $row) {
            $output5 .=$row->biaya;
        }
        $arr[8] = $output5;

        $data['penginapan'] = $this->biaya_penginapan_model->calculatePenginapan($par9);
        $output6 = null;
        foreach ($data['penginapan'] as $row) {
            $output6 .=$row->biaya;
        }
        $arr[9] = $output6;

        $arr[10] = ($arr[0] * $output4) + ($arr[1] * $output5) + ($arr[2] * $output6);

        echo json_encode($arr);
    }

    public function hitungTotal() {
        $param = $this->input->post('a', TRUE);
        $param2 = $this->input->post('b', TRUE);
        $param3 = $this->input->post('c', TRUE);
        $param4 = $this->input->post('d', TRUE);
        $param5 = $this->input->post('e', TRUE);
        echo $param + $param2 + $param3 + $param4 + $param5;
    }

}

?>