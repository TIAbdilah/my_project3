<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 26 Apr 2015
//Updated Date  : 20 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/format_date.php');

class Panjar extends CI_Controller {

    var $title_page = "e-satker | Uang Muka Perjalanan Dinas";

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/panjar_model');
        $this->load->model('transaksi/detail_panjar_model');
        $this->load->model('master/pegawai_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/panjar/list';
        $data['list_data'] = $this->panjar_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/panjar/view';
        $data['data'] = $this->panjar_model->select_by_id($id)->row();        
        $data['data_perjadin'] = $this->perjalanan_dinas_model->select_by_id($data['data']->id_header)->row();
        $id_param=$data['data']->id;
        $data['list_detail_panjar'] = $this->detail_panjar_model->select_by_field(array('id_panjar'=>$id_param))->result();
        $data['format_date'] = new Format_date();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/panjar/add';
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();        
        $data['SIList_perjadin'] = $this->perjalanan_dinas_model->select_by_field(array('status'=>5))->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/transaksi/panjar/edit';
        $data['data'] = $this->panjar_model->select_by_id($id)->row();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();        
        $data['SIList_perjadin'] = $this->perjalanan_dinas_model->select_by_field(array('status'=>5))->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_header'] = $this->input->post('inpIdHeader');
        $data['penerima'] = $this->input->post('inpPenerima');
        $data['deskripsi_panjar'] = $this->input->post('inpDeskripsiPanjar');

        if ($action == 'add') {
            $this->panjar_model->add($data);            
            $panjar = $this->panjar_model->select_by_field(array('id_header'=>$data['id_header']))->row();
            $id = $panjar->id;
        } else {
            $this->panjar_model->edit($id, $data);
        }

        redirect('transaksi/panjar/view/'.$id);
    }

    public function delete($id) {
        $this->panjar_model->delete($id);
        redirect('transaksi/panjar');
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>