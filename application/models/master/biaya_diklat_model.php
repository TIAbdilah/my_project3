<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
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
    
    public function getBiayaDiklat($nama_kota = string) {
        $sql="select br.* "
                . "from biaya_diklat br "
                . "where br.nama_provinsi = ("
                . "select kt.nama_provinsi "
                . "from kota_tujuan kt where kt.nama_kota = '".$nama_kota."') ";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
