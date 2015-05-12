<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 20 Apr 2015
//Updated Date  : 20 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Role extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/role_model');
        $this->is_logged_in();
    }

    public function index() {        
        $data['title'] = "e-satker | Role";
        $data['page'] = 'admin/master/role/list';
        $data['list_data'] = $this->role_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['title'] = "e-satker | Role";
        $data['page'] = 'admin/master/role/view';
        $data['row'] = $this->role_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | Role";
        $data['page'] = 'admin/master/role/add';
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Role";
        $data['page'] = 'admin/master/role/edit';
        $data['row'] = $this->role_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {
        
        $data['nama_role'] = $this->input->post('inpNamaRole');

        if ($action == 'add') {
            $this->role_model->add($data);
        } else {
            $this->role_model->edit($id, $data);
        }

        redirect('master/role');
    }

    public function delete($id) {
        $this->role_model->delete($id);
        redirect('master/role');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>