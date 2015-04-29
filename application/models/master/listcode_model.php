<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Listcode_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->order_by('list_name asc, list_item asc')->get('listcode');
    }

    public function select_by_id($id) {
        return $this->db->get_where('listcode', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('listcode', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'list_name' => $data['list_name'],
            'list_item' => $data['list_item']
        );
        $this->db->insert('listcode', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'list_name' => $data['list_name'],
            'list_item' => $data['list_item']
        );
        $this->db->update('listcode', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('listcode', array('id' => $id));
    }
    

}
