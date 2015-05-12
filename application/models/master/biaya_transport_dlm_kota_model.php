<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_transport_dlm_kota_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('biaya_transport_dlm_kota');
    }

    public function select_by_id($id) {
        return $this->db->get_where('biaya_transport_dlm_kota', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('biaya_transport_dlm_kota', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'nama_kota' => $data['nama_kota'],
            'biaya' => $data['biaya']
        );
        $this->db->insert('biaya_transport_dlm_kota', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'nama_kota' => $data['nama_kota'],
            'biaya' => $data['biaya']
        );
        $this->db->update('biaya_transport_dlm_kota', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('biaya_transport_dlm_kota', array('id' => $id));
    }

}
