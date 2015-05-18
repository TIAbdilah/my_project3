<?php

//Created By    : Rizal Fauzi Rahman
//Updated By    : Rizal Fauzi Rahman
//Created Date  : 18 May 2015
//Updated Date  : 18 May 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/number_to_word_ind.php');
require_once(APPPATH . 'controllers/common/format_date.php');

class Nota_dinas extends CI_Controller {

    var $title_page = "e-satker | Nota Dinas";
    
    function __construct() {
        parent::__construct();
        $this->load->model('transaksi/pengajuan_barang_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/panjar_model');
        $this->is_logged_in();
    }

    public function view($id_header) {
        $data['title'] = $this->title_page;
        $data['data_report'] = $this->pengajuan_barang_model->select_by_id($id_header)->row();
        $data['curency'] = new Number_to_word_ind();
        $data['format_date'] = new Format_date();
        $data['id_header'] = $id_header;
        $data['page'] = 'admin/report/nota_dinas/view_nota_dinas';
        $data['report_page'] = 'admin/report/nota_dinas/report_nota_dinas';
        $this->load->view('admin/index', $data);
    }

    public function print_report($id_header) {
        $this->load->helper('to_pdf');
        $data['data_report'] = $this->pengajuan_barang_model->select_by_id($id_header)->row();
        $html = $this->load->view('admin/report/nota_dinas/report_nota_dinas', $data, TRUE);
        pdf_create($html, "potrait", "Nota Dinas ".date('mdy'), true);
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>