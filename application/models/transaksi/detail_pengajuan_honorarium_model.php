<?php

//Created By    : Rizal
//Updated By    : Rizal
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pengajuan_honorarium_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $query = 'select pd.*, '
                . '(select k1.nama_barang from barang k1 where k1.id = pd.id_barang) as nama_barang, '
                . '(select k1.pagu_harga from barang k1 where k1.id = pd.id_barang) as pagu_harga '
                . 'from detail_pengajuan_honorarium pd ';

        return $this->db->query($query);
    }

//    public function select_all() {
//        return $this->db->get('detail_pengajuan_honorarium');
//    }

    public function select_by_id($id) {
        $query = 'select ph.*, '
                . '(select p.nama from pegawai p where p.id = ph.id_narasumber) as narasumber, '
                . '(select bn.jabatan from biaya_narasumber bn where id=(select p.jabatan from pegawai p where p.id = ph.id_narasumber)) as jabatan, '
                . '(select bn.biaya from biaya_narasumber bn where id=(select p.jabatan from pegawai p where p.id = ph.id_narasumber)) as honor, '
                . '(select p.golongan from pegawai p where p.id = ph.id_narasumber) as golongan '
                . 'from detail_pengajuan_honorarium ph '
                . 'where ph.id_pengajuan_honorarium = ' . $id;
        return $this->db->query($query);
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('detail_pengajuan_honorarium', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'id_pengajuan_honorarium' => $data['id_pengajuan_honorarium'],
            'id_narasumber' => $data['id_narasumber'],
            'jumlah' => $data['jumlah']
        );
        $this->db->insert('detail_pengajuan_honorarium', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_pengajuan_honorarium' => $data['id_pengajuan_honorarium'],
            'id_narasumber' => $data['id_narasumber'],
            'jumlah' => $data['jumlah']
        );
        $this->db->update('detail_pengajuan_honorarium', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('detail_pengajuan_honorarium', array('id' => $id));
    }

    public function format_date_to_sql($str) {
        return substr($str, 6, 4) . '-' . substr($str, 3, 2) . '-' . substr($str, 0, 2);
    }

}
