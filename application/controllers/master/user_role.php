<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_role extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('master/user_role_model');
        $this->load->model('master/role_model');
        $this->load->model('master/users_model');
        $this->is_logged_in();
    }

    public function index() {        
        $data['title'] = "e-satker | User Role";
        $data['page'] = 'admin/master/user_role/list';
        $data['list_data'] = $this->user_role_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['title'] = "e-satker | User Role";
        $data['page'] = 'admin/master/user_role/view';
        $data['row'] = $this->user_role_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | User Role";
        $data['page'] = 'admin/master/user_role/add';
        $data['SIList_user'] = $this->users_model->select_all()->result();
        $data['SIList_role'] = $this->role_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | User Role";
        $data['page'] = 'admin/master/user_role/edit';
        $data['row'] = $this->user_role_model->select_by_id($id)->row();
        $data['SIList_user'] = $this->users_model->select_all()->result();
        $data['SIList_role'] = $this->role_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {
        
        $data['id_user'] = $this->input->post('inpIdUser');
        $data['id_role'] = $this->input->post('inpIdRole');

        if ($action == 'add') {
            $this->user_role_model->add($data);
        } else {
            $this->user_role_model->edit($id, $data);
        }

        redirect('master/user_role');
    }

    public function delete($id) {
        $this->user_role_model->delete($id);
        redirect('master/user_role');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>