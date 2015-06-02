<?php

//Created By    : Rizal
//Updated By    : Rizal
//Created Date  : 1 Mei 2015
//Updated Date  : 1 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/counter.php');

class Pengajuan_barang extends CI_Controller {

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
        $this->load->model('transaksi/pengajuan_barang_model');
        $this->load->model('transaksi/detail_pengajuan_barang_model');
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
        $data['page'] = 'admin/transaksi/pengajuan_barang/list';
        $data['list_data'] = $this->pengajuan_barang_model->select_all()->result();
        $data['status_approval'] = $this->status_approval;
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_barang/view';
        $data['data'] = $this->pengajuan_barang_model->select_by_id($id)->row();
        $param = array(
            'id_header' => $id
        );
        $data['list_data_komentar'] = $this->komentar_model->select_by_field($param)->result();
        $data['list_data'] = $this->detail_pengajuan_barang_model->select_by_id($id)->result();
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_jenisBarang'] = $this->listcode_model->select_by_field('list_name', 'Jenis Barang')->result();

        if (empty($data['data']->kode_jenis_barang)) {
            $data['SIList_barang'] = $this->barang_model->select_all()->result();
        } else {
            $param2 = array(
                'kode_jenis_barang' => $data['data']->kode_jenis_barang,
                'head_nama_barang' => '1'
            );
            $data['SIList_barang'] = $this->barang_model->select_by_field($param2)->result();
            $param3 = array(
                'kode_jenis_barang' => $data['data']->kode_jenis_barang,
                'head_merek_barang' => '1'
            );
            $data['SIList_merekbarang'] = $this->barang_model->select_by_field($param3)->result();
            $param4 = array(
                'kode_jenis_barang' => $data['data']->kode_jenis_barang,
                'head_spesifikasi' => '1'
            );
            $data['SIList_spesifikasi'] = $this->barang_model->select_by_field($param4)->result();
        }

        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_barang/add';
        $data['SIList_anggaran'] = $this->anggaran_model->select_all()->result();
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_jenisBarang'] = $this->listcode_model->select_by_field('list_name', 'Jenis Barang')->result();
        $data['SIList_nama_barang'] = $this->barang_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_barang/edit';
        $data['data'] = $this->pengajuan_barang_model->select_by_id($id)->row();
        $data['anggaran'] = $this->anggaran_model->getDetailAnggaran2($data['data']->id)->row();
        $data['SIList_anggaran'] = $this->anggaran_model->select_all()->result();
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_jenisBarang'] = $this->listcode_model->select_by_field('list_name', 'Jenis Barang')->result();
        $data['SIList_nama_barang'] = $this->barang_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_anggaran'] = $this->input->post('inIdAnggaran');
        $data['maksud_kegiatan'] = $this->input->post('inMaksudKegiatan');
        $data['tanggal_pengajuan'] = $this->input->post('inTanggalPengajuan');
        $data['kode_jenis_barang'] = $this->input->post('inKodeJenisBarang');

        $data['nomor_pengajuan'] = '-';
        $data['status_approval'] = '0';
        if ($action == 'add') {
            $this->pengajuan_barang_model->add($data);
        } else {
            $this->pengajuan_barang_model->edit($id, $data);
        }

        redirect('transaksi/pengajuan_barang');
    }

    public function delete($id) {
        $this->perjalanan_dinas_model->delete($id);
        redirect('transaksi/perjalanan_dinas');
    }

    // tambahan

    public function update_status($id_header) {
        $aksi = $this->input->post('inpAksi');
        $data['tolak'] = 0;
        $status = $this->input->post('inpStatus');
        if ($aksi == 'Setuju' || $aksi == 'Ajukan') {
            $data['status_approval'] = $status + 1;
//            print_r($status);
            $this->pengajuan_barang_model->update_status($id_header, $data);
            if ($this->session->userdata('role') == 'ppk') {
                $this->counter = new Counter();
                $pattern = $this->bulan_romawi[date('m')] . "-" . date('Y') . "-" . "BARANG";
                $counter = $this->counter->generateId($pattern);
                $subcounter = substr($counter, 0, 6);
                $data['nomor_pengajuan'] = $subcounter . "/BARANG/SATKER/LP/" . $this->bulan_romawi[date('m')] . "/" . date('Y');
                $data['tanggal_approval'] = date('Y-m-d');
                $this->pengajuan_barang_model->update_no_spt($id_header, $data);
                $data['status_penolakan'] = 0;
                $this->pengajuan_barang_model->update_status_penolakan($id_header, $data);
            } else {
                $data['status_penolakan'] = 0;
                $this->pengajuan_barang_model->update_status_penolakan($id_header, $data);
            }
            redirect('transaksi/pengajuan_barang');
        } else { //kalo ditolak
            $komen = $this->input->post("inpKomentar");
            if (empty($komen)) {
                $this->session->set_flashdata('result', '<div class="alert alert-danger" role="alert">Untuk menolak, kolom komentar harus diisi</div>');
                redirect($_SERVER['HTTP_REFERER'], $data);
            } else {
                $data['status_approval'] = $status - 1;
                $data['status_penolakan'] = 1;
                $this->pengajuan_barang_model->update_status_penolakan($id_header, $data);

                $this->pengajuan_barang_model->update_status($id_header, $data);

                $data['id_header'] = $id_header;
                $data['username'] = $this->session->userdata('role');
                $data['komentar'] = $this->input->post('inpKomentar');
                $this->komentar_model->add($data);
                redirect('transaksi/pengajuan_barang');
            }
        }
    }

    //tambahan untuk ajax
    public function getDetailBarang() {
        $param1 = $this->input->post('nama_barang', TRUE);
        $param2 = $this->input->post('merek_barang', TRUE);
        $param3 = $this->input->post('spesifikasi', TRUE);


        $data['data'] = $this->barang_model->getDetailBarang($param1, $param2, $param3);
        $output1 = null;
        $output2 = null;
        $output3 = null;
        foreach ($data['data'] as $row) {
            $output1 .=$row->satuan;
            $arr[0] = $output1;
            $output2 .=$row->pagu_harga;
            $arr[1] = $output2;
            $output3 .=$row->id;
            $arr[2] = $output3;
        }
        echo json_encode($arr);
    }

    public function getDetailAnggaran() {
        $id = $this->input->post('id', TRUE);
        $data['data'] = $this->anggaran_model->getDetailAnggaran($id);
        $output1 = null;
        $output2 = null;
        $output3 = null;
        foreach ($data['data'] as $row) {
            $output1 .=$row->kode_kegiatan;
            $arr[0] = $output1;
            $output2 .=$row->kode_akun;
            $arr[1] = $output2;
            $output3 .=$row->pagu;
            $arr[2] = $output3;
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
        $output = "<option>Pilih Transport</option>";
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

    public function populateBarang() {
        $param1 = $this->input->post('kode_jenis', TRUE);


        $data['barang'] = $this->barang_model->populateBarang($param1);
        $output1 = null;
        $output1 = "<option>Pilih Barang</option>";
        if ($data['barang']) {
            foreach ($data['barang'] as $row) {
                $output1 .= "<option value='" . $row->id . "'>" . $row->nama_barang . "</option>";
            }
            $arr[0] = $output1;
        } else {
            $output1 .= "<option value=''>Master Barang Belum Diisi</option>";
            $arr[0] = $output1;
        }
        echo json_encode($arr);
    }

    public function populateFromNamaBarang() {
        $param1 = $this->input->post('nama_barang', TRUE);


        $data['barang'] = $this->barang_model->populateMerek($param1);
        $output1 = null;
        $output1 = "<option>Pilih Merek Barang</option>";
        if ($data['barang']) {
            foreach ($data['barang'] as $row) {
                $output1 .= "<option value='" . $row->merek_barang . "'>" . $row->merek_barang . "</option>";
            }
            $arr[0] = $output1;
        } else {
            $output1 .= "<option value=''>Master Barang Belum Lengkap</option>";
            $arr[0] = $output1;
        }

        $data['barang'] = $this->barang_model->populateSpesifikasi($param1);
        $output2 = null;
        $output2 = "<option>Pilih Spesifikasi</option>";
        if ($data['barang']) {
            foreach ($data['barang'] as $row) {
                $output2 .= "<option value='" . $row->spesifikasi . "'>" . $row->spesifikasi . "</option>";
            }
            $arr[1] = $output2;
        } else {
            $output2 .= "<option value=''>Master Barang Belum Lengkap</option>";
            $arr[1] = $output2;
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
