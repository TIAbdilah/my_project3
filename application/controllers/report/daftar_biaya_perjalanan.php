<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 13 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daftar_biaya_perjalanan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('report/daftar_biaya_perjalanan_model');
        $this->load->model('transaksiperjalanandinasheader_model');
        $this->load->model('transaksiperjalanandinasdetail_model');
        $this->load->model('transaksi/detail_perjalanan_dinas_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
    }

    public function view($id) {
        $data['data'] = $this->perjalanan_dinas_model->select_by_id($id)->row();
        $param = array(
            'id_header' => $id
        );
        $data['list_data_detail'] = $this->detail_perjalanan_dinas_model->select_by_field($param)->result();
        $data['page'] = 'admin/report/daftar_biaya_perjalanan/view_daftar_biaya_perjalanan';
        $data['report_page'] = 'admin/report/daftar_biaya_perjalanan/report_daftar_biaya_perjalanan';
        $this->load->view('admin/index', $data);
    }

    public function print_report($id) {
        $this->load->helper('to_pdf');
        $param = array(
            'id_header' => $id
        );
        $data['list_data_detail'] = $this->detail_perjalanan_dinas_model->select_by_field($param)->result();
        $html = $this->load->view('admin/report/daftar_biaya_perjalanan/report_daftar_biaya_perjalanan', $data, TRUE);
        pdf_create($html, "landscape", date('mdy'), true, "folio");
    }

}

?>