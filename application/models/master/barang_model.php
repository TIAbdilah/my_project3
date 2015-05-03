<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('barang');
    }

    public function select_by_id($id) {
        return $this->db->get_where('barang', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('barang', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'kode_barang' => $data['kode_barang'],
            'nama_barang' => $data['nama_barang'],
            'satuan' => $data['satuan'],
            'pagu_harga' => $data['pagu_harga'],
            'kode_jenis_barang' => $data['kode_jenis_barang']
        );
        $this->db->insert('barang', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'kode_barang' => $data['kode_barang'],
            'nama_barang' => $data['nama_barang'],
            'satuan' => $data['satuan'],
            'pagu_harga' => $data['pagu_harga'],
            'kode_jenis_barang' => $data['kode_jenis_barang']
        );
        $this->db->update('barang', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('barang', array('id' => $id));
    }

     public function getDetailBarang($id_barang = string) {
        $this->db->select('satuan,pagu_harga');
        $this->db->from('barang');
        $this->db->where('id', $id_barang);
        $query = $this->db->get();
        return $query->result();
    }
}