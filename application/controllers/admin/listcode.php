<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Listcode extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('listcode_model');
    }

    public function index() {
        $data['title'] = "e-satker | Listcode";
        $data['page'] = 'admin/master/listcode/list';        
        $data['list_data'] = $this->listcode_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['title'] = "e-satker | Listcode";
        $data['page'] = 'admin/master/listcode/view';
        $data['row'] = $this->listcode_model->select_by_id($id)->row();        
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | Listcode";
        $data['page'] = 'admin/master/listcode/add';
        $data['SIList_listcode'] = $this->listcode_model->select_by_field('list_name','')->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | Listcode";
        $data['page'] = 'admin/master/listcode/edit';
        $data['SIList_listcode'] = $this->listcode_model->select_by_field('list_name','')->result();
        $data['row'] = $this->listcode_model->select_by_id($id)->row();        
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['list_name'] = $this->input->post('inpListName');
        $data['list_item'] = $this->input->post('inpListItem');

        if ($action == 'add') {
            $this->listcode_model->add($data);
        } else {
            $this->listcode_model->edit($id, $data);
        }

        redirect('admin/listcode');
    }

    public function delete($id) {
        $this->listcode_model->delete($id);
        redirect('admin/listcode');
    }
    
}

?>