<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Updated Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/array_custom.php');
require_once(APPPATH . 'controllers/common/format_date.php');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/users_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/pengajuan_barang_model');
        $this->load->model('transaksi/pengajuan_honorarium_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = "e-satker | Home";
        $role = $this->session->userdata('role');

        $array_custom = new Array_custom();
        if ($role == 'ppk' || $role == 'assisten satker' || $role == 'super admin') {
            $data['page'] = 'admin/master/tasklist/list';
        } else {
            $data['page'] = 'admin/master/tasklist/list_filter';
        }
        if($this->session->userdata('role') == 'publik'){
            // print_r("publik list");
            $data['page'] = 'admin/master/tasklist/list_publik';
            $data['list_data'] = $this->perjalanan_dinas_model->select_all()->result();
            $data['list_data_barang'] = $this->pengajuan_barang_model->select_all()->result();
            $data['list_data_honorarium'] = $this->pengajuan_honorarium_model->select_all()->result();                        
        }else{
            // print_r("bukan publik nih");
            $data['page'] = 'admin/master/tasklist/list';
            $data['list_data'] = $this->perjalanan_dinas_model->select_by_field(array('status' => $array_custom->int_role[$role]))->result();
            $data['list_data_barang'] = $this->pengajuan_barang_model->select_by_field(array('status_approval' => $array_custom->int_role[$role]))->result();
            $data['list_data_honorarium'] = $this->pengajuan_honorarium_model->select_by_field(array('status_approval' => $array_custom->int_role[$role]))->result();
        }        
        $data['status'] = $array_custom->status;
        $data['status_penolakan'] = $array_custom->status_penolakan;
        $data['status_approval'] = $array_custom->status;
        $data['format_date'] = new Format_date();

        if($this->session->userdata('role') != 'publik'){
            // print_r("bukan publik");
            $data['cek_perjalanan_dinas_ditolak'] = $this->perjalanan_dinas_model->select_by_field(array('status' => $array_custom->int_role[$role], 'status_penolakan' => '1', 'kode_unit' => $this->session->userdata('kode_unit')))->result();
            if (!empty($data['cek_perjalanan_dinas_ditolak'])) {
                $data['perjalanan_dinas_ditolak'] = true;
            } else {
                $data['perjalanan_dinas_ditolak'] = false;
            }

            $data['cek_barang_ditolak'] = $this->pengajuan_barang_model->select_by_field(array('status_approval' => $array_custom->int_role[$role], 'status_penolakan' => '1', 'kode_unit' => $this->session->userdata('kode_unit')))->result();
            if (!empty($data['cek_barang_ditolak'])) {
                $data['barang_ditolak'] = true;
            } else {
                $data['barang_ditolak'] = false;
            }
            $data['cek_honorarium_ditolak'] = $this->pengajuan_honorarium_model->select_by_field(array('status_approval' => $array_custom->int_role[$role], 'status_penolakan' => '1', 'kode_unit' => $this->session->userdata('kode_unit')))->result();
            if (!empty($data['cek_honorarium_ditolak'])) {
                $data['honorarium_ditolak'] = true;
            } else {
                $data['honorarium_ditolak'] = false;
            }
        }

        $this->load->view('admin/index', $data);
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>