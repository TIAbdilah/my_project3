<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Narasumber_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
       
        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_unit')->from('unit');
        $sub->where('pegawai.kode_unit = unit.id');
        $this->subquery->end_subquery('nama_unit');
        $this->db->from('pegawai');
        $this->db->where('narasumber', 1);
        $this->db->order_by('nama');

        return $this->db->get();
    }

    public function select_by_id($id) {
        return $this->db->get_where('pegawai', array('id' => $id, 'narasumber' => 1));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('pegawai', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'nip' => $data['nip'],
            'nama' => $data['nama'],
            'golongan' => $data['golongan'],
            'jabatan' => $data['jabatan'],
            'tgl_lahir' => $this->format_date_to_sql($data['tgl_lahir']),
            'kelas_jabatan' => $data['kelas_jabatan'],
            'status' => $data['status'],
            'kode_unit' => $data['kode_unit'],
            'kriteria_pegawai' => $data['kriteria_pegawai'],
            'status_pendidikan' => $data['status_pendidikan'],
            'narasumber' => 1,
            'tingkat' => $data['tingkat'],
            'institusi' => $data['institusi'],
            'kepakaran' => $data['kepakaran']
        );
        $this->db->insert('pegawai', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'nip' => $data['nip'],
            'nama' => $data['nama'],
            'golongan' => $data['golongan'],
            'jabatan' => $data['jabatan'],
            'tgl_lahir' => $this->format_date_to_sql($data['tgl_lahir']),
            'kelas_jabatan' => $data['kelas_jabatan'],
            'status' => $data['status'],
            'kode_unit' => $data['kode_unit'],
            'kriteria_pegawai' => $data['kriteria_pegawai'],
            'status_pendidikan' => $data['status_pendidikan'],
            'tingkat' => $data['tingkat'],
            'institusi' => $data['institusi'],
            'kepakaran' => $data['kepakaran']
        );
        $this->db->update('pegawai', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('pegawai', array('id' => $id));
    }
    
     public function format_date_to_sql($str){        
        return substr($str, 6, 4).'-'.substr($str, 3, 2).'-'.substr($str, 0, 2);
    }

}
