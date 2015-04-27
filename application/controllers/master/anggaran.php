<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggaran extends CI_Controller {

    var $akun = array(); 
    
    public function __construct() {
        parent::__construct();
        $this->load->model('anggaran_model');
        $this->load->model('akun_model');
        $this->load->model('kegiatan_model');
        $this->akun = array(
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role')
        );
    }

    public function index() {        
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/anggaran/list';
        $data['list_data'] = $this->anggaran_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/anggaran/view';
        $data['row'] = $this->anggaran_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/anggaran/add';
        $data['SIList_akun'] = $this->akun_model->select_all()->result();
        $data['SIList_kegiatan'] = $this->kegiatan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Anggaran";
        $data['page'] = 'admin/anggaran/edit';
        $data['row'] = $this->anggaran_model->select_by_id($id)->row(); 
        $data['SIList_akun'] = $this->akun_model->select_all()->result();
        $data['SIList_kegiatan'] = $this->kegiatan_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_kegiatan'] = $this->input->post('inpIdKegiatan');
        $data['id_akun'] = $this->input->post('inpIdAkun');
        $data['pagu'] = $this->input->post('inpPagu');
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
    
}

?>