<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Updated Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggaran extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('master/anggaran_model');
        $this->load->model('master/akun_model');
        $this->load->model('master/kegiatan_model');
        $this->is_logged_in();
    }

    public function index() {   
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/master/anggaran/list';
        $data['list_data'] = $this->anggaran_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) { 
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/master/anggaran/view';
        $data['row'] = $this->anggaran_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/master/anggaran/add';
        $data['SIList_akun'] = $this->akun_model->select_all()->result();
        $data['SIList_kegiatan'] = $this->kegiatan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/master/anggaran/edit';
        $data['row'] = $this->anggaran_model->select_by_id($id)->row(); 
        $data['SIList_akun'] = $this->akun_model->select_all()->result();
        $data['SIList_kegiatan'] = $this->kegiatan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_kegiatan'] = $this->input->post('inpIdKegiatan');
        $data['id_akun'] = $this->input->post('inpIdAkun');
        $data['pagu'] = $this->input->post('inpPagu');
        $data['sisa'] = $this->input->post('inpPagu');
        $data['tahun_anggaran'] = $this->input->post('inpTahunAnggaran');

        if ($action == 'add') {
            $this->anggaran_model->add($data);
        } else {
            $this->anggaran_model->edit($id, $data);
        }

        redirect('master/anggaran');
    }

    public function delete($id) {
        $this->anggaran_model->delete($id);
        redirect('master/anggaran');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }
    
}

?>