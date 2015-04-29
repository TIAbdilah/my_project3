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
        return $this->db->get('narasumber');
    }

    public function select_by_id($id) {
        return $this->db->get_where('narasumber', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('narasumber', array($field => $keyword));
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
            'kriteria_narasumber' => $data['kriteria_narasumber'],
            'status_pendidikan' => $data['status_pendidikan']
        );
        $this->db->insert('narasumber', $data);
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
            'kriteria_narasumber' => $data['kriteria_narasumber'],
            'status_pendidikan' => $data['status_pendidikan']
        );
        $this->db->update('narasumber', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('narasumber', array('id' => $id));
    }

}
