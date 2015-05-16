<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 16 Mei 2015
//Updated Date  : 16 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/number_to_word_ind.php');
require_once(APPPATH . 'controllers/common/format_date.php');

class Kuitansi extends CI_Controller {

    var $title_page = "e-satker | Kuitansi";

    function __construct() {
        parent::__construct();
        $this->load->model('transaksi/perjalanan_dinas_model');
        $this->load->model('transaksi/bukti_perjalanan_dinas_model');
        $this->load->model('master/pegawai_model');
        $this->is_logged_in();
    }

    public function view($id_header, $id_pegawai) {
        $data['title'] = $this->title_page;
        $data['data_header'] = $this->perjalanan_dinas_model->select_by_id($id_header)->row();
        $data['data_pegawai'] = $this->pegawai_model->select_by_id($id_pegawai)->row();
        $param = array(
            'id_header' => $id_header,
            'id_pegawai' => $id_pegawai
        );
        $data['data_kuitansi'] = $this->bukti_perjalanan_dinas_model->select_by_field($param)->result();
        $data['curency'] = new Number_to_word_ind();
        $data['format_date'] = new Format_date();
        $data['id_header'] = $id_header;
        $data['id_pegawai'] = $id_pegawai;
        $data['page'] = 'admin/report/kuitansi/view_kuitansi';
        $data['report_page'] = 'admin/report/kuitansi/report_kuitansi';
        $this->load->view('admin/index', $data);
    }

    public function print_report($id_header, $id_pegawai) {
        $this->load->helper('to_pdf');
        $data['data_header'] = $this->perjalanan_dinas_model->select_by_id($id_header)->row();
        $data['data_pegawai'] = $this->pegawai_model->select_by_id($id_pegawai)->row();
        $param = array(
            'id_header' => $id_header,
            'id_pegawai' => $id_pegawai
        );
        $data['data_kuitansi'] = $this->bukti_perjalanan_dinas_model->select_by_field($param)->result();
        $data['curency'] = new Number_to_word_ind();
        $data['format_date'] = new Format_date();
        $html = $this->load->view('admin/report/kuitansi/report_kuitansi', $data, TRUE);
        pdf_create($html, "potrait", "Uang Muka Perjalnan " . date('mdy'), true);
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>