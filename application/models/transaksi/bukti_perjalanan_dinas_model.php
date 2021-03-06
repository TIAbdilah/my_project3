<?php

//Created By    : Rizal
//Updated By    : Rizal
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
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
        return $this->db->get_where('detail_perjalanan_dinas', array('id' => $id));
    }

    public function select_by_field($param = array()) {
        $this->db->select('*');
        $this->db->from('bukti_perjalanan_dinas');
        $this->db->where($param);
        $this->db->order_by('jenis_biaya, kota_tujuan');
        return $this->db->get();
    }

    public function ceknumrows($id_header, $id_pegawai, $kota_tujuan) {
        $sql = "select * "
                . "from bukti_perjalanan_dinas "
                . "where id_header = " . $id_header . " "
                . "and id_pegawai = " . $id_pegawai . " "
                . "and kota_tujuan = '" . $kota_tujuan . "' ";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    
    public function ceknum($id_header, $id_pegawai) {
        $sql = "select * "
                . "from bukti_perjalanan_dinas "
                . "where id_header = " . $id_header . " "
                . "and id_pegawai = " . $id_pegawai . " ";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    
    public function select_biaya_from_detail($id_header, $id_pegawai, $kota_tujuan) {
        $sql = "select "
                . "(select p1.nama from pegawai p1 where p1.id = d.id_pegawai) as nama_pegawai "
                . ", (select p2.golongan from pegawai p2 where p2.id = d.id_pegawai) as golongan "
                . ", (select p3.jabatan from pegawai p3 where p3.id = d.id_pegawai) as jabatan "
                . ", d.kota_tujuan "
                . ", (select p.kode_unit from pegawai p where p.id = d.id_pegawai) as id_unit "
                . ", (select d1.biaya from detail_perjalanan_dinas d1 where jenis_biaya = 'harian' and d1.id_pegawai = d.id_pegawai and d.id_header = d1.id_header and d.kota_tujuan = d1.kota_tujuan) as harian "
                . ", (select d2.biaya from detail_perjalanan_dinas d2 where jenis_biaya = 'penginapan' and d2.id_pegawai = d.id_pegawai and d.id_header = d2.id_header and d.kota_tujuan = d2.kota_tujuan) as penginapan "
                . ", (select d3.biaya from detail_perjalanan_dinas d3 where jenis_biaya = 'transport_utama' and d3.id_pegawai = d.id_pegawai and d.id_header = d3.id_header and d.kota_tujuan = d3.kota_tujuan) as transport_utama "
                . ", (select d4.biaya from detail_perjalanan_dinas d4 where jenis_biaya = 'transport_pendukung' and d4.id_pegawai = d.id_pegawai and d.id_header = d4.id_header and d.kota_tujuan = d4.kota_tujuan) as transport_pendukung "
                . ", (select d5.biaya from detail_perjalanan_dinas d5 where jenis_biaya = 'riil' and d5.id_pegawai = d.id_pegawai and d.id_header = d5.id_header and d.kota_tujuan = d5.kota_tujuan) as riil "
                . ", (select d6.biaya from detail_perjalanan_dinas d6 where jenis_biaya = 'representatif' and d6.id_pegawai = d.id_pegawai and d.id_header = d6.id_header and d.kota_tujuan = d6.kota_tujuan) as representatif "
                . ", (select d7.biaya from detail_perjalanan_dinas d7 where jenis_biaya = 'diklat' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header and d.kota_tujuan = d7.kota_tujuan) as diklat "
                . ", (select d8.biaya from detail_perjalanan_dinas d8 where jenis_biaya = 'sewa' and d8.id_pegawai = d.id_pegawai and d.id_header = d8.id_header and d.kota_tujuan = d8.kota_tujuan) as sewa "
                . "from detail_perjalanan_dinas d "
                . "where d.id_header = " . $id_header . " "
                . "and d.id_pegawai = " . $id_pegawai . " "
                . "and d.kota_tujuan = '" . $kota_tujuan . "' "
                . "group by nama_pegawai, kota_tujuan";
        return $this->db->query($sql);
    }

    public function select_biaya_from_bukti($id_header, $id_pegawai, $kota_tujuan) {
        $sql = "select "
                . " (select d1.nomor_bukti from bukti_perjalanan_dinas d1 where jenis_biaya = 'harian' and d1.id_pegawai = d.id_pegawai and d.id_header = d1.id_header  and d1.kota_tujuan ='" . $kota_tujuan . "') as nomor_harian "
                . ", (select d2.nomor_bukti from bukti_perjalanan_dinas d2 where jenis_biaya = 'penginapan' and d2.id_pegawai = d.id_pegawai and d.id_header = d2.id_header  and d2.kota_tujuan ='" . $kota_tujuan . "') as nomor_penginapan "
                . ", (select d3.nomor_bukti from bukti_perjalanan_dinas d3 where jenis_biaya = 'transport_utama' and d3.id_pegawai = d.id_pegawai and d.id_header = d3.id_header  and d3.kota_tujuan ='" . $kota_tujuan . "') as nomor_transport_utama "
                . ", (select d4.nomor_bukti from bukti_perjalanan_dinas d4 where jenis_biaya = 'transport_pendukung' and d4.id_pegawai = d.id_pegawai and d.id_header = d4.id_header  and d4.kota_tujuan ='" . $kota_tujuan . "') as nomor_transport_pendukung "
                . ", (select d5.nomor_bukti from bukti_perjalanan_dinas d5 where jenis_biaya = 'riil' and d5.id_pegawai = d.id_pegawai and d.id_header = d5.id_header  and d5.kota_tujuan ='" . $kota_tujuan . "') as nomor_riil "
                . ", (select d6.nomor_bukti from bukti_perjalanan_dinas d6 where jenis_biaya = 'representatif' and d6.id_pegawai = d.id_pegawai and d.id_header = d6.id_header  and d6.kota_tujuan ='" . $kota_tujuan . "') as nomor_representatif "
                . ", (select d7.nomor_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'diklat' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as nomor_diklat "
                . ", (select d8.nomor_bukti from bukti_perjalanan_dinas d8 where jenis_biaya = 'sewa' and d8.id_pegawai = d.id_pegawai and d.id_header = d8.id_header  and d8.kota_tujuan ='" . $kota_tujuan . "') as nomor_sewa "
                . ", (select d1.jumlah_bukti from bukti_perjalanan_dinas d1 where jenis_biaya = 'harian' and d1.id_pegawai = d.id_pegawai and d.id_header = d1.id_header  and d1.kota_tujuan ='" . $kota_tujuan . "') as jumlah_harian "
                . ", (select d2.jumlah_bukti from bukti_perjalanan_dinas d2 where jenis_biaya = 'penginapan' and d2.id_pegawai = d.id_pegawai and d.id_header = d2.id_header  and d2.kota_tujuan ='" . $kota_tujuan . "') as jumlah_penginapan "
                . ", (select d3.jumlah_bukti from bukti_perjalanan_dinas d3 where jenis_biaya = 'transport_utama' and d3.id_pegawai = d.id_pegawai and d.id_header = d3.id_header  and d3.kota_tujuan ='" . $kota_tujuan . "') as jumlah_transport_utama "
                . ", (select d4.jumlah_bukti from bukti_perjalanan_dinas d4 where jenis_biaya = 'transport_pendukung' and d4.id_pegawai = d.id_pegawai and d.id_header = d4.id_header  and d4.kota_tujuan ='" . $kota_tujuan . "') as jumlah_transport_pendukung "
                . ", (select d5.jumlah_bukti from bukti_perjalanan_dinas d5 where jenis_biaya = 'riil' and d5.id_pegawai = d.id_pegawai and d.id_header = d5.id_header  and d5.kota_tujuan ='" . $kota_tujuan . "') as jumlah_riil "
                . ", (select d6.jumlah_bukti from bukti_perjalanan_dinas d6 where jenis_biaya = 'representatif' and d6.id_pegawai = d.id_pegawai and d.id_header = d6.id_header  and d6.kota_tujuan ='" . $kota_tujuan . "') as jumlah_representatif "
                . ", (select d7.jumlah_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'diklat' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as jumlah_diklat "
                . ", (select d8.jumlah_bukti from bukti_perjalanan_dinas d8 where jenis_biaya = 'sewa' and d8.id_pegawai = d.id_pegawai and d.id_header = d8.id_header  and d8.kota_tujuan ='" . $kota_tujuan . "') as jumlah_sewa "
                . ", (select d7.nomor_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_2' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as nomor_riil_2 "
                . ", (select d7.jumlah_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_2' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as jumlah_riil_2 "
                . ", (select d7.nomor_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_3' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as nomor_riil_3 "
                . ", (select d7.jumlah_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_3' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as jumlah_riil_3 "
                . ", (select d7.nomor_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_4' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as nomor_riil_4 "
                . ", (select d7.jumlah_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_4' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as jumlah_riil_4 "
                . ", (select d7.nomor_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_5' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as nomor_riil_5 "
                . ", (select d7.jumlah_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_5' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as jumlah_riil_5 "
                . ", (select d7.nomor_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_6' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as nomor_riil_6 "
                . ", (select d7.jumlah_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_6' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as jumlah_riil_6 "
                . ", (select d7.nomor_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_7' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as nomor_riil_7 "
                . ", (select d7.jumlah_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_7' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as jumlah_riil_7 "
                . ", (select d7.nomor_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_8' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as nomor_riil_8 "
                . ", (select d7.jumlah_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_8' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as jumlah_riil_8 "
                . ", (select d7.nomor_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_9' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as nomor_riil_9 "
                . ", (select d7.jumlah_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_9' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as jumlah_riil_9 "
                . ", (select d7.nomor_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_10' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as nomor_riil_10 "
                . ", (select d7.jumlah_bukti from bukti_perjalanan_dinas d7 where jenis_biaya = 'riil_10' and d7.id_pegawai = d.id_pegawai and d.id_header = d7.id_header  and d7.kota_tujuan ='" . $kota_tujuan . "') as jumlah_riil_10 "
                . "from bukti_perjalanan_dinas d "
                . "where d.id_header = " . $id_header . " "
                . "and d.id_pegawai = " . $id_pegawai . " "
                . "";
        return $this->db->query($sql);
    }

    public function select_biaya_riil($id_header, $id_pegawai) {
        $sql = "SELECT * "
                . "FROM bukti_perjalanan_dinas "
                . "where jenis_biaya in ('riil','riil_2','riil_3','riil_4','riil_5','riil_6','riil_7','riil_8','riil_9','riil_10') "
                . "and id_pegawai = " . $id_pegawai . " "
                . "and id_header = " . $id_header;
        return $this->db->query($sql);
    }

    public function add($data) {
        $data = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_header' => $data['id_header'],
            'jenis_biaya' => $data['jenis_biaya'],
            'biaya' => $data['biaya'],
            'nomor_bukti' => $data['nomor_bukti'],
            'jumlah_bukti' => $data['jumlah_bukti'],
            'kota_tujuan' => $data['kota_tujuan']
        );
        $this->db->insert('bukti_perjalanan_dinas', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_header' => $data['id_header'],
            'jenis_biaya' => $data['jenis_biaya'],
            'biaya' => $data['biaya'],
            'nomor_bukti' => $data['nomor_bukti'],
            'jumlah_bukti' => $data['jumlah_bukti'],
            'kota_tujuan' => $data['kota_tujuan']
        );

        $this->db->update('detail_perjalanan_dinas', $data, "id = " . $id);
    }
    
    public function delete($id_header, $id_pegawai, $kota_tujuan) {
        $sql = "delete "
                . "from bukti_perjalanan_dinas "
                . "where id_header = " . $id_header . " "
                . "and id_pegawai = " . $id_pegawai . " "
                . "and kota_tujuan = '" . $kota_tujuan . "' ";
        return  $this->db->query($sql);
    }

}
