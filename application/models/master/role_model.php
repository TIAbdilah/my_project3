<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Role_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('role');
    }

    public function select_by_id($id) {
        return $this->db->get_where('role', array('id_role' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('role', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'nama_role' => $data['nama_role']
        );
        $this->db->insert('role', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'nama_role' => $data['nama_role']
        );
        $this->db->update('role', $data, "id_role = " . $id);
    }

    public function delete($id) {
        $this->db->delete('role', array('id_role' => $id));
    }

}

?>
