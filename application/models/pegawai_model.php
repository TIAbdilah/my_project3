<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('subquery');
    }

    public function select_all() {
       
        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_unit')->from('unit');
        $sub->where('pegawai.kode_unit = unit.id');
        $this->subquery->end_subquery('nama_unit');
        $this->db->from('pegawai');
        $this->db->order_by('nama');

        return $this->db->get();
    }

    public function select_by_id($id) {
        return $this->db->get_where('pegawai', array('id' => $id));
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
            'tgl_lahir' => $data['tgl_lahir'],
            'kelas_jabatan' => $data['kelas_jabatan'],
            'status' => $data['status'],
            'kode_unit' => $data['kode_unit'],
            'kriteria_pegawai' => $data['kriteria_pegawai'],
            'status_pendidikan' => $data['status_pendidikan']
        );
        $this->db->insert('pegawai', $data);
    }

    public function edit($id, $data) {
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
            'status_pendidikan' => $data['status_pendidikan']
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

}
