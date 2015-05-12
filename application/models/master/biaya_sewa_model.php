<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_sewa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {        
        $this->db->select('*');
        $this->db->from('biaya_sewa');
        $this->db->order_by('nama_kota, jenis_kendaraan');
        return $this->db->get();
    }

    public function select_by_id($id) {
        return $this->db->get_where('biaya_sewa', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('biaya_sewa', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'nama_kota' => $data['nama_kota'],
            'jenis_kendaraan' => $data['jenis_kendaraan'],
            'biaya' => $data['biaya']
        );
        $this->db->insert('biaya_sewa', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'nama_kota' => $data['nama_kota'],
            'jenis_kendaraan' => $data['jenis_kendaraan'],
            'biaya' => $data['biaya']
        );
        $this->db->update('biaya_sewa', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('biaya_sewa', array('id' => $id));
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
