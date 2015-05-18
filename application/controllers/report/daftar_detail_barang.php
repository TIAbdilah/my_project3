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

class Daftar_detail_barang extends CI_Controller {

    var $title_page = "e-satker | Daftar detail barang";
    
    function __construct() {
        parent::__construct();
        $this->load->model('transaksi/pengajuan_barang_model');
        $this->load->model('transaksi/detail_pengajuan_barang_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/panjar_model');
        $this->is_logged_in();
    }

    public function view($id_header) {
        $data['title'] = $this->title_page;
        $data['data_report'] = $this->detail_pengajuan_barang_model->select_by_id($id_header)->result();
//        print_r($data);
        $data['curency'] = new Number_to_word_ind();
        $data['format_date'] = new Format_date();
        $data['id_header'] = $id_header;
        $data['page'] = 'admin/report/daftar_detail_barang/view_detail_barang';
        $data['report_page'] = 'admin/report/daftar_detail_barang/report_detail_barang';
        $this->load->view('admin/index', $data);
    }

    public function print_report($id_header) {
        $this->load->helper('to_pdf');
        $data['data_report'] = $this->detail_pengajuan_barang_model->select_by_id($id_header)->result();
        $html = $this->load->view('admin/report/daftar_detail_barang/report_detail_barang', $data, TRUE);
        pdf_create($html, "potrait", "Daftar Barang ".date('mdy'), true);
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>