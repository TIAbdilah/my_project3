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
            $this->temp_kegiatan_model->add($data);
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
            $this->temp_akun_model->add($data);
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
    
    public function truncate_table(){
        $this->temp_kegiatan_model->truncate();
        $this->temp_akun_model->truncate();
        $this->temp_anggaran_model->truncate();
        redirect('common/import_anggaran');
    }

}
