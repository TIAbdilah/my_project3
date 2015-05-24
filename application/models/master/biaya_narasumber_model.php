<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 24 Mei 2015
//Updated Date  : 24 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_narasumber_model extends CI_Model {
    
    var $table_name = 'biaya_narasumber';

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {        
        return $this->db->get($this->table_name);
    }

    public function select_by_field($param = array()) {
        return $this->db->get_where($this->table_name, $param);
    }

    public function add($data) {
        $data = array(
            'jabatan' => $data['jabatan'],
            'biaya' => $data['biaya']
        );
        $this->db->insert($this->table_name, $data);
    }

    public function edit($data, $param = array()) {
        $data = array(
            'jabatan' => $data['jabatan'],
            'biaya' => $data['biaya']
        );
        $this->db->update($this->table_name, $data, $param);
    }

    public function delete($param = array()) {
        $this->db->delete($this->table_name, $param);
    }
    
    
    public function populateSewa($param = string) {
        $sql="select bs.* "
                . "from biaya_sewa bs "
                . "where bs.nama_kota = ("
                . "select kt.nama_provinsi "
                . "from kota_tujuan kt where kt.nama_kota = '".$param."') ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function calculateSewa($param = string, $param2 = string) {
        $sql="select bs.* "
                . "from biaya_sewa bs "
                . "where bs.nama_kota = ("
                . "select kt.nama_provinsi "
                . "from kota_tujuan kt where kt.nama_kota = '".$param2."') "
                . "and jenis_kendaraan ='".$param."' ";
        $query = $this->db->query($sql);
        return $query->result();
    }


}
