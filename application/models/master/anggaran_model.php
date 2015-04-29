<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggaran_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        //return $this->db->get('anggaran');
        
        $this->db->select('*');
        //subquery kegiatan
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_kegiatan')->from('kegiatan');
        $sub->where('anggaran.id_kegiatan = kegiatan.id');
        $this->subquery->end_subquery('nama_kegiatan');
        //subquery kegiatan
        $sub = $this->subquery->start_subquery('select');
        $sub->select('kode_kegiatan')->from('kegiatan');
        $sub->where('anggaran.id_kegiatan = kegiatan.id');
        $this->subquery->end_subquery('kode_kegiatan');
        //subquery akun
        $sub = $this->subquery->start_subquery('select');
        $sub->select('jenis_belanja')->from('akun');
        $sub->where('anggaran.id_akun = akun.id');
        $this->subquery->end_subquery('jenis_belanja');
        //subquery akun
        $sub = $this->subquery->start_subquery('select');
        $sub->select('kode_akun')->from('akun');
        $sub->where('anggaran.id_akun = akun.id');
        $this->subquery->end_subquery('kode_akun');
        //
        $this->db->from('anggaran');

        return $this->db->get();
    }

    public function select_by_id($id) {
        return $this->db->get_where('anggaran', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('anggaran', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'id_kegiatan' => $data['id_kegiatan'],
            'id_akun' => $data['id_akun'],
            'pagu' => $data['pagu'],
            'tahun_anggaran' => $data['tahun_anggaran']
        );
        $this->db->insert('anggaran', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_kegiatan' => $data['id_kegiatan'],
            'id_akun' => $data['id_akun'],
            'pagu' => $data['pagu'],
            'tahun_anggaran' => $data['tahun_anggaran']
        );
        $this->db->update('anggaran', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('anggaran', array('id' => $id));
    }

}
