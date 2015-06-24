<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Updated Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Temp_anggaran extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('common/temp_anggaran_model');
        $this->load->model('common/temp_akun_model');
        $this->load->model('common/temp_kegiatan_model');
        $this->is_logged_in();
    }

    public function index() {   
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/common/temp_anggaran/list';
        $data['list_data'] = $this->temp_anggaran_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) { 
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/common/temp_anggaran/view';
        $data['row'] = $this->temp_anggaran_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/common/temp_anggaran/add';
        $data['SIList_akun'] = $this->temp_akun_model->select_all()->result();
        $data['SIList_kegiatan'] = $this->temp_kegiatan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/common/temp_anggaran/edit';
        $data['row'] = $this->temp_anggaran_model->select_by_id($id)->row(); 
        $data['SIList_akun'] = $this->temp_akun_model->select_all()->result();
        $data['SIList_kegiatan'] = $this->temp_kegiatan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_kegiatan'] = $this->input->post('inpIdKegiatan');
        $data['id_akun'] = $this->input->post('inpIdAkun');
        $data['pagu'] = $this->input->post('inpPagu');
        $data['sisa'] = $this->input->post('inpPagu');
        $data['tahun_anggaran'] = $this->input->post('inpTahunAnggaran');

        if ($action == 'add') {
            $this->temp_anggaran_model->add($data);
        } else {
            $this->temp_anggaran_model->edit($id, $data);
        }

        redirect('common/import_anggaran');
    }

    public function delete($id) {
        $this->temp_anggaran_model->delete($id);
        redirect('common/import_anggaran');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }
    
}

?>