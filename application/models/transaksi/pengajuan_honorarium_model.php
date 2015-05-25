<?php

//Created By    : Rizal
//Updated By    : Rizal
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengajuan_honorarium_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $query = 'select a1.*,pd.* '
                . 'from pengajuan_honorarium pd, '
                . '(select a.id, k.nama_kegiatan, k.id_unit, ak.jenis_belanja '
                . 'from anggaran a, kegiatan k, akun ak '
                . 'where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 '
                . 'where pd.id_anggaran = a1.id '
                . 'order by pd.tanggal_pembuatan desc';
        return $this->db->query($query);
    }

    public function select_by_id($id) {
        $query = 'select a1.*,pb.*  '
                . 'from pengajuan_honorarium pb, '
                . '(select a.id, k.nama_kegiatan, k.kode_kegiatan, k.id_unit, ak.jenis_belanja '
                . 'from anggaran a, kegiatan k, akun ak '
                . 'where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 '
                . 'where pb.id_anggaran = a1.id '
                . 'and pb.id = ' . $id;
        return $this->db->query($query);
    }

    public function select_by_field($param2 = array()) {
        $query = 'select pd.*, a1.* '
                . 'from pengajuan_honorarium pd, '
                . '(select a.id, k.nama_kegiatan, k.id_unit, ak.jenis_belanja '
                . 'from anggaran a, kegiatan k, akun ak '
                . 'where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 '
                . 'where pd.id_anggaran = a1.id '
                . 'and pd.status_approval ='.$param2['status_approval'];
        return $this->db->query($query);
    }

    public function add($data) {
        $data = array(
            'id_anggaran' => $data['id_anggaran'],
            'kegiatan' => $data['kegiatan'],
            'acara' => $data['acara'],
            'periode_pembayaran' => $this->format_date_to_sql($data['periode_pembayaran'])
        );
        $this->db->insert('pengajuan_honorarium', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_anggaran' => $data['id_anggaran'],
            'kegiatan' => $data['kegiatan'],
            'acara' => $data['acara'],
            'periode_pembayaran' => $this->format_date_to_sql($data['periode_pembayaran'])
        );
        $this->db->update('pengajuan_honorarium', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('pengajuan_honorarium', array('id' => $id));
    }

    public function update_status($id, $data) {
        $data = array(
            'status_approval' => $data['status_approval']
        );
        $this->db->update('pengajuan_honorarium', $data, "id = " . $id);
    }

    public function update_status_penolakan($id, $data) {
        $data = array(
            'status_penolakan' => $data['status_penolakan']
        );
        $this->db->update('pengajuan_honorarium', $data, "id = " . $id);
    }

    public function update_no_spt($id, $data) {
        $data = array(
            'nomor_pengajuan' => $data['nomor_pengajuan'],
            'tanggal_approval' => $data['tanggal_approval']
        );
        $this->db->update('pengajuan_honorarium', $data, "id = " . $id);
    }

    public function format_date_to_sql($str) {
        return substr($str, 6, 4) . '-' . substr($str, 3, 2) . '-' . substr($str, 0, 2);
    }

}
