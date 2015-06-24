<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 10 Apr 2015
//Updated Date  : 10 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Temp_akun extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('common/temp_akun_model');
        $this->is_logged_in();
    }

    public function index() {        
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/common/temp_akun/list';
        $data['list_data'] = $this->temp_akun_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {          
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/common/temp_akun/view';
        $data['row'] = $this->temp_akun_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/common/temp_akun/add';
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/common/temp_akun/edit';
        $data['row'] = $this->temp_akun_model->select_by_id($id)->row();      
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['kode_akun'] = $this->input->post('inpKodeAkun');
        $data['jenis_belanja'] = $this->input->post('inpJenisBelanja');

        if ($action == 'add') {
            $this->temp_akun_model->add($data);
        } else {
            $this->temp_akun_model->edit($id, $data);
        }

        redirect('common/import_anggaran');
    }

    public function delete($id) {
        $this->temp_akun_model->delete($id);
        redirect('common/import_anggaran');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }
    
}

?>