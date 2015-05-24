<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 24 Mei 2015
//Updated Date  : 24 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_narasumber extends CI_Controller {

    var $title_page = 'e-satker | Biaya Sewa';

    public function __construct() {
        parent::__construct();
        $this->load->model('master/biaya_narasumber_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/master/biaya_narasumber/list';
        $data['list_data'] = $this->biaya_narasumber_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/master/biaya_narasumber/view';
        $data['row'] = $this->biaya_narasumber_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/master/biaya_narasumber/add';
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/master/biaya_narasumber/edit';
        $data['data'] = $this->biaya_narasumber_model->select_by_field(array('id'=>$id))->row();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['jabatan'] = $this->input->post('inpJabatan');
        $data['biaya'] = $this->input->post('inpBiaya');

        if ($action == 'add') {
            $this->biaya_narasumber_model->add($data);
        } else {
          $this->biaya_narasumber_model->edit($data, array('id' => $id));
        }

        redirect('master/biaya_narasumber');
    }

    public function delete($id) {
        $this->biaya_narasumber_model->delete(array('id' => $id));
        redirect('master/biaya_narasumber');
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>