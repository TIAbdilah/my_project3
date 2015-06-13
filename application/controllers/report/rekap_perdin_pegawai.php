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
        $this->load->model('master/pegawai_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('report/rekap_perdin_pegawai_model');
        $this->is_logged_in();
    }

    public function view() {
        $month = $this->input->post('inpBulan');
        $year = $this->input->post('inpTahun');
        $data['title'] = $this->title_page;
        $data['array_custom'] = new Array_custom();
        if ($year != "" && $month != "") {
            $data['month'] = $month;
            $data['year'] = $year;
            $param = array(
                'bulan' => $month,
                'tahun' => $year
            );
            $data['list_data_perjalanan'] = $this->rekap_perdin_pegawai_model->select_by_field($param)->result();
            if ($this->session->userdata('role') != 'ppk' && $this->session->userdata('role') != 'asisten satker') {
                $data['list_data'] = $this->pegawai_model->select_by_field('kode_unit', $this->session->userdata('kode_unit'))->result();
            } else {
                $data['list_data'] = $this->pegawai_model->select_all()->result();
            }
            $data['dt_peg'] = $this->generate_list_pegawai($data['list_data'], $data['list_data_perjalanan'], $month, $year);
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
        $data['list_data_perjalanan'] = $this->rekap_perdin_pegawai_model->select_by_field($param)->result();
        if ($this->session->userdata('role') != 'ppk' && $this->session->userdata('role') != 'asisten satker') {
            $data['list_data'] = $this->pegawai_model->select_by_field('kode_unit', $this->session->userdata('kode_unit'))->result();
        } else {
            $data['list_data'] = $this->pegawai_model->select_all()->result();
        }
        $data['dt_peg'] = $this->generate_list_pegawai($data['list_data'], $data['list_data_perjalanan'], $month, $year);
        $html = $this->load->view('admin/report/rekap_perdin_pegawai/report_rekap_perdin_pegawai', $data, TRUE);
        pdf_create($html, "landscape", "Rekap Perjalanan Dinas " . date('mdy'), true);
    }
    
    public function generate_list_pegawai($list_data = array(), $list_data_perjalanan = array(), $month, $year){
        $dt_peg = array();
        foreach ($list_data as $data) {
            $tgl_pegawai = array_fill(1, 31, 0);
            $dt_peg[$data->nama] = $tgl_pegawai;
        }
        
        foreach ($list_data_perjalanan as $data) {

            //inisilisasi 'tgl berangkat' dan 'tgl pulang'
            $t_ber = strtotime($data->berangkat);
            $t_pul = strtotime($data->pulang_1);
            if ($data->pulang_2 != '0000-00-00' && $data->pulang_2 != null) {
                $t_pul = strtotime($data->pulang_2);
            }
            if ($data->pulang_3 != '0000-00-00' && $data->pulang_3 != null) {
                $t_pul = strtotime($data->pulang_3);
            }

            //cek tanggal 
            $int_day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            for ($i = 1; $i <= $int_day; $i++) {
                $tgl = strtotime($year . "-" . $month . "-" . $i);
                $day = date('D', $tgl);
                if ($t_ber <= $tgl && $tgl <= $t_pul) {
                    $dt_peg[$data->nama_pegawai][$i] = 1;
                }
            }
        }
        
        return $dt_peg;
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>