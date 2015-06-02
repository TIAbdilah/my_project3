<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of export_anggaran
 *
 * @author TIAbdilah
 */
class Import_anggaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('excel');
        $this->load->model('common/temp_kegiatan_model');
        $this->load->model('common/temp_akun_model');
        $this->load->model('common/temp_anggaran_model');
        $this->load->model('master/kegiatan_model');
        $this->load->model('master/akun_model');
        $this->load->model('master/anggaran_model');
        $this->load->model('master/unit_model');
    }

    public function index() {
        $data['title'] = "e-satker | Akun";
        $data['page'] = 'admin/common/import_anggaran/list';
        $data['list_data_kegiatan'] = $this->temp_kegiatan_model->select_all()->result();
        $data['list_data_akun'] = $this->temp_akun_model->select_all()->result();
        $data['list_data_anggaran'] = $this->temp_anggaran_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function import_excel() {
        $path_template = 'D:\\Work\\Template\\';
        $template = 'anggaran_exp.xlsx';
        $inputFileName = $path_template . $template;


        //  Read your Excel workbook
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        //  Get worksheet dimensions (1st sheet)
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        //  Loop through each row of the worksheet in turn
        for ($row = 2; $row <= $highestRow; $row++) {
            //  Read a row of data into an array 				
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            //  Insert row data array into your database of choice here
            $data = array(
                "kode_kegiatan" => $rowData[0][0],
                "nama_kegiatan" => $rowData[0][1],
                "kode_unit" => $rowData[0][2],
                "koordinator" => $rowData[0][3],
                "penanggung_jawab" => $rowData[0][4]
            );
            $count_temp_keg = $this->temp_kegiatan_model->select_by_field('kode_kegiatan', $data['kode_kegiatan'])->num_rows();
            if ($count_temp_keg == 0) {
                $this->temp_kegiatan_model->add($data);
            }
//            print_r($data);
//            echo "<br>";
        }
//        echo "Import Data Kegiatan Success<br><br>";
        //  Get worksheet dimensions (2nd sheet)
        $sheet = $objPHPExcel->getSheet(1);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        //  Loop through each row of the worksheet in turn
        for ($row = 2; $row <= $highestRow; $row++) {
            //  Read a row of data into an array 				
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            //  Insert row data array into your database of choice here
            $data = array(
                "kode_akun" => $rowData[0][0],
                "jenis_belanja" => $rowData[0][1]
            );
            $count_temp_akn = $this->temp_akun_model->select_by_field('kode_akun', $data['kode_akun'])->num_rows();
            if ($count_temp_akn == 0) {
                $this->temp_akun_model->add($data);
            }
//            print_r($data);
//            echo "<br>";
        }
//        echo "Import Data Akun Success<br><br>";
        //  Get worksheet dimensions (2nd sheet)
        $sheet = $objPHPExcel->getSheet(2);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        //  Loop through each row of the worksheet in turn
        for ($row = 2; $row <= $highestRow; $row++) {
            //  Read a row of data into an array 				
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            //  Insert row data array into your database of choice here
            $data = array(
                "kode_kegiatan" => $rowData[0][0],
                "kode_akun" => $rowData[0][1],
                "pagu" => $rowData[0][2],
                "tahun_anggaran" => $rowData[0][3]
            );
            $this->temp_anggaran_model->add($data);
//            print_r($data);
//            echo "<br>";
        }
//        echo "Import Data Anggaran Success";

        redirect('common/import_anggaran');
    }

    public function write_to_master() {

        // data kegiatan
        $data_kegiatan = $this->temp_kegiatan_model->select_all()->result();
        foreach ($data_kegiatan as $row_1) {
            $data_unit = $this->unit_model->select_by_field('kode_unit', $row_1->kode_unit)->row();
            $data_1['id_unit'] = $data_unit->id;
            $data_1['kode_kegiatan'] = $row_1->kode_kegiatan;
            $data_1['nama_kegiatan'] = $row_1->nama_kegiatan;
            $data_1['koordinator'] = $row_1->koordinator;
            $data_1['penanggung_jawab'] = $row_1->penanggung_jawab;
            $count_keg = $this->kegiatan_model->select_by_field('kode_kegiatan', $data_1['kode_kegiatan'])->num_rows();
            if ($count_keg == 0) {
                $this->kegiatan_model->add($data_1);
            }
        }

        //data akun
        $data_akun = $this->temp_akun_model->select_all()->result();
        foreach ($data_akun as $row_2) {
            $data_2['kode_akun'] = $row_2->kode_akun;
            $data_2['jenis_belanja'] = $row_2->jenis_belanja;
            $count_akn = $this->akun_model->select_by_field('kode_akun', $data_2['kode_akun'])->num_rows();
            if ($count_akn == 0) {
                $this->akun_model->add($data_2);
            }
        }

        //data anggaran
        $data_anggaran = $this->temp_anggaran_model->select_all()->result();
        foreach ($data_anggaran as $row_3) {
            $data_keg = $this->kegiatan_model->select_by_field('kode_kegiatan', $row_3->kode_kegiatan)->row();
            $data_3['id_kegiatan'] = $data_keg->id;
            $data_akn = $this->akun_model->select_by_field('kode_akun',$row_3->kode_akun)->row();
            $data_3['id_akun'] = $data_akn->id;
            $data_3['pagu'] = $row_3->pagu;
            $data_3['tahun_anggaran'] = $row_3->tahun_anggaran;
            $count_ang = $this->anggaran_model->select_by_field_1(array(
                'id_kegiatan' => $data_3['id_kegiatan'],
                'id_akun' => $data_3['id_akun'],
                'pagu' => $data_3['pagu'],
                'tahun_anggaran' => $data_3['tahun_anggaran'],
            ))->num_rows();
            if ($count_ang == 0) {
                $this->anggaran_model->add($data_3);
            }
        }
        
        $this->truncate_table();
    }

    public function truncate_table() {
        $this->temp_kegiatan_model->truncate();
        $this->temp_akun_model->truncate();
        $this->temp_anggaran_model->truncate();
        redirect('common/import_anggaran');
    }

}
