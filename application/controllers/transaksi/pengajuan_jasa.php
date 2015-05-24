<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 26 Apr 2015
//Updated Date  : 20 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengajuan_jasa extends CI_Controller {

    var $title_page = "e-satker | Pengajuan Jasa";

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/pengajuan_jasa_model');
//        $this->load->model('transaksi/detail_pengajuan_jasa_model');
        $this->load->model('master/pegawai_model');
        $this->load->model('master/anggaran_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_jasa/list';
//        $data['list_data'] = $this->pengajuan_jasa_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_jasa/view';
        $data['data'] = $this->pengajuan_jasa_model->select_by_id($id)->row();
        $data['data_perjadin'] = $this->perjalanan_dinas_model->select_by_id($data['data']->id_header)->row();
        $data['list_detail_pengajuan_jasa'] = $this->detail_pengajuan_jasa_model->select_by_field($data['data']->id)->result();
        $data['format_date'] = new Format_date();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_jasa/add';
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_perjadin'] = $this->perjalanan_dinas_model->select_by_field(array('status' => 5))->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/pengajuan_jasa/edit';
        $data['data'] = $this->pengajuan_jasa_model->select_by_id($id)->row();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_perjadin'] = $this->perjalanan_dinas_model->select_by_field(array('status' => 5))->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_header'] = $this->input->post('inpIdHeader');
        $data['penerima'] = $this->input->post('inpPenerima');
        $data['deskripsi_pengajuan_jasa'] = $this->input->post('inpDeskripsiPanjar');

        $data['no_pengajuan_jasa'] = $this->input->post('inp');
        $data['id_anggaran'] = $this->input->post('inp');
        $data['kegiatan'] = $this->input->post('inp');
        $data['status'] = $this->input->post('inp');
        $data['status_penolakan'] = $this->input->post('inp');

        if ($action == 'add') {
            $this->pengajuan_jasa_model->add($data);
            $pengajuan_jasa = $this->pengajuan_jasa_model->select_by_field(array('id_header' => $data['id_header']))->row();
            $id = $pengajuan_jasa->id;
        } else {
            $this->pengajuan_jasa_model->edit($id, $data);
        }

        redirect('transaksi/pengajuan_jasa/view/' . $id);
    }

    public function delete($id) {
        $this->pengajuan_jasa_model->delete($id);
        redirect('transaksi/pengajuan_jasa');
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>