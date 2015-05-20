<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 20 Mei 2015
//Updated Date  : 20 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_panjar extends CI_Controller {

    var $title_page = "e-satker | Detail Uang Muka Perjalanan Dinas";

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/detail_panjar_model');
        $this->load->model('master/pegawai_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_panjar/list';
        $data['list_data'] = $this->detail_panjar_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_panjar/view';
        $data['data'] = $this->detail_panjar_model->select_by_id($id)->row();
        $data['data_perjadin'] = $this->perjalanan_dinas_model->select_by_id($data['data']->id_header)->row();
        $data['format_date'] = new Format_date();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_panjar/add';
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_perjadin'] = $this->perjalanan_dinas_model->select_by_field(array('status' => 5))->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/detail_panjar/edit';
        $data['data'] = $this->detail_panjar_model->select_by_id($id)->row();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_perjadin'] = $this->perjalanan_dinas_model->select_by_field(array('status' => 5))->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_panjar'] = $this->input->post('inpIdPanjar');
        $data['id_pegawai'] = $this->input->post('inpIdPegawai');
        $data['jumlah'] = $this->input->post('inpJumlah');

        if ($action == 'add') {
            $this->detail_panjar_model->add($data);
        } else {
            $this->detail_panjar_model->delete(array('id_panjar' => $data['id_panjar'], 'id_pegawai' => $data['id_pegawai']));
            $this->detail_panjar_model->add($data);
        }

        $id = $data['id_panjar'];
        redirect('transaksi/panjar/view/' . $id);
    }

    public function delete($id) {
        $this->detail_panjar_model->delete($id);
        redirect('transaksi/detail_panjar');
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>