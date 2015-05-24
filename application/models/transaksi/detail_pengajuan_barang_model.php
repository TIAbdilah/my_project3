<?php

//Created By    : Rizal
//Updated By    : Rizal
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pengajuan_barang_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $query = 'select pd.*, '
                . '(select k1.nama_barang from barang k1 where k1.id = pd.id_barang) as nama_barang, '
                . '(select k1.pagu_harga from barang k1 where k1.id = pd.id_barang) as pagu_harga '
                . 'from detail_pengajuan_barang pd ';

        return $this->db->query($query);
    }

//    public function select_all() {
//        return $this->db->get('detail_pengajuan_barang');
//    }

    public function select_by_id($id) {
        $query = 'select pd.*, '
                . '(select k1.nama_barang from barang k1 where k1.id = pd.id_barang) as nama_barang, '
                . '(select k1.spesifikasi from barang k1 where k1.id = pd.id_barang) as spesifikasi, '
                . '(select k1.merek_barang from barang k1 where k1.id = pd.id_barang) as merek_barang, '
                . '(select k1.pagu_harga from barang k1 where k1.id = pd.id_barang) as pagu_harga, '
                . '(select k1.satuan from barang k1 where k1.id = pd.id_barang) as satuan '
                . 'from detail_pengajuan_barang pd '
                . 'where pd.id_pengajuan_barang = ' . $id;
        return $this->db->query($query);
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('detail_pengajuan_barang', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'id_pengajuan_barang' => $data['id_pengajuan_barang'],
            'id_jenis_barang' => $data['id_jenis_barang'],
            'id_barang' => $data['id_barang'],
            'jumlah' => $data['jumlah']
        );
        $this->db->insert('detail_pengajuan_barang', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_pengajuan_barang' => $data['id_pengajuan_barang'],
            'id_jenis_barang' => $data['id_jenis_barang'],
            'id_barang' => $data['id_barang'],
            'jumlah' => $data['jumlah']
        );
        $this->db->update('detail_pengajuan_barang', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('detail_pengajuan_barang', array('id' => $id));
    }

    public function format_date_to_sql($str) {
        return substr($str, 6, 4) . '-' . substr($str, 3, 2) . '-' . substr($str, 0, 2);
    }

}
