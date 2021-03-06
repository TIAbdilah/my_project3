<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 13 Apr 2015
//Updated Date  : 13 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/number_to_word_ind.php');
require_once(APPPATH . 'controllers/common/format_date.php');

class Panjar extends CI_Controller {

    var $title_page = "e-satker | Uang Muka Perjalanan Dinas";
    
    function __construct() {
        parent::__construct();
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/panjar_model');
        $this->is_logged_in();
    }

    public function view($id_panjar) {
        $data['title'] = $this->title_page;        
        $data['data_panjar'] = $this->panjar_model->select_by_field(array('id'=>$id_panjar))->row();        
        $data['data_header'] = $this->perjalanan_dinas_model->select_by_id($data['data_panjar']->id_header)->row();     
        $data['curency'] = new Number_to_word_ind();
        $data['format_date'] = new Format_date();
        $data['id_panjar'] = $id_panjar;
        $data['page'] = 'admin/report/panjar/view_uang_muka_kerja';
        $data['report_page'] = 'admin/report/panjar/report_uang_muka_kerja';
        $this->load->view('admin/index', $data);
    }

    public function print_report($id_panjar) {
        $this->load->helper('to_pdf');
        $data['data_panjar'] = $this->panjar_model->select_by_field(array('id'=>$id_panjar))->row();        
        $data['data_header'] = $this->perjalanan_dinas_model->select_by_id($data['data_panjar']->id_header)->row();     
        $data['curency'] = new Number_to_word_ind();
        $data['format_date'] = new Format_date();
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