<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Updated Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/array_custom.php');

class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('master/users_model');
        $this->load->model('master/role_model');
        $this->load->model('master/pegawai_model');
        $this->is_logged_in();
    }

    public function index() {        
        $data['title'] = "e-satker | User";
        $data['page'] = 'admin/master/users/list';
        $data['list_data'] = $this->users_model->select_all()->result();
        $data['array_custom'] = new Array_custom();
        $this->load->view('admin/index', $data);

    }

    public function view($id) {        
        $data['title'] = "e-satker | User";
        $data['page'] = 'admin/master/users/view';
        $data['row'] = $this->users_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {        
        $data['title'] = "e-satker | User";
        $data['page'] = 'admin/master/users/add';
        $data['SIList_role'] = $this->role_model->select_all()->result();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['title'] = "e-satker | User";
        $data['page'] = 'admin/master/users/edit';
        $data['row'] = $this->users_model->select_by_id($id)->row();
        $data['SIList_role'] = $this->role_model->select_all()->result();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {


        $data['id_jenis_pengguna'] = $this->input->post('inpIdJenisPengguna');
        $data['id_pegawai'] = $this->input->post('inpIdPegawai');
        $data['alamat'] = $this->input->post('inpAlamat');
        $data['email'] = $this->input->post('inpEmail');
        $data['username'] = $this->input->post('inpUsername');
        $data['password'] = $this->input->post('inpPassword');
        $data['password2'] = $this->input->post('inpPassword2');
        $data['telp'] = $this->input->post('inpTelp');
// print_r($data);
        if($data['password']==$data['password2'] && !empty($data['password'])){
            if ($action == 'add') {
                $this->users_model->add($data);
            } else {
                $this->users_model->edit($id, $data);
            }

            redirect('master/users');
        }else{
            $this->session->set_flashdata('passwordsalah', '<div class="alert alert-danger" role="alert">Password atau Username Belum Diisi Dengan Benar</div>');
            redirect($_SERVER['HTTP_REFERER'], $data);
        // print_r($data);
            
        }
    }

    public function delete($id) {
        $this->users_model->delete($id);
        redirect('master/users');
    }

    public function activate($id) {
        $data['status_aktivasi'] = 1;
        $this->users_model->activate($id, $data);
        redirect('master/users');
    }

     public function deactivate($id) {
        $data['status_aktivasi'] = 0;
        $this->users_model->activate($id, $data);
        redirect('master/users');
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>