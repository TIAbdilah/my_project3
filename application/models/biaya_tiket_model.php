<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_tiket_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('biaya_tiket');
    }

    public function select_by_id($id) {
        return $this->db->get_where('biaya_tiket', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('biaya_tiket', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'kota_asal' => $data['kota_asal'],
            'kota_tujuan' => $data['kota_tujuan'],
            'jenis_kendaraan' => $data['jenis_kendaraan'],
            'biaya' => $data['biaya']
        );
        $this->db->insert('biaya_tiket', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'kota_asal' => $data['kota_asal'],
            'kota_tujuan' => $data['kota_tujuan'],
            'jenis_kendaraan' => $data['jenis_kendaraan'],
            'biaya' => $data['biaya']
        );
        $this->db->update('biaya_tiket', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('biaya_tiket', array('id' => $id));
    }

    public function populateTransport($param = string) {
        $this->db->select('id,jenis_kendaraan');
        $this->db->from('biaya_tiket');
        $this->db->where('kota_tujuan', $param);
        $query = $this->db->get();

        return $query->result();
    }

    public function calculateTransport($param = string) {
        $this->db->select('id,biaya');
        $this->db->from('biaya_tiket');
        $this->db->where('id', $param);
        $query = $this->db->get();

        return $query->result();
    }

}
