<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_perjalanan_dinas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('detail_perjalanan_dinas');
    }

    public function select_by_id($id) {
        return $this->db->get_where('detail_perjalanan_dinas', array('id' => $id));
    }

    public function select_by_field($param = array()) {
        return $this->db->get_where('detail_perjalanan_dinas', $param);
    }

    public function add($data) {
        $data = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_header' => $data['id_header'],
            'jenis_biaya' => $data['jenis_biaya'],
            'kota_asal' => $data['kota_asal'],
            'kota_tujuan' => $data['kota_tujuan'],
            'jenis_penginapan' => $data['jenis_penginapan'],
            'jenis_kendaraan' => $data['jenis_kendaraan'],
            'biaya' => $data['biaya']
        );
        $this->db->insert('detail_perjalanan_dinas', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_header' => $data['id_header'],
            'jenis_biaya' => $data['jenis_biaya'],
            'kota_asal' => $data['kota_asal'],
            'kota_tujuan' => $data['kota_tujuan'],
            'jenis_penginapan' => $data['jenis_penginapan'],
            'jenis_kendaraan' => $data['jenis_kendaraan'],
            'biaya' => $data['biaya']
        );

        $this->db->update('detail_perjalanan_dinas', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('detail_perjalanan_dinas', array('id' => $id));
    }

}
