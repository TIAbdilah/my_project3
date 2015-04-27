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
    }    
    
    public function view($id) {
        $id_unit = $this->input->post('inpIdUnit');

        if ($aksi != 'Cetak') {

            $data['data'] = $this->transaksiperjalanandinasheader_model->select_by_id($id)->row();
            $data['SIList_unit'] = $this->transaksiperjalanandinasdetail_model->select_unit_from_detail($id)->result();

            if (!empty($id_unit)) {

                $data['data_unit'] = $this->unit_model->select_by_id($id_unit)->row();
                $param = array(
                    'id_unit' => $id_unit,
                    'id_transaksi_perjalanandinas_header' => $id
                );
                $data['list_data'] = $this->transaksiperjalanandinasdetail_model->select_by_field($param)->result();
                $data['page'] = 'report/view_daftar_biaya_perjalnan';
                $data['report_page'] = 'report/report_daftar_biaya_perjalnan';
                $this->load->view('admin/index', $data);
            } else {
                $data['page'] = 'report/view_daftar_biaya_perjalnan';
                $data['report_page'] = 'report/blank';
                $this->load->view('admin/index', $data);
            }
        } else {
            $this->print_report($id, $id_unit);
        }
    }

    public function print_report($id_header, $id_unit) {
        $this->load->helper('to_pdf');
        if (!empty($id_unit)) {
            $data['data'] = $this->transaksiperjalanandinasheader_model->select_by_id($id_header)->row();
            $data['data_unit'] = $this->unit_model->select_by_id($id_unit)->row();
            $param = array(
                'id_unit' => $id_unit,
                'id_transaksi_perjalanandinas_header' => $id_header
            );
            $data['list_data'] = $this->transaksiperjalanandinasdetail_model->select_by_field($param)->result();
            $html = $this->load->view('report/report_surat_perintah_tugas', $data, TRUE);
        }
        pdf_create($html, "potrait", $data['data_unit']->kode_unit . date('mdy'), true);
    }
}

?>