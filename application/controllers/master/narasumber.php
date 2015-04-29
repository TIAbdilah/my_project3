<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Narasumber extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/narasumber_model');
        $this->load->model('master/listcode_model');
        $this->load->model('master/unit_model');
        $this->is_logged_in();
    }

    public function index() {        
        $data['title'] = "e-satker | Narasumber";
        $data['page'] = 'admin/master/narasumber/list';
        $data['list_data'] = $this->narasumber_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['title'] = "e-satker | Narasumber";
        $data['page'] = 'admin/master/narasumber/view';
        $data['row'] = $this->narasumber_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }
    
    public function add() {        
        $data['title'] = "e-satker | Narasumber";
        $data['page'] = 'admin/master/narasumber/add';
        $data['SIList_golongan'] = $this->listcode_model->select_by_field('list_name','Golongan')->result();
        $data['SIList_statusNarasumber'] = $this->listcode_model->select_by_field('list_name','Status Narasumber')->result();
        $data['SIList_unit'] = $this->unit_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Narasumber";
        $data['page'] = 'admin/master/narasumber/edit';
        $data['row'] = $this->narasumber_model->select_by_id($id)->row();  
        $data['SIList_golongan'] = $this->listcode_model->select_by_field('list_name','Golongan')->result();
        $data['SIList_statusNarasumber'] = $this->listcode_model->select_by_field('list_name','Status Narasumber')->result();
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
        $data['kriteria_narasumber'] = $this->input->post('inpKriteriaNarasumber');
        $data['status_pendidikan'] = $this->input->post('inpStatusPendidikan');
        
        if ($action == 'add') {
            $this->narasumber_model->add($data);
        } else {
            $this->narasumber_model->edit($id, $data);
        }

        redirect('master/narasumber');
    }

    public function delete($id) {
        $this->narasumber_model->delete($id);
        redirect('master/narasumber');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>