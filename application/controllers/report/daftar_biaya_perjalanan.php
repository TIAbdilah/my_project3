<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 13 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/format_date.php');

class Daftar_biaya_perjalanan extends CI_Controller {

    
    var $title_page = "e-satker | Daftar Biaya Perjalanan Dinas";
    
    function __construct() {
        parent::__construct();
        $this->load->model('report/daftar_biaya_perjalanan_model');
        $this->load->model('transaksi/detail_perjalanan_dinas_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->is_logged_in();
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $data['data_header'] = $this->perjalanan_dinas_model->select_by_id($id)->row();
        $param = array(
            'id_header' => $id
        );
        $data['list_data_detail'] = $this->detail_perjalanan_dinas_model->select_by_field_1($param)->result();
        $data['format_date'] = new Format_date();
        $data['page'] = 'admin/report/daftar_biaya_perjalanan/view_daftar_biaya_perjalanan';
        $data['report_page'] = 'admin/report/daftar_biaya_perjalanan/report_daftar_biaya_perjalanan';
        $this->load->view('admin/index', $data);
    }

    public function print_report($id) {
        $this->load->helper('to_pdf');
        $data['data_header'] = $this->perjalanan_dinas_model->select_by_id($id)->row();
        $param = array(
            'id_header' => $id
        );
        $data['list_data_detail'] = $this->detail_perjalanan_dinas_model->select_by_field_1($param)->result();
        $data['format_date'] = new Format_date();
        $html = $this->load->view('admin/report/daftar_biaya_perjalanan/report_daftar_biaya_perjalanan', $data, TRUE);
        pdf_create($html, "landscape", "Daftar Biaya Perjalanan".date('mdy'), true, "folio");
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>