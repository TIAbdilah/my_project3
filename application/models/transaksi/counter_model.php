<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Counter_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('counter');
    }

    public function select_by_id($id) {
        return $this->db->get_where('counter', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('counter', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'pattern' => $data['pattern'],
            'counter' => $data['counter']
        );
        $this->db->insert('counter', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'pattern' => $data['pattern'],
            'counter' => $data['counter']
        );
        $this->db->update('counter', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('counter', array('id' => $id));
    }
    
}
