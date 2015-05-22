<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Updated Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/array_custom.php');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/users_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/pengajuan_barang_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = "e-satker | Home";
        $role = $this->session->userdata('role');
        
        $array_custom = new Array_custom();        
        $data['list_data'] = $this->perjalanan_dinas_model->select_by_field(array('status' => $array_custom->int_role[$role]))->result();
        $data['list_data_barang'] = $this->pengajuan_barang_model->select_by_field(array('status_approval' => $array_custom->int_role[$role]))->result();
        $data['page'] = 'admin/master/tasklist/list';        
        $data['status'] = $array_custom->status;
        $data['status_penolakan'] = $array_custom->status_penolakan;
        $data['status_approval'] = $array_custom->status;
        $this->load->view('admin/index', $data);
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>