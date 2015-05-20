<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Unit_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama')->from('pegawai');
        $sub->where('pegawai.id = unit.kepala');
        $this->subquery->end_subquery('nama_pegawai');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nip')->from('pegawai');
        $sub->where('pegawai.id = unit.kepala');
        $this->subquery->end_subquery('nip_pegawai');
        $this->db->from('unit');

        return $this->db->get();
    }

    public function select_by_id($id) {
        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama')->from('pegawai');
        $sub->where('pegawai.id = unit.kepala');
        $this->subquery->end_subquery('nama_pegawai');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nip')->from('pegawai');
        $sub->where('pegawai.id = unit.kepala');
        $this->subquery->end_subquery('nip_pegawai');
        return $this->db->get_where('unit', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('unit', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'kode_unit' => $data['kode_unit'],
            'nama_unit' => $data['nama_unit'],
            'kepala' => $data['kepala']
        );
        $this->db->insert('unit', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'kode_unit' => $data['kode_unit'],
            'nama_unit' => $data['nama_unit'],
            'kepala' => $data['kepala']
        );
        $this->db->update('unit', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('unit', array('id' => $id));
    }

}
