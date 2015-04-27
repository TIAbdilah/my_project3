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

    public function select_all_by_role($inRole) {
        $query = 'select th.*, a1.nama_kegiatan, a1.jenis_belanja '
                . 'from perjalanan_dinas th,'
                . '(select a.id, k.nama_kegiatan, ak.jenis_belanja from anggaran a, kegiatan k, akun ak where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 , role rl '
                . 'where th.id_anggaran = a1.id and th.status_approval=rl.id_role and rl.nama_role="' . $inRole . '"';
        return $this->db->query($query);
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
        $this->db->select('*');
        
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_kota')->from('kota_tujuan');
        $sub->where('perjalanan_dinas.kota_tujuan_1 = kota_tujuan.id');
        $this->subquery->end_subquery('nama_kota_tujuan_1');
        
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_kota')->from('kota_tujuan');
        $sub->where('perjalanan_dinas.kota_tujuan_2 = kota_tujuan.id');
        $this->subquery->end_subquery('nama_kota_tujuan_2');
        
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_kota')->from('kota_tujuan');
        $sub->where('perjalanan_dinas.kota_tujuan_3 = kota_tujuan.id');
        $this->subquery->end_subquery('nama_kota_tujuan_3');
        
        $this->db->from('perjalanan_dinas');
        $this->db->where(array('id' => $id));
        return $this->db->get();
    }

    public function select_by_field($param = array()) {
        return $this->db->get_where('unit', $param);
    }

    public function add($data) {
        $data = array(
            'no_spt' => $data['no_spt'],
            'status' => $data['status_approval'],
            'id_anggaran' => $data['id_anggaran'],
            'jumlah_tujuan' => $data['jumlah_tujuan'],
            'maksud_perjalanan' => $data['maksud_perjalanan'],
            'jadwal_berangkat_1' => substr($data['jadwal_berangkat_1'], 6, 4).'-'.substr($data['jadwal_berangkat_1'], 3, 2).'-'.substr($data['jadwal_berangkat_1'], 0, 2),
            'jadwal_berangkat_2' => substr($data['jadwal_berangkat_2'], 6, 4).'-'.substr($data['jadwal_berangkat_2'], 3, 2).'-'.substr($data['jadwal_berangkat_2'], 0, 2),
            'jadwal_berangkat_3' => substr($data['jadwal_berangkat_3'], 6, 4).'-'.substr($data['jadwal_berangkat_3'], 3, 2).'-'.substr($data['jadwal_berangkat_3'], 0, 2),
            'jadwal_pulang_1' => substr($data['jadwal_pulang_1'], 6, 4).'-'.substr($data['jadwal_pulang_1'], 3, 2).'-'.substr($data['jadwal_pulang_1'], 0, 2),
            'jadwal_pulang_2' => substr($data['jadwal_pulang_2'], 6, 4).'-'.substr($data['jadwal_pulang_2'], 3, 2).'-'.substr($data['jadwal_pulang_2'], 0, 2),
            'jadwal_pulang_3' => substr($data['jadwal_pulang_3'], 6, 4).'-'.substr($data['jadwal_pulang_3'], 3, 2).'-'.substr($data['jadwal_pulang_3'], 0, 2),
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
            'jadwal_berangkat_1' => substr($data['jadwal_berangkat_1'], 6, 4).'-'.substr($data['jadwal_berangkat_1'], 3, 2).'-'.substr($data['jadwal_berangkat_1'], 0, 2),
            'jadwal_berangkat_2' => substr($data['jadwal_berangkat_2'], 6, 4).'-'.substr($data['jadwal_berangkat_2'], 3, 2).'-'.substr($data['jadwal_berangkat_2'], 0, 2),
            'jadwal_berangkat_3' => substr($data['jadwal_berangkat_3'], 6, 4).'-'.substr($data['jadwal_berangkat_3'], 3, 2).'-'.substr($data['jadwal_berangkat_3'], 0, 2),
            'jadwal_pulang_1' => substr($data['jadwal_pulang_1'], 6, 4).'-'.substr($data['jadwal_pulang_1'], 3, 2).'-'.substr($data['jadwal_pulang_1'], 0, 2),
            'jadwal_pulang_2' => substr($data['jadwal_pulang_2'], 6, 4).'-'.substr($data['jadwal_pulang_2'], 3, 2).'-'.substr($data['jadwal_pulang_2'], 0, 2),
            
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


    public function updateStatus($id, $data) {

        $data = array(
            'status_approval' => $data['status_approval']
        );

        $this->db->update('perjalanan_dinas', $data, "id = " . $id);
    }

    public function updateSPT($id, $data) {

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
