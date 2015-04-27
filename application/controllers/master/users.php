<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    var $akun = array(); 
    
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('role_model');
        $this->akun = array(
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role')
        );
    }

    public function index() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | User";
        $data['page'] = 'admin/users/list';
        $data['list_data'] = $this->users_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | User";
        $data['page'] = 'admin/users/view';
        $data['row'] = $this->users_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | User";
        $data['page'] = 'admin/users/add';
        $data['SIList_role'] = $this->role_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | User";
        $data['page'] = 'admin/users/edit';
        $data['row'] = $this->users_model->select_by_id($id)->row();
        $data['SIList_role'] = $this->role_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['id_jenis_pengguna'] = $this->input->post('inpIdJenisPengguna');
        $data['nama'] = $this->input->post('inpNama');
        $data['nip'] = $this->input->post('inpNip');
        $data['alamat'] = $this->input->post('inpAlamat');
        $data['email'] = $this->input->post('inpEmail');
        $data['username'] = $this->input->post('inpUsername');
        $data['password'] = $this->input->post('inpPassword');
        $data['telp'] = $this->input->post('inpTelp');

        if ($action == 'add') {
            $this->users_model->add($data);
        } else {
            $this->users_model->edit($id, $data);
        }

        redirect('master/users');
    }

    public function delete($id) {
        $this->users_model->delete($id);
        redirect('master/users');
    }

}

?>