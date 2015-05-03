<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
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
        $query = 'select pd.*, a1.nama_kegiatan, a1.jenis_belanja '
                . 'from pengajuan_barang pd, '
                . '(select a.id, k.nama_kegiatan, ak.jenis_belanja '
                . 'from anggaran a, kegiatan k, akun ak '
                . 'where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 '
                . 'where pd.id_anggaran = a1.id '
                . 'and pd.id = ' . $id;
        return $this->db->query($query);
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('biaya_sewa', array($field => $keyword));
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
        $this->db->delete('pengajuan_barang', array('id' => $id));
    }

    public function format_date_to_sql($str) {
        return substr($str, 6, 4) . '-' . substr($str, 3, 2) . '-' . substr($str, 0, 2);
    }

}
