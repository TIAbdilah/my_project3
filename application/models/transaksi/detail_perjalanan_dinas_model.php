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
        $sql = "select "
                . "(select p1.nama from pegawai p1 where p1.id = d.id_pegawai) as nama_pegawai "
                . ", (select p2.golongan from pegawai p2 where p2.id = d.id_pegawai) as golongan " 
                . ", (select p3.jabatan from pegawai p3 where p3.id = d.id_pegawai) as jabatan "
                . ", d.kota_tujuan "
                . ", (select p.kode_unit from pegawai p where p.id = d.id_pegawai) as id_unit "
                . ", d.id_header "
                . ", d.tgl_berangkat "
                . ", d.tgl_pulang "
                . ", d.id_pegawai as id_pegawai "
                . ", (select d1.biaya from detail_perjalanan_dinas d1 where jenis_biaya = 'harian' and d1.id_pegawai = d.id_pegawai and d.id_header = d1.id_header) as harian "
                . ", (select d2.biaya from detail_perjalanan_dinas d2 where jenis_biaya = 'penginapan' and d2.id_pegawai = d.id_pegawai and d.id_header = d2.id_header) as penginapan "
                . ", (select d3.biaya from detail_perjalanan_dinas d3 where jenis_biaya = 'transport_utama' and d3.id_pegawai = d.id_pegawai and d.id_header = d3.id_header) as transport_utama "
                . ", (select d4.biaya from detail_perjalanan_dinas d4 where jenis_biaya = 'transport_pendukung' and d4.id_pegawai = d.id_pegawai and d.id_header = d4.id_header) as transport_pendukung "
                . ", (select d5.biaya from detail_perjalanan_dinas d5 where jenis_biaya = 'riil' and d5.id_pegawai = d.id_pegawai and d.id_header = d5.id_header) as riil "
                . ", (select d6.biaya from detail_perjalanan_dinas d6 where jenis_biaya = 'representatif' and d6.id_pegawai = d.id_pegawai and d.id_header = d6.id_header) as representatif "
                . "from detail_perjalanan_dinas d "
                . "where d.id_header = ".$param['id_header']." "
                . "group by id_header, nama_pegawai, kota_tujuan";
        return $this->db->query($sql);
    }
    
    public function select_data_detail($id_header, $id_pegawai){
        $sql = "SELECT * "
                . "FROM detail_perjalanan_dinas "
                . "where id_header = ".$id_header." "
                . "and id_pegawai = ".$id_pegawai." "
                . "order by kota_tujuan";
        return $this->db->query($sql);
    }

    public function add($data) {
        $data = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_header' => $data['id_header'],
            'jenis_biaya' => $data['jenis_biaya'],
            'tgl_berangkat' => $data['tgl_berangkat'],
            'tgl_pulang' => $data['tgl_pulang'],
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
            'tgl_berangkat' => $data['tgl_berangkat'],
            'tgl_pulang' => $data['tgl_pulang'],
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

    public function select_unit_from_detail($id_header) {
        $sql = "select d.id_pegawai, "
                . "(select p.kode_unit from pegawai p where p.id = d.id_pegawai) as kode_unit, "
                . "(select u.nama_unit from unit u where u.id =  (select p.kode_unit from pegawai p where p.id = d.id_pegawai)) as nama_unit "
                . "FROM detail_perjalanan_dinas d "
                . "where d.id_header = " . $id_header . " "
                . "group by d.id_pegawai, d.kota_tujuan";
        return $this->db->query($sql);
    }

}
