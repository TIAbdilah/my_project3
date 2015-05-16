<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 16 Mei 2015
//Updated Date  : 16 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Realisasi_anggaran extends CI_Controller {

    var $title_page = "e-satker | Realisasi Anggaran";

    function __construct() {
        parent::__construct();
        $this->load->model('master/anggaran_model');
        $this->is_logged_in();
    }

    public function view() {
        $data['list_data'] = $this->anggaran_model->select_all()->result();
        $this->load->view('admin/report/realisasi_anggaran/report_realisasi_anggaran', $data);
    }

    public function print_report_1() {
        $this->load->helper('to_pdf');
        $data['list_data'] = $this->anggaran_model->select_all()->result();
        $html = $this->load->view('admin/report/realisasi_anggaran/report_realisasi_anggaran', $data, TRUE);
        pdf_create($html, "landscape", "Realisasi Anggaran " . date('mdy'), true);
    }

    public function print_report() {

        $template = 'realisasi_anggaran.xls';
        $data['list_data'] = $this->anggaran_model->select_all()->result();
        $this->printReport($data, $template);
    }

    function printReport($data, $template) {
        //template path
        $path_template = 'D:\\Work\\Template\\';

        //load our new PHPExcel library
        $this->load->library('excel');

        //get template
        $objTpl = PHPExcel_IOFactory::load($path_template . $template);

        //activate worksheet number 1
        $objTpl->setActiveSheetIndex(0);  //set first sheet as active
        //header report
//        $objTpl->getActiveSheet()->setCellValueByColumnAndRow(0, 3, date('m/j/Y'));

        $row = 2;
        $i = 1;
        $nama_kegiatan = '';
        foreach ($data['list_data'] as $data) {
            $objTpl->getActiveSheet()->duplicateStyle(
                    $objTpl->getActiveSheet()->getStyle('A2:I2'), 'A' . $row . ':I' . $row
            );
            if ($nama_kegiatan != $data->nama_kegiatan) {
                $objTpl->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $i);
                $objTpl->getActiveSheet()->setCellValueByColumnAndRow(1, $row, $data->nama_kegiatan);
                $objTpl->getActiveSheet()->setCellValueByColumnAndRow(2, $row, $data->kode_kegiatan);
                $i++;
            } else {
                $objTpl->getActiveSheet()->setCellValueByColumnAndRow(0, $row, "");
                $objTpl->getActiveSheet()->setCellValueByColumnAndRow(1, $row, "");
                $objTpl->getActiveSheet()->setCellValueByColumnAndRow(2, $row, "");
            }
            $objTpl->getActiveSheet()->setCellValueByColumnAndRow(3, $row, $data->kode_akun);
            $objTpl->getActiveSheet()->setCellValueByColumnAndRow(4, $row, $data->jenis_belanja);
            $objTpl->getActiveSheet()->setCellValueByColumnAndRow(5, $row, $data->pagu);
            $objTpl->getActiveSheet()->setCellValueByColumnAndRow(6, $row, $data->biaya);
            $objTpl->getActiveSheet()->setCellValueByColumnAndRow(7, $row, $data->sisa);
            $objTpl->getActiveSheet()->setCellValueByColumnAndRow(8, $row, $data->tahun_anggaran);
            $row++;
            $nama_kegiatan = $data->nama_kegiatan;
        }

        $filename = 'Realisasi Anggaran ' . date('dmy') . '_' . mt_rand(1, 100000) . '.xls'; //just some random filename
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objTpl, 'Excel5');  //downloadable file is in Excel 2003 format (.xls)
        $objWriter->save('php://output');  //send it to user, of course you can save it to disk also!

        exit; //done.. exiting!
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}

?>