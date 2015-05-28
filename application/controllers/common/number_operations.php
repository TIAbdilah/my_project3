<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Number_operations extends CI_Controller {

    public function index() {
        $number = '1650,345';
        echo $this->cleanCommas($number);
    }

    public function cleanCommas($string) {
        return str_replace(',', '', $string);
    }

}
