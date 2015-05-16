<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 13 Apr 2015
//Updated Date  : 13 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/number_to_word_ind.php');
require_once(APPPATH . 'controllers/common/array_custom.php');

class Rekap_perdin_pegawai extends CI_Controller {

    var $title_page = "e-satker | Rekap Perjalanan Dinas Pegawai";

    function __construct() {
        parent::__construct();
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('report/rekap_perdin_pegawai_model');
        $this->is_logged_in();
    }

    public function view() {
        $month = $this->input->post('inpBulan');
        $year = $this->input->post('inpTahun');
        $data['title'] = $this->title_page;
        $data['array_custom'] = new Array_custom();
        if (!empty($month) && !empty($year)) {
            $data['month'] = $month;
            $data['year'] = $year;
            $param = array(
                'bulan' => $month,
                'tahun' => $year
            );
            $data['list_data'] = $this->rekap_perdin_pegawai_model->select_by_field($param)->result();
            $data['page'] = 'admin/report/rekap_perdin_pegawai/view_rekap_perdin_pegawai';
            $data['report_page'] = 'admin/report/rekap_perdin_pegawai/report_rekap_perdin_pegawai';
            $this->load->view('admin/index', $data);
        } else {
            $data['page'] = 'admin/report/rekap_perdin_pegawai/view_rekap_perdin_pegawai';
            $data['report_page'] = 'admin/report/blank';
            $this->load->view('admin/index', $data);
        }
    }

    public function print_report($month, $year) {
        $this->load->helper('to_pdf');
        $data['array_custom'] = new Array_custom();
        $data['month'] = $month;
        $data['year'] = $year;
        $param = array(
            'bulan' => $month,
            'tahun' => $year
        );
        $data['list_data'] = $this->rekap_perdin_pegawai_model->select_by_field($param)->result();
        $html = $this->load->view('admin/report/rekap_perdin_pegawai/report_rekap_perdin_pegawai', $data, TRUE);
        pdf_create($html, "landscape", "Rekap Perjalanan Dinas " . date('mdy'), true);
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>