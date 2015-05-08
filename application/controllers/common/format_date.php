<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Format_date extends CI_Controller {

    var $bulan = array(
        '01'=>'Januari',
        '02'=>'Februari',
        '03'=>'Maret',
        '04'=>'April',
        '05'=>'Mei',
        '06'=>'Juni',
        '07'=>'Juli',
        '08'=>'Agustus',
        '09'=>'September',
        '10'=>'Oktober',
        '11'=>'November',
        '12'=>'Desember',
    );
    public function index() {
        $number = '2015-05-08';
        echo $this->format_date_dfy($number).'<br>';
        echo $this->format_date_dmy($number).'<br>';        
    }

    public function format_date_dfy($string) {
        $text = '';
        $text = substr($string, 8, 2) . ' ' . $this->bulan[substr($string, 5, 2)] . ' ' . substr($string, 0, 4);
        return $text;
    }
    
    public function format_date_dmy($string){
        $text = '';
        $text = substr($string, 8, 2) . '-' . substr($string, 5, 2) . '-' . substr($string, 0, 4);
        return $text;
    }
    
    public function format_date_sql($string){
        $text = '';
        $text =  substr($string, 6, 4).'-'.substr($string, 3, 2).'-'.substr($string, 0, 2);;
        return $text;
    }

}
