<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perjalanan_dinas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $query = 'select pd.*, a1.nama_kegiatan, a1.jenis_belanja '
                . 'from perjalanan_dinas pd, '
                . '(select a.id, k.nama_kegiatan, ak.jenis_belanja '
                . 'from anggaran a, kegiatan k, akun ak '
                . 'where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 '
                . 'where pd.id_anggaran = a1.id';
        return $this->db->query($query);
    }

    public function select_by_id($id) {
        $query = 'select pd.*, a1.nama_kegiatan, a1.jenis_belanja, '
                . '(select k1.nama_kota from kota_tujuan k1 where k1.id = pd.kota_tujuan_1) as nama_kota_tujuan_1, '
                . '(select k2.nama_kota from kota_tujuan k2 where k2.id = pd.kota_tujuan_2) as nama_kota_tujuan_2, '
                . '(select k3.nama_kota from kota_tujuan k3 where k3.id = pd.kota_tujuan_3) as nama_kota_tujuan_3 '
                . 'from perjalanan_dinas pd, '
                . '(select a.id, k.nama_kegiatan, ak.jenis_belanja '
                . 'from anggaran a, kegiatan k, akun ak '
                . 'where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 '
                . 'where pd.id_anggaran = a1.id '
                . 'and pd.id = '.$id;
        return $this->db->query($query);
    }

    public function select_by_field($param = array()) {
        $query = 'select pd.*, a1.nama_kegiatan, a1.jenis_belanja '
                . 'from perjalanan_dinas pd, '
                . '(select a.id, k.nama_kegiatan, ak.jenis_belanja '
                . 'from anggaran a, kegiatan k, akun ak '
                . 'where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 '
                . 'where pd.id_anggaran = a1.id '
                . 'and pd.status = '.$param['status'];
        return $this->db->query($query);
    }

    public function add($data) {
        $data = array(
            'no_spt' => $data['no_spt'],
            'status' => $data['status_approval'],
            'id_anggaran' => $data['id_anggaran'],
            'jumlah_tujuan' => $data['jumlah_tujuan'],
            'maksud_perjalanan' => $data['maksud_perjalanan'],
            'jadwal_berangkat_1' => $this->format_date_to_sql($data['jadwal_berangkat_1']),
            'jadwal_berangkat_2' => $this->format_date_to_sql($data['jadwal_berangkat_2']),
            'jadwal_berangkat_3' => $this->format_date_to_sql($data['jadwal_berangkat_3']),
            'jadwal_pulang_1' => $this->format_date_to_sql($data['jadwal_pulang_1']),
            'jadwal_pulang_2' => $this->format_date_to_sql($data['jadwal_pulang_2']),
            'jadwal_pulang_3' => $this->format_date_to_sql($data['jadwal_pulang_3']),
            'kota_tujuan_1' => $data['kota_tujuan_1'],
            'kota_tujuan_2' => $data['kota_tujuan_2'],
            'kota_tujuan_3' => $data['kota_tujuan_3']
        );
        $this->db->insert('perjalanan_dinas', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'no_spt' => $data['no_spt'],
            'status' => $data['status_approval'],
            'id_anggaran' => $data['id_anggaran'],
            'jumlah_tujuan' => $data['jumlah_tujuan'],
            'maksud_perjalanan' => $data['maksud_perjalanan'],
            'jadwal_berangkat_1' => $this->format_date_to_sql($data['jadwal_berangkat_1']),
            'jadwal_berangkat_2' => $this->format_date_to_sql($data['jadwal_berangkat_2']),
            'jadwal_berangkat_3' => $this->format_date_to_sql($data['jadwal_berangkat_3']),
            'jadwal_pulang_1' => $this->format_date_to_sql($data['jadwal_pulang_1']),
            'jadwal_pulang_2' => $this->format_date_to_sql($data['jadwal_pulang_2']),            
            'jadwal_pulang_3' => $this->format_date_to_sql($data['jadwal_pulang_3']),
            'kota_tujuan_1' => $data['kota_tujuan_1'],
            'kota_tujuan_2' => $data['kota_tujuan_2'],
            'kota_tujuan_3' => $data['kota_tujuan_3']
        );

        $this->db->update('perjalanan_dinas', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('perjalanan_dinas', array('id' => $id));
    }

    //tambahan

    public function update_status($id, $data) {
        $data = array(
            'status_approval' => $data['status_approval']
        );
        $this->db->update('perjalanan_dinas', $data, "id = " . $id);
    }

    public function update_no_spt($id, $data) {
        $data = array(
            'no_spt' => $data['no_spt']
        );
        $this->db->update('perjalanan_dinas', $data, "id = " . $id);
    }

    
    public function get_jumlah_tujuan($id) {
        $sql = "select jumlah_tujuan from perjalanan_dinas where id=" . $id;
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    
    public function format_date_to_sql($str){        
        return substr($str, 6, 4).'-'.substr($str, 3, 2).'-'.substr($str, 0, 2);
    }
}
