<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengajuan_barang_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $query = 'select pd.*, a1.nama_kegiatan, a1.jenis_belanja '
                . 'from pengajuan_barang pd, '
                . '(select a.id, k.nama_kegiatan, ak.jenis_belanja '
                . 'from anggaran a, kegiatan k, akun ak '
                . 'where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 '
                . 'where pd.id_anggaran = a1.id';
        return $this->db->query($query);
    }

    public function select_by_id($id) {
         $query = 'select pd.*, a1.nama_kegiatan, a1.jenis_belanja '
                . 'from pengajuan_barang pd, '
                . '(select a.id, k.nama_kegiatan, ak.jenis_belanja '
                . 'from anggaran a, kegiatan k, akun ak '
                . 'where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 '
                . 'where pd.id_anggaran = a1.id '
                . 'and pd.id = '.$id;
        return $this->db->query($query);
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('biaya_sewa', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'id_anggaran' => $data['id_anggaran'],
            'maksud_kegiatan' => $data['maksud_kegiatan'],
            'nomor_pengajuan' => $data['nomor_pengajuan'],
            'status_approval' => $data['status_approval'],
            'tanggal_pengajuan' => $this->format_date_to_sql($data['tanggal_pengajuan'])
        );
        $this->db->insert('pengajuan_barang', $data);
    }

    public function edit($id, $data) {
        $data = array(
             'id_anggaran' => $data['id_anggaran'],
            'maksud_kegiatan' => $data['maksud_kegiatan'],
            'nomor_pengajuan' => $data['nomor_pengajuan'],
            'status_approval' => $data['status_approval'],
            'tanggal_pengajuan' => $this->format_date_to_sql($data['tanggal_pengajuan'])
        );
        $this->db->update('biaya_sewa', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('pengajuan_barang', array('id' => $id));
    }
    
    public function update_status($id, $data) {
        $data = array(
            'status_approval' => $data['status_approval']
        );
        $this->db->update('pengajuan_barang', $data, "id = " . $id);
    }
    
    public function update_status_penolakan($id, $data) {
        $data = array(
            'status_penolakan' => $data['status_penolakan']
        );
        $this->db->update('pengajuan_barang', $data, "id = " . $id);
    }

    public function update_no_spt($id, $data) {
        $data = array(
            'nomor_pengajuan' => $data['nomor_pengajuan'],
            'tanggal_approval' => $data['tanggal_approval']
        );
        $this->db->update('pengajuan_barang', $data, "id = " . $id);
    }
    
    public function format_date_to_sql($str){        
        return substr($str, 6, 4).'-'.substr($str, 3, 2).'-'.substr($str, 0, 2);
    }

}
