<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Temp_akun_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('temp_akun');
    }

    public function select_by_id($id) {
        return $this->db->get_where('temp_akun', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('temp_akun', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'kode_akun' => $data['kode_akun'],
            'jenis_belanja' => $data['jenis_belanja']
        );
        $this->db->insert('temp_akun', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'kode_akun' => $data['kode_akun'],
            'jenis_belanja' => $data['jenis_belanja']
        );
        $this->db->update('temp_akun', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('temp_akun', array('id' => $id));
    }
    
    public function truncate() {
        $this->db->truncate('temp_akun');
    }

}
