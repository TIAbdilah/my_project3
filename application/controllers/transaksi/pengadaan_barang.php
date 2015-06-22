<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 26 Apr 2015
//Updated Date  : 20 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/format_date.php');

class Pengadaan_barang extends CI_Controller {

    var $title_page = "e-satker | Uang Pengadaan Barang";

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/pengajuan_barang_model');
        $this->load->model('transaksi/pengadaan_barang_model');
        $this->load->model('transaksi/detail_pengadaan_barang_model');
        $this->load->model('master/pegawai_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengadaan_barang/list';
        $data['list_data'] = $this->pengadaan_barang_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengadaan_barang/view';
        $data['data'] = $this->pengadaan_barang_model->select_by_id($id)->row();
        $data['data_pengajuan_barang'] = $this->pengajuan_barang_model->select_by_id($data['data']->id_header)->row();
		
        $id_param = $data['data']->id;
		$data['jumlah_pengadaan_barang'] = $this->detail_pengadaan_barang_model->select_jumlah(array('id_pengadaan_barang' => $id_param))->row();
        $data['list_detail_pengadaan_barang'] = $this->detail_pengadaan_barang_model->select_by_field(array('id_pengadaan_barang' => $id_param))->result();

         // print_r($data['jumlah_pengadaan_barang']);
        $data['format_date'] = new Format_date();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengadaan_barang/add';
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_pengajuanbarang'] = $this->pengajuan_barang_model->select_by_field(array('status_approval' => 5))->result();
//        print_r($data['SIList_perjadin']);
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengadaan_barang/edit';
        $data['data'] = $this->pengadaan_barang_model->select_by_id($id)->row();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_pengajuanbarang'] = $this->pengajuan_barang_model->select_by_field(array('status_approval' => 5))->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_header'] = $this->input->post('inpIdHeader');
        $data['penerima'] = $this->input->post('inpPenerima');
        $data['deskripsi_pengadaan_barang'] = $this->input->post('inpDeskripsiPengajuanBarang');

        if ($action == 'add') {
            $this->pengadaan_barang_model->add($data);
            $pengadaan_barang = $this->pengadaan_barang_model->select_by_field(array('id_header' => $data['id_header']))->row();
            $id = $pengadaan_barang->id;
        } else {
            $this->pengadaan_barang_model->edit($id, $data);
        }

        redirect('transaksi/pengadaan_barang/view/' . $id);
    }

    public function delete($id) {
        $this->pengadaan_barang_model->delete($id);
        redirect('transaksi/pengadaan_barang');
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>