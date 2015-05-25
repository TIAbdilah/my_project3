<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Temp_kegiatan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $sql = "select k.* "
                . "from temp_kegiatan k "
                . "order by kode_kegiatan";        
        return $this->db->query($sql);
    }

    public function select_by_id($id) {
        return $this->db->get_where('temp_kegiatan', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('temp_kegiatan', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'kode_unit' => $data['kode_unit'],
            'kode_kegiatan' => $data['kode_kegiatan'],
            'nama_kegiatan' => $data['nama_kegiatan'],
            'koordinator' => $data['koordinator'],
            'penanggung_jawab' => $data['penanggung_jawab']
        );
        $this->db->insert('temp_kegiatan', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'kode_unit' => $data['kode_unit'],
            'kode_kegiatan' => $data['kode_kegiatan'],
            'nama_kegiatan' => $data['nama_kegiatan'],
            'koordinator' => $data['koordinator'],
            'penanggung_jawab' => $data['penanggung_jawab']
        );
        $this->db->update('temp_kegiatan', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('temp_kegiatan', array('id' => $id));
    }
    
    public function truncate() {
        $this->db->truncate('temp_kegiatan');
    }
}
