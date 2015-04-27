<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 10 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

    var $akun = array(); 
    
    public function __construct() {
        parent::__construct();
        $this->load->model('kegiatan_model');
        $this->load->model('unit_model');
        $this->load->model('pegawai_model');
        $this->akun = array(
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role')
        );
    }

    public function index() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Kegiatan";
        $data['page'] = 'admin/kegiatan/list';
        $data['list_data'] = $this->kegiatan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Kegiatan";
        $data['page'] = 'admin/kegiatan/view';
        $data['row'] = $this->kegiatan_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Kegiatan";
        $data['page'] = 'admin/kegiatan/add';
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_unit'] = $this->unit_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Kegiatan";
        $data['page'] = 'admin/kegiatan/edit';
        $data['row'] = $this->kegiatan_model->select_by_id($id)->row();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_unit'] = $this->unit_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['kode_unit'] = $this->input->post('inpKodeUnit');
        $data['kode_kegiatan'] = $this->input->post('inpKodeKegiatan');
        $data['nama_kegiatan'] = $this->input->post('inpNamaKegiatan');
        $data['koordinator'] = $this->input->post('inpKoordinator');
        $data['penanggung_jawab'] = $this->input->post('inpPenanggungJawab');

        if ($action == 'add') {
            $this->kegiatan_model->add($data);
        } else {
            $this->kegiatan_model->edit($id, $data);
        }

        redirect('master/kegiatan');
    }

    public function delete($id) {
        $this->kegiatan_model->delete($id);
        redirect('master/kegiatan');
    }

}

?>