<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kota_tujuan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('kota_tujuan');
    }

    public function select_by_id($id) {
        return $this->db->get_where('kota_tujuan', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('kota_tujuan', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'kode_wilayah' => $data['kode_wilayah'],
            'nama_provinsi' => $data['nama_provinsi'],
            'nama_kota' => $data['nama_kota']
        );
        $this->db->insert('kota_tujuan', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'kode_wilayah' => $data['kode_wilayah'],
            'nama_provinsi' => $data['nama_provinsi'],
            'nama_kota' => $data['nama_kota']
        );
        $this->db->update('kota_tujuan', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('kota_tujuan', array('id' => $id));
    }
    
   
    


}
