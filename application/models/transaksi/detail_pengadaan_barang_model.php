<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 20 Mei 2015
//Updated Date  : 20 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pengadaan_barang_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('detail_pengadaan_barang');
    }

    public function select_by_id($id) {
        return $this->db->get_where('detail_pengadaan_barang', array('id' => $id));
    }

    public function select_by_field($param = array()) {
        $sql = "select d.id_barang "
                . ", (select p.nama_barang from barang p where p.id= d.id_barang) as nama_barang "
                . ", (select p.merek_barang from barang p where p.id= d.id_barang) as merek_barang "
                . ", (select p.spesifikasi from barang p where p.id= d.id_barang) as spesifikasi "
                . ", (select dpj.jumlah from detail_pengadaan_barang dpj where dpj.id_barang = d.id_barang) as jumlah "
                . "from detail_pengajuan_barang d "
                . "where 1 = 1 ";
        if (!empty($param['id_pengadaan_barang'])) {
            $sql = $sql . "and d.id_pengajuan_barang = (select pj.id_header from pengadaan_barang pj where pj.id = " . $param['id_pengadaan_barang'] . ") ";
        }
        if (!empty($param['id_header'])) {
            $sql = $sql . "and d.id_header = " . $param['id_header'] . " ";
        }
        if (!empty($param['id_pegawai'])) {
            $sql = $sql . "and d.id_pegawai = " . $param['id_pegawai'] . " ";
        }
        return $this->db->query($sql);
    }
	
	public function select_jumlah($param = array()) {
        $sql = "select jumlah "
                . "from detail_pengadaan_barang d "
                . "where 1 = 1 ";
        if (!empty($param['id_pengadaan_barang'])) {
            $sql = $sql . "and d.id_pengadaan_barang = " . $param['id_pengadaan_barang'] . " ";
        }
        return $this->db->query($sql);
    }

    public function add($data) {
        $data = array(
            'id_pengadaan_barang' => $data['id_pengadaan_barang'],
            'id_barang' => $data['id_barang'],
            'jumlah' => $data['jumlah']
        );
        $this->db->insert('detail_pengadaan_barang', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_pengadaan_barang' => $data['id_pengadaan_barang'],
            'id_barang' => $data['id_barang'],
            'jumlah' => $data['jumlah']
        );
        $this->db->update('detail_pengadaan_barang', $data, "id = " . $id);
    }

    public function delete($param = array()) {
        $this->db->delete('detail_pengadaan_barang', $param);
    }

}
