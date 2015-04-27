<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_perintah_tugas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all($data = null) {
        //return $this->db->get('akun');
    }

}
