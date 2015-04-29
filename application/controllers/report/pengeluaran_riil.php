<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 13 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengeluaran_riil extends CI_Controller {

    var $title_page = "e-satker | Pengeluaran Riil";
    
    function __construct() {
        parent::__construct();
        $this->load->model('report/daftar_biaya_perjalanan_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->is_logged_in();
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/report/bukti_perjalanan_dinas/view_daftar_pengeluaran_riil';
        $data['report_page'] = 'admin/report/bukti_perjalanan_dinas/report_daftar_pengeluaran_riil';
        $this->load->view('admin/index', $data);
    }

    public function print_report() {
        $this->load->helper('to_pdf');
        $data = null;
        $html = $this->load->view('admin/report/bukti_perjalanan_dinas/report_daftar_pengeluaran_riil', $data, TRUE);
        pdf_create($html, "potrait", "Pengeluaran Riil ".date('mdy'), true);
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>