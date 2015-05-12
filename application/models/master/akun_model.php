<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('akun');
    }

    public function select_by_id($id) {
        return $this->db->get_where('akun', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('akun', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'kode_akun' => $data['kode_akun'],
            'jenis_belanja' => $data['jenis_belanja']
        );
        $this->db->insert('akun', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'kode_akun' => $data['kode_akun'],
            'jenis_belanja' => $data['jenis_belanja']
        );
        $this->db->update('akun', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('akun', array('id' => $id));
    }

}
