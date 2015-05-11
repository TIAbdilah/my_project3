<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/array_custom.php');

class Format_date extends CI_Controller {

    public function index() {
        $number = '2015-05-08';
        echo $this->format_date_dfy($number).'<br>';
        echo $this->format_date_dmy($number).'<br>';        
    }

    public function format_date_dfy($string) {
        $array_custom = new Array_custom();
        $text = '';
        $text = substr($string, 8, 2) . ' ' . $array_custom->bulan[substr($string, 5, 2)] . ' ' . substr($string, 0, 4);
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
