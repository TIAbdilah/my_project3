<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengajuan_barang_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('pengajuan_barang');
    }

    public function select_by_id($id) {
        return $this->db->get_where('biaya_sewa', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('biaya_sewa', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'id_anggaran' => $data['id_anggaran'],
            'maksud_kegiatan' => $data['maksud_kegiatan'],
            'nomor_pengajuan' => $data['nomor_pengajuan'],
            'status_approval' => $data['status_approval'],
            'tanggal_pengajuan' => $this->format_date_to_sql($data['tanggal_pengajuan'])
        );
        $this->db->insert('pengajuan_barang', $data);
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
    
    public function format_date_to_sql($str){        
        return substr($str, 6, 4).'-'.substr($str, 3, 2).'-'.substr($str, 0, 2);
    }

}
