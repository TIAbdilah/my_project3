<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_penginapan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $this->db->select('*');
        $this->db->from('biaya_penginapan');
        $this->db->order_by('nama_kota, golongan');
        return $this->db->get();
    }

    public function select_by_id($id) {
        return $this->db->get_where('biaya_penginapan', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('biaya_penginapan', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'nama_kota' => $data['nama_kota'],
            'golongan' => $data['golongan'],
            'biaya' => $data['biaya']
        );
        $this->db->insert('biaya_penginapan', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'nama_kota' => $data['nama_kota'],
            'golongan' => $data['golongan'],
            'biaya' => $data['biaya']
        );
        $this->db->update('biaya_penginapan', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('biaya_penginapan', array('id' => $id));
    }

    public function calculatePenginapan($id_kota = string) {
        $this->db->select('biaya');
        $this->db->from('biaya_penginapan');
        $this->db->where('id', $id_kota);
        $query = $this->db->get();

        return $query->result();
    }

    public function getBiayaPenginapan($nama_kota = string, $golongan = string) {
        $sql = "select ba.* "
                . "from biaya_penginapan ba "
                . "where ba.nama_kota = ("
                . "select kt.nama_provinsi "
                . "from kota_tujuan kt where kt.nama_kota = '" . $nama_kota . "') and ba.golongan = '" . $golongan . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
