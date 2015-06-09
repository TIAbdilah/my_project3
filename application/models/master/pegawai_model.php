<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
       
        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_unit')->from('unit');
        $sub->where('pegawai.kode_unit = unit.id');
        $this->subquery->end_subquery('nama_unit');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('kode_unit')->from('unit');
        $sub->where('pegawai.kode_unit = unit.id');
        $this->subquery->end_subquery('kode_unit');
        $this->db->from('pegawai');
        $this->db->where('narasumber', 0);
        $this->db->order_by('nama');

        return $this->db->get();
    }

    public function select_all_tidak_dinas() {
       
        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_unit')->from('unit');
        $sub->where('pegawai.kode_unit = unit.id');
        $this->subquery->end_subquery('nama_unit');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('kode_unit')->from('unit');
        $sub->where('pegawai.kode_unit = unit.id');
        $this->subquery->end_subquery('kode_unit');
        $this->db->from('pegawai');
        $this->db->where('narasumber', 0);
        $this->db->where('flag', 0);
        $this->db->order_by('nama');

        return $this->db->get();
    }

    public function select_by_id($id) {
        return $this->db->get_where('pegawai', array('id' => $id, 'narasumber' => 0));
    }

    public function select_by_field($field, $keyword) {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where(array($field => $keyword));
        $this->db->order_by('nama');                
        return $this->db->get();
    }

    public function add($data) {
        $data = array(
            'nip' => $data['nip'],
            'nama' => $data['nama'],
            'golongan' => $data['golongan'],
            'jabatan' => $data['jabatan'],
            'tgl_lahir' => $data['tgl_lahir'],
            'kelas_jabatan' => $data['kelas_jabatan'],
            'status' => $data['status'],
            'kode_unit' => $data['kode_unit'],
            'kriteria_pegawai' => $data['kriteria_pegawai'],
            'status_pendidikan' => $data['status_pendidikan'],
            'narasumber' => 0,
            'tingkat' => $data['tingkat']
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
            'tingkat' => $data['tingkat']
        );
        $this->db->update('pegawai', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('pegawai', array('id' => $id));
    }

    public function getDetailPegawai($id_pegawai = string) {
        $this->db->select('golongan,status');
        $this->db->from('pegawai');
        $this->db->where('id', $id_pegawai);
        $query = $this->db->get();
        return $query->result();
    }
        
     public function format_date_to_sql($str){        
        return substr($str, 6, 4).'-'.substr($str, 3, 2).'-'.substr($str, 0, 2);
    }

    public function update_flag($id, $data) {
        $data = array(
            'flag' => $data['flag']
        );
        $this->db->update('pegawai', $data, "id = " . $id);
    }

}
