<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->order_by('nama_barang', 'ASC')->get('barang');
    }

    public function select_by_id($id) {
        return $this->db->get_where('barang', array('id' => $id));
    }

//    public function select_by_field($field, $keyword) {
//        return $this->db->order_by('nama_barang', 'ASC')->get_where('barang', array($field => $keyword));
//    }

    public function select_by_field($param = array()) {
        if (!empty($param['head_nama_barang'])) {
            $sql = "select distinct b.nama_barang ";
        }
        if (!empty($param['head_merek_barang'])) {
            $sql = "select distinct b.merek_barang ";
        }
        if (!empty($param['head_spesifikasi'])) {
            $sql = "select distinct b.spesifikasi ";
        }
        $sql = $sql
                . "from barang b "
                . "where 1 = 1 ";
        if (!empty($param['kode_jenis_barang'])) {
            $sql = $sql . "and b.kode_jenis_barang = '" . $param['kode_jenis_barang'] . "' ";
        }
        if (!empty($param['id'])) {
            $sql = $sql . "and pj.id = " . $param['id'];
        }
        $sql = $sql . " order by b.nama_barang ";
        return $this->db->query($sql);
    }

    public function add($data) {
        $data = array(
            'kode_barang' => $data['kode_barang'],
            'nama_barang' => $data['nama_barang'],
            'satuan' => $data['satuan'],
            'pagu_harga' => $data['pagu_harga'],
            'kode_jenis_barang' => $data['kode_jenis_barang'],
            'tipe_barang' => $data['tipe_barang'],
            'merek_barang' => $data['merek_barang'],
            'spesifikasi' => $data['spesifikasi']
        );
        $this->db->insert('barang', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'kode_barang' => $data['kode_barang'],
            'nama_barang' => $data['nama_barang'],
            'satuan' => $data['satuan'],
            'pagu_harga' => $data['pagu_harga'],
            'kode_jenis_barang' => $data['kode_jenis_barang'],
            'tipe_barang' => $data['tipe_barang'],
            'merek_barang' => $data['merek_barang'],
            'spesifikasi' => $data['spesifikasi']
        );
        $this->db->update('barang', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('barang', array('id' => $id));
    }

    public function getDetailBarang($param1, $param2, $param3) {
        $this->db->select('id,satuan,pagu_harga');
        $this->db->from('barang');
        $this->db->where('nama_barang', $param1);
        $this->db->where('merek_barang', $param2);
        $this->db->where('spesifikasi', $param3);
        $query = $this->db->get();
        return $query->result();
    }

    public function populateBarang($param = string) {
        $this->db->select('id,nama_barang');
        $this->db->from('barang');
        $this->db->where('kode_jenis_barang', $param);
        $query = $this->db->get();

        return $query->result();
    }

    public function populateMerek($param = string) {
        $this->db->distinct();
        $this->db->select('merek_barang');
        $this->db->from('barang');
        $this->db->where('nama_barang', $param);
        $query = $this->db->get();

        return $query->result();
    }

    public function populateSpesifikasi($param = string) {
        $this->db->distinct();
        $this->db->select('spesifikasi');
        $this->db->from('barang');
        $this->db->where('nama_barang', $param);
        $query = $this->db->get();

        return $query->result();
    }

}
