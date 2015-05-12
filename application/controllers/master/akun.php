<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 10 Apr 2015
//Updated Date  : 10 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/akun_model');
        $this->is_logged_in();
    }

    public function index() {        
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/master/akun/list';
        $data['list_data'] = $this->akun_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {          
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/master/akun/view';
        $data['row'] = $this->akun_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/master/akun/add';
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/master/akun/edit';
        $data['row'] = $this->akun_model->select_by_id($id)->row();      
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['kode_akun'] = $this->input->post('inpKodeAkun');
        $data['jenis_belanja'] = $this->input->post('inpJenisBelanja');

        if ($action == 'add') {
            $this->akun_model->add($data);
        } else {
            $this->akun_model->edit($id, $data);
        }

        redirect('master/akun');
    }

    public function delete($id) {
        $this->akun_model->delete($id);
        redirect('master/akun');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }
    
}

?>