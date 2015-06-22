<?php

//Created By    : Rizal
//Updated By    : Rizal
//Created Date  : 1 Mei 2015
//Updated Date  : 1 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/counter.php');
require_once(APPPATH . 'controllers/common/array_custom.php');

class Pengajuan_honorarium extends CI_Controller {

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
        $this->load->model('transaksi/komentar_model');
        $this->load->model('transaksi/pengajuan_honorarium_model');
        $this->load->model('transaksi/detail_pengajuan_honorarium_model');
        $this->load->model('master/anggaran_model');
        $this->load->model('master/pegawai_model');
        $this->load->model('master/narasumber_model');
        $this->load->model('master/kota_tujuan_model');
        $this->load->model('master/listcode_model');
        $this->load->model('master/biaya_akomodasi_model');
        $this->load->model('master/biaya_penginapan_model');
        $this->load->model('master/biaya_tiket_model');
        $this->load->model('master/barang_model');
    }

    public function index() {
        $data['title'] = $this->title_page;
        if ($this->session->userdata('role') != 'ppk' && $this->session->userdata('role') != 'asisten satker') {
            $data['page'] = 'admin/transaksi/pengajuan_honorarium/list_filter';
        } else {
            $data['page'] = 'admin/transaksi/pengajuan_honorarium/list';
        }
        $data['list_data'] = $this->pengajuan_honorarium_model->select_all()->result();
        $data['array_custom'] = new Array_custom();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_honorarium/view';
        $data['data'] = $this->pengajuan_honorarium_model->select_by_id($id)->row();
        $param = array(
            'id_header' => $id,
            'tipe_transaksi' => "j"
        );
        $data['list_data_komentar'] = $this->komentar_model->select_by_field($param)->result();
        $data['list_data'] = $this->detail_pengajuan_honorarium_model->select_by_id($id)->result();
        $data['SIList_kota_tujuan'] = $this->kota_tujuan_model->select_all()->result();
        $data['SIList_narasumber'] = $this->narasumber_model->select_all()->result();

        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_honorarium/add';
        $data['SIList_anggaran'] = $this->anggaran_model->select_by_field(array('kata_kunci' => 'jasa profesi'))->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_honorarium/edit';
        $data['data'] = $this->pengajuan_honorarium_model->select_by_id($id)->row();
        $data['anggaran'] = $this->anggaran_model->getDetailAnggaran2($data['data']->id)->row();
        $data['SIList_anggaran'] = $this->anggaran_model->select_by_field(array('kata_kunci' => 'jasa profesi'))->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_anggaran'] = $this->input->post('inIdAnggaran');
        $data['kegiatan'] = $this->input->post('inNamaKegiatan');
        $data['acara'] = $this->input->post('inAcara');
        $data['periode_pembayaran'] = $this->input->post('inPeriodePembayaran');
        $data['nomor_pengajuan'] = '-';
        $data['status_approval'] = '0';
        if ($action == 'add') {
            $this->pengajuan_honorarium_model->add($data);
        } else {
            $this->pengajuan_honorarium_model->edit($id, $data);
        }

        redirect('transaksi/pengajuan_honorarium');
    }

    public function delete($id) {
        $this->pengajuan_honorarium_model->delete($id);
        redirect('transaksi/pengajuan_honorarium');
    }

    // tambahan

    public function update_status($id_header) {
        $aksi = $this->input->post('inpAksi');
        $data['tolak'] = 0;
        $status = $this->input->post('inpStatus');
        if ($aksi == 'Setuju' || $aksi == 'Ajukan') {
            $data['status_approval'] = $status + 1;
//            print_r($status);
            $this->pengajuan_honorarium_model->update_status($id_header, $data);
            if ($this->session->userdata('role') == 'ppk') {
                $this->counter = new Counter();
                $pattern = $this->bulan_romawi[date('m')] . "-" . date('Y') . "-" . "BARANG";
                $counter = $this->counter->generateId($pattern);
                $subcounter = substr($counter, 0, 6);
                $data['nomor_pengajuan'] = $subcounter . "/KPTS/SATKER/Lp/" . $this->bulan_romawi[date('m')] . "/" . date('Y');
                $data['tanggal_approval'] = date('Y-m-d');
                $this->pengajuan_honorarium_model->update_no_spt($id_header, $data);
                $data['status_penolakan'] = 0;
                $this->pengajuan_honorarium_model->update_status_penolakan($id_header, $data);
            } else {
                $data['status_penolakan'] = 0;
                $this->pengajuan_honorarium_model->update_status_penolakan($id_header, $data);
            }
            redirect('transaksi/pengajuan_honorarium');
        } else { //kalo ditolak
            $komen = $this->input->post("inpKomentar");
            if (empty($komen)) {
                $this->session->set_flashdata('result', '<div class="alert alert-danger" role="alert">Untuk menolak, kolom komentar harus diisi</div>');
                redirect($_SERVER['HTTP_REFERER'], $data);
            } else {
                $data['status_approval'] = $status - 1;
                $data['status_penolakan'] = 1;
                $this->pengajuan_honorarium_model->update_status_penolakan($id_header, $data);

                $this->pengajuan_honorarium_model->update_status($id_header, $data);

                $data['id_header'] = $id_header;
                $data['username'] = $this->session->userdata('role');
                $data['komentar'] = $this->input->post('inpKomentar');
                $data['tipe_transaksi'] = "j";
                $this->komentar_model->add($data);
                redirect('transaksi/pengajuan_honorarium');
            }
        }
    }

}

?>
