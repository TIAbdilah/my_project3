<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 13 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bukti_perjalanan_dinas extends CI_Controller {

    var $title_page = "e-satker | Bukti Perjalanan Dinas";
    
    function __construct() {
        parent::__construct();
        $this->load->model('report/daftar_biaya_perjalanan_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['page'] = 'admin/report/bukti_perjalanan_dinas/view_perincian_biaya_perjalanan_dinas';
        $data['report_page'] = 'admin/report/bukti_perjalanan_dinas/report_perincian_biaya_perjalanan_dinas';
        $this->load->view('admin/index', $data);
    }

    public function print_report() {
        $this->load->helper('to_pdf');
        $data = null;
        $html = $this->load->view('admin/report/bukti_perjalanan_dinas/report_perincian_biaya_perjalanan_dinas', $data, TRUE);
        pdf_create($html, "potrait", "Bukti Perjalanan Dinas ".date('mdy'), true);
    }

}

?>