<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 13 Apr 2015
//Updated Date  : 13 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/format_date.php');
require_once(APPPATH . 'controllers/common/number_to_word_ind.php');

class Bukti_perjalanan_dinas extends CI_Controller {

    var $title_page = "e-satker | Bukti Perjalanan Dinas";
    
    function __construct() {
        parent::__construct();
        $this->load->model('report/daftar_biaya_perjalanan_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/detail_perjalanan_dinas_model');
        $this->load->model('transaksi/bukti_perjalanan_dinas_model');
        $this->load->model('transaksi/panjar_model');
        $this->load->model('master/pegawai_model');
        $this->is_logged_in();
    }

    public function view($id_header, $id_pegawai) {
        $data['title'] = $this->title_page;
        $data['id_header'] = $id_header;
        $data['id_pegawai'] = $id_pegawai;
        $data['data_pegawai'] = $this->pegawai_model->select_by_id($id_pegawai)->row();
        $data['data_perjalanan_dinas'] = $this->perjalanan_dinas_model->select_by_id($id_header)->row();
        $param = array(
            'id_header' => $id_header,
            'id_pegawai' => $id_pegawai
        );
        $data['list_data_bukti'] = $this->bukti_perjalanan_dinas_model->select_by_field($param)->result();        
        $data['data_panjar'] = $this->panjar_model->select_by_field($param)->row(); 
        $data['format_date'] = new Format_date();
        $data['curency'] = new Number_to_word_ind();
        $data['page'] = 'admin/report/bukti_perjalanan_dinas/view_perincian_biaya_perjalanan_dinas';
        $data['report_page'] = 'admin/report/bukti_perjalanan_dinas/report_perincian_biaya_perjalanan_dinas';
        $this->load->view('admin/index', $data);
    }

    public function print_report($id_header, $id_pegawai) {
        $this->load->helper('to_pdf');
        $data['data_pegawai'] = $this->pegawai_model->select_by_id($id_pegawai)->row();
        $data['data_perjalanan_dinas'] = $this->perjalanan_dinas_model->select_by_id($id_header)->row();
        $param = array(
            'id_header' => $id_header,
            'id_pegawai' => $id_pegawai
        );
        $data['list_data_bukti'] = $this->bukti_perjalanan_dinas_model->select_by_field($param)->result();        
        $data['data_panjar'] = $this->panjar_model->select_by_field($param)->row(); 
        $data['format_date'] = new Format_date();
        $data['curency'] = new Number_to_word_ind();
        $data['format_date'] = new Format_date();
        $data['curency'] = new Number_to_word_ind();
        $html = $this->load->view('admin/report/bukti_perjalanan_dinas/report_perincian_biaya_perjalanan_dinas', $data, TRUE);
        pdf_create($html, "potrait", "Bukti Perjalanan Dinas ".date('mdy'), true);
    }
    
    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>