<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 20 Mei 2015
//Updated Date  : 20 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pengadaan_barang extends CI_Controller {

    var $title_page = "e-satker | Detail Uang Pengadaan Barang";

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/detail_pengadaan_barang_model');
        $this->load->model('master/pegawai_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_pengadaan_barang/list';
        $data['list_data'] = $this->detail_pengadaan_barang_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_pengadaan_barang/view';
        $data['data'] = $this->detail_pengadaan_barang_model->select_by_id($id)->row();
        $data['data_perjadin'] = $this->perjalanan_dinas_model->select_by_id($data['data']->id_header)->row();
        $data['format_date'] = new Format_date();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_pengadaan_barang/add';
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_perjadin'] = $this->perjalanan_dinas_model->select_by_field(array('status' => 5))->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_pengadaan_barang/edit';
        $data['data'] = $this->detail_pengadaan_barang_model->select_by_id($id)->row();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_perjadin'] = $this->perjalanan_dinas_model->select_by_field(array('status' => 5))->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_pengadaan_barang'] = $this->input->post('inpIdPengadaanBarang');
        $data['id_barang'] = $this->input->post('inpIdBarang');
        $data['jumlah'] = $this->input->post('inpJumlah');

        if ($action == 'add') {
            $this->detail_pengadaan_barang_model->add($data);
        } else {
            $this->detail_pengadaan_barang_model->delete(array('id_pengadaan_barang' => $data['id_pengadaan_barang'], 'id_barang' => $data['id_barang']));
            $this->detail_pengadaan_barang_model->add($data);
        }

        $id = $data['id_pengadaan_barang'];
        redirect('transaksi/pengadaan_barang/view/' . $id);
    }

    public function delete($id) {
        $this->detail_pengadaan_barang_model->delete($id);
        redirect('transaksi/detail_pengadaan_barang');
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>