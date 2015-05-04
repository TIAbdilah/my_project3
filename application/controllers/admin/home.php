<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    var $status = array(
        '0' => 'baru dibuat',
        '1' => 'menunggu verivikasi esselon 4',
        '2' => 'menunggu verivikasi esselon 3',
        '3' => 'menunggu verivikasi asisten satker',
        '4' => 'menunggu verivikasi PPK',
        '5' => 'lima'
    );
    var $status_penolakan = array(
        '0' => '-',
        '1' => '<button class="btn btn-danger"><strong>DITOLAK</strong></button>'
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('master/users_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->is_logged_in();
    }

    public function index() {
        $data['title'] = "e-satker | Home";
        $role = $this->session->userdata('role');
        $int_role = array(
            'operator' => 0,
            'esselon 4' => 1,
            'esselon 3' => 2,
            'asisten satker' => 3,
            'ppk' => 4
        );
        $param = array(
            'status' => $int_role[$role]
        );
        $data['list_data'] = $this->perjalanan_dinas_model->select_by_field($param)->result();
        $data['page'] = 'admin/master/tasklist/list';
        $data['status'] = $this->status;
        $data['status_penolakan'] = $this->status_penolakan;
        $this->load->view('admin/index', $data);
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>