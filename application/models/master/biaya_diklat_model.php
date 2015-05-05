<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_diklat_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('biaya_diklat');
    }

    public function select_by_id($id) {
        return $this->db->get_where('biaya_diklat', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('biaya_diklat', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'nama_provinsi' => $data['nama_provinsi'],
            'biaya' => $data['biaya']
        );
        $this->db->insert('biaya_diklat', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'nama_provinsi' => $data['nama_provinsi'],
            'biaya' => $data['biaya']
        );
        $this->db->update('biaya_diklat', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('biaya_diklat', array('id' => $id));
    }

}
