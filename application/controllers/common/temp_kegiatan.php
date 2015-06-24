<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 10 Apr 2015
//Updated Date  : 10 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Temp_kegiatan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('common/temp_kegiatan_model');
        $this->load->model('master/unit_model');
        $this->load->model('master/pegawai_model');
        $this->is_logged_in();
    }

    public function index() {        
        $data['title'] = "e-satker | Kegiatan";
        $data['page'] = 'admin/common/temp_kegiatan/list';
        $data['list_data'] = $this->temp_kegiatan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['title'] = "e-satker | Kegiatan";
        $data['page'] = 'admin/common/temp_kegiatan/view';
        $data['row'] = $this->temp_kegiatan_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | Kegiatan";
        $data['page'] = 'admin/common/temp_kegiatan/add';
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $data['SIList_unit'] = $this->unit_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Kegiatan";
        $data['page'] = 'admin/common/temp_kegiatan/edit';
        $data['row'] = $this->temp_kegiatan_model->select_by_id($id)->row();
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
            $this->temp_kegiatan_model->add($data);
        } else {
            $this->temp_kegiatan_model->edit($id, $data);
        }

        redirect('common/import_anggaran');
    }

    public function delete($id) {
        $this->temp_kegiatan_model->delete($id);
        redirect('common/import_anggaran');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>