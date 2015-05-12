<?php

//Created By    : Rizal
//Updated By    : Rizal
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksiperjalanandinasheader_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all_by_role($inRole) {
        
        $query = 'select th.*, a1.nama_kegiatan, a1.jenis_belanja '
                . 'from transaksi_perjalanandinas_header th,'
                . '(select a.id, k.nama_kegiatan, ak.jenis_belanja from anggaran a, kegiatan k, akun ak where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 , role rl '
                . 'where th.id_anggaran = a1.id and th.status_approval=rl.id_role and rl.nama_role="'.$inRole.'"' ;
        return $this->db->query($query);
    }

    public function select_all() {

        $query = 'select th.*, a1.nama_kegiatan, a1.jenis_belanja '
                . 'from transaksi_perjalanandinas_header th, '
                . '(select a.id, k.nama_kegiatan, ak.jenis_belanja from anggaran a, kegiatan k, akun ak where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 '
                . 'where th.id_anggaran = a1.id';
        return $this->db->query($query);
//        return $this->db->get('transaksi_perjalanandinas_header');
    }

    public function updateStatus($id, $data) {

        $data = array(
            'status_approval' => $data['status_approval']
        );

        $this->db->update('transaksi_perjalanandinas_header', $data, "id = " . $id);
    }
    
    public function updateSPT($id, $data) {

        $data = array(
            'no_spt' => $data['no_spt']
        );

        $this->db->update('transaksi_perjalanandinas_header', $data, "id = " . $id);
    }

    public function select_by_id($id) {
        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_kota')->from('kota_tujuan');
        $sub->where('transaksi_perjalanandinas_header.kota_tujuan_1 = kota_tujuan.id');
        $this->subquery->end_subquery('nama_kota_tujuan_1');
        $this->db->from('transaksi_perjalanandinas_header');
        $this->db->where(array('id' => $id));
        return $this->db->get();
    }

    public function select_by_field($field) {
        $sql = "select jumlah_tujuan from transaksi_perjalanandinas_header where id=" . $id;
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_jumlah_tujuan($id) {

        $sql = "select jumlah_tujuan from transaksi_perjalanandinas_header where id=" . $id;
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add($data) {
        $data = array(
            'no_spt' => $data['no_spt'],
            'status_approval' => $data['status_approval'],
            'id_anggaran' => $data['id_anggaran'],
            'jumlah_tujuan' => $data['jumlah_tujuan'],
            'maksud_perjalanan_1' => $data['maksud_perjalanan_1'],
            'maksud_perjalanan_2' => $data['maksud_perjalanan_2'],
            'maksud_perjalanan_3' => $data['maksud_perjalanan_3'],
            'jadwal_berangkat_1' => $data['jadwal_berangkat_1'],
            'jadwal_berangkat_2' => $data['jadwal_berangkat_2'],
            'jadwal_berangkat_3' => $data['jadwal_berangkat_3'],
            'jadwal_pulang_1' => $data['jadwal_pulang_1'],
            'jadwal_pulang_2' => $data['jadwal_pulang_2'],
            'jadwal_pulang_3' => $data['jadwal_pulang_3'],
            'kota_tujuan_1' => $data['kota_tujuan_1'],
            'kota_tujuan_2' => $data['kota_tujuan_2'],
            'kota_tujuan_3' => $data['kota_tujuan_3'],
            'transport_utama_1' => $data['transport_utama_1'],
            'transport_utama_2' => $data['transport_utama_2'],
            'transport_utama_3' => $data['transport_utama_3']
        );
        $this->db->insert('transaksi_perjalanandinas_header', $data);
    }

    public function edit($id, $data) {
        $idHeader = $data['idHeader'];
        $data = array(
            'no_spt' => $data['no_spt'],
            'status_approval' => $data['status_approval'],
            'id_anggaran' => $data['id_anggaran'],
            'jumlah_tujuan' => $data['jumlah_tujuan'],
            'maksud_perjalanan_1' => $data['maksud_perjalanan_1'],
            'maksud_perjalanan_2' => $data['maksud_perjalanan_2'],
            'maksud_perjalanan_3' => $data['maksud_perjalanan_3'],
            'jadwal_berangkat_1' => $data['jadwal_berangkat_1'],
            'jadwal_berangkat_2' => $data['jadwal_berangkat_2'],
            'jadwal_berangkat_3' => $data['jadwal_berangkat_3'],
            'jadwal_pulang_1' => $data['jadwal_pulang_1'],
            'jadwal_pulang_2' => $data['jadwal_pulang_2'],
            'jadwal_pulang_3' => $data['jadwal_pulang_3'],
            'kota_tujuan_1' => $data['kota_tujuan_1'],
            'kota_tujuan_2' => $data['kota_tujuan_2'],
            'kota_tujuan_3' => $data['kota_tujuan_3'],
            'transport_utama_1' => $data['transport_utama_1'],
            'transport_utama_2' => $data['transport_utama_2'],
            'transport_utama_3' => $data['transport_utama_3']
        );

        $this->db->update('transaksi_perjalanandinas_header', $data, "id = " . $idHeader);
    }

    public function delete($id) {
        $this->db->delete('transaksi_perjalanandinas_header', array('id' => $id));
    }

}
