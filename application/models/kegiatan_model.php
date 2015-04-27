<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kegiatan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        //
        //return $this->db->get('kegiatan');
        $this->db->select('*');
        
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_unit')->from('unit');
        $sub->where('kegiatan.kode_unit = unit.id');
        $this->subquery->end_subquery('nama_unit');
        
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama')->from('pegawai');
        $sub->where('kegiatan.koordinator = pegawai.id');
        $this->subquery->end_subquery('nama_koordinator');
        
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama')->from('pegawai');
        $sub->where('kegiatan.penanggung_jawab = pegawai.id');
        $this->subquery->end_subquery('nama_penanggung_jawab');
        
        $this->db->from('kegiatan');
        
        return $this->db->get();
    }

    public function select_by_id($id) {
        return $this->db->get_where('kegiatan', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('kegiatan', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'kode_unit' => $data['kode_unit'],
            'kode_kegiatan' => $data['kode_kegiatan'],
            'nama_kegiatan' => $data['nama_kegiatan'],
            'koordinator' => $data['koordinator'],
            'penanggung_jawab' => $data['penanggung_jawab']
        );
        $this->db->insert('kegiatan', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'kode_unit' => $data['kode_unit'],
            'kode_kegiatan' => $data['kode_kegiatan'],
            'nama_kegiatan' => $data['nama_kegiatan'],
            'koordinator' => $data['koordinator'],
            'penanggung_jawab' => $data['penanggung_jawab']
        );
        $this->db->update('kegiatan', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('kegiatan', array('id' => $id));
    }

}
