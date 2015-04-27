<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_akomodasi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('biaya_akomodasi');
    }

    public function select_by_id($id) {
        return $this->db->get_where('biaya_akomodasi', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('biaya_akomodasi', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'nama_kota' => $data['nama_kota'],
            'status_pegawai' => $data['status_pegawai'],
            'biaya' => $data['biaya']
        );
        $this->db->insert('biaya_akomodasi', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'nama_kota' => $data['nama_kota'],
            'status_pegawai' => $data['status_pegawai'],
            'biaya' => $data['biaya']
        );
        $this->db->update('biaya_akomodasi', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('biaya_akomodasi', array('id' => $id));
    }
    
    public function calculateAkomodasi($id_kota = string) {
        $this->db->select('biaya');
        $this->db->from('biaya_akomodasi');
        $this->db->where('id', $id_kota);
        $query = $this->db->get();
        
        return $query->result();
    }

}
