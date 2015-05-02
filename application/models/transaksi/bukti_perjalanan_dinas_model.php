<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bukti_perjalanan_dinas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('bukti_perjalanan_dinas');
    }

    public function select_by_id($id) {
        return $this->db->get_where('bukti_perjalanan_dinas', array('id' => $id));
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

    public function format_date_to_sql($str) {
        return substr($str, 6, 4) . '-' . substr($str, 3, 2) . '-' . substr($str, 0, 2);
    }

}
