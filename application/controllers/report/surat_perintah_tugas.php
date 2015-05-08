<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 13 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/format_date.php');

class Surat_perintah_tugas extends CI_Controller {

    var $title_page = "e-satker | Surat Perintah Tugas";

    function __construct() {
        parent::__construct();
        $this->load->model('report/surat_perintah_tugas_model');
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/detail_perjalanan_dinas_model');
        $this->load->model('report/surat_perintah_tugas_model');
        $this->load->model('master/unit_model');
        $this->is_logged_in();
    }

    public function view($id) {
        $data['title'] = $this->title_page;
        $id_unit = $this->input->post('inpIdUnit');
        $aksi = $this->input->post('inpButton');

        if ($aksi != 'Cetak') {

            $data['data'] = $this->perjalanan_dinas_model->select_by_id($id)->row();
            $data['SIList_unit'] = $this->detail_perjalanan_dinas_model->select_unit_from_detail($id)->result();

            if (!empty($id_unit)) {

                $data['data_unit'] = $this->unit_model->select_by_id($id_unit)->row();
                $param = array(
                    'id_unit' => $id_unit,
                    'id_header' => $id
                );
                $data['list_data'] = $this->surat_perintah_tugas_model->select_by_field($param)->result();
                $data['format_date'] = new Format_date();
                $data['page'] = 'admin/report/surat_perintah_tugas/view_surat_perintah_tugas';
                $data['report_page'] = 'admin/report/surat_perintah_tugas/report_surat_perintah_tugas';
                $this->load->view('admin/index', $data);
            } else {
                $data['page'] = 'admin/report/surat_perintah_tugas/view_surat_perintah_tugas';
                $data['report_page'] = 'admin/report/blank';
                $this->load->view('admin/index', $data);
            }
        } else {
            $this->print_report($id, $id_unit);
        }
    }

    public function print_report($id_header, $id_unit) {
        $this->load->helper('to_pdf');
        if (!empty($id_unit)) {
            $data['data'] = $this->perjalanan_dinas_model->select_by_id($id_header)->row();
            $data['data_unit'] = $this->unit_model->select_by_id($id_unit)->row();
            $param = array(
                'id_unit' => $id_unit,
                'id_header' => $id_header
            );
            $data['list_data'] = $this->surat_perintah_tugas_model->select_by_field($param)->result();
            $data['format_date'] = new Format_date();
            $html = $this->load->view('admin/report/surat_perintah_tugas/report_surat_perintah_tugas', $data, TRUE);
        }
        pdf_create($html, "potrait", 'Surat Perintah Tugas-'.$data['data_unit']->kode_unit . date('mdy'), true);
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>