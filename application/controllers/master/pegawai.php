<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pegawai_model');
        $this->load->model('listcode_model');
        $this->load->model('unit_model');
    }

    public function index() {               
        $data['title'] = "e-satker | Pegawai";
        $data['page'] = 'admin/master/pegawai/list';
        $data['list_data'] = $this->pegawai_model->select_all()->result();        
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['title'] = "e-satker | Pegawai";        
        $data['page'] = 'admin/master/pegawai/view';
        $data['row'] = $this->pegawai_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }
    
    public function add() {        
        $data['title'] = "e-satker | Pegawai";
        $data['page'] = 'admin/master/pegawai/add';
        $data['SIList_golongan'] = $this->listcode_model->select_by_field('list_name','Golongan')->result();
        $data['SIList_statusPegawai'] = $this->listcode_model->select_by_field('list_name','Status Pegawai')->result();
        $data['SIList_unit'] = $this->unit_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Pegawai";        
        $data['page'] = 'admin/master/pegawai/edit';
        $data['row'] = $this->pegawai_model->select_by_id($id)->row();  
        $data['SIList_golongan'] = $this->listcode_model->select_by_field('list_name','Golongan')->result();
        $data['SIList_statusPegawai'] = $this->listcode_model->select_by_field('list_name','Status Pegawai')->result();
        $data['SIList_unit'] = $this->unit_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['nip'] = $this->input->post('inpNip');
        $data['nama'] = $this->input->post('inpNama');
        $data['golongan'] = $this->input->post('inpGolongan');
        $data['jabatan'] = $this->input->post('inpJabatan');
        $data['tgl_lahir'] = $this->input->post('inpTglLahir');
        $data['kelas_jabatan'] = $this->input->post('inpKelasJabatan');
        $data['status'] = $this->input->post('inpStatus');
        $data['kode_unit'] = $this->input->post('inpKodeUnit');
        $data['kriteria_pegawai'] = $this->input->post('inpKriteriaPegawai');
        $data['status_pendidikan'] = $this->input->post('inpStatusPendidikan');
        
        if ($action == 'add') {
            $this->pegawai_model->add($data);
        } else {
            $this->pegawai_model->edit($id, $data);
        }

        redirect('master/pegawai');
    }

    public function delete($id) {
        $this->pegawai_model->delete($id);
        redirect('master/pegawai');
    }

}

?>