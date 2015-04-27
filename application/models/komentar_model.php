<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komentar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('komentar');
    }

    public function select_by_id($id) {
        return $this->db->get_where('komentar', array('id' => $id));
    }
    
    public function select_by_id_header($id_header) {
        return $this->db->get_where('komentar', array('id_header' => $id_header));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('komentar', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'id_header' => $data['id_header'],
            'username' => $data['username'],
            'komentar' => $data['komentar']
        );
        $this->db->insert('komentar', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_header' => $data['id_header'],
            'username' => $data['username'],
            'komentar' => $data['komentar']
        );
        $this->db->update('komentar', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('komentar', array('id' => $id));
    }



}
