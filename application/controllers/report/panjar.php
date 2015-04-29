<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 13 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panjar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('report/daftar_biaya_perjalanan_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->is_logged_in();
    }

    public function view($id) {
        $data['page'] = 'admin/report/panjar/view_uang_muka_kerja';
        $data['report_page'] = 'admin/report/panjar/report_uang_muka_kerja';
        $this->load->view('admin/index', $data);
    }

    public function print_report() {
        $this->load->helper('to_pdf');
        $data = null;
        $html = $this->load->view('admin/report/panjar/report_uang_muka_kerja', $data, TRUE);
        pdf_create($html, "potrait", "Uang Muka Perjalnan ".date('mdy'), true);
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>