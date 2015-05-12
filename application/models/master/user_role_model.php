<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_role_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('user_role');
    }

    public function select_by_id($id) {
        return $this->db->get_where('user_role', array('id_user_role' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('user_role', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'id_user' => $data['id_user'],
            'id_role' => $data['id_role']
        );
        $this->db->insert('user_role', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_user' => $data['id_user'],
            'id_role' => $data['id_role']
        );
        $this->db->update('user_role', $data, "id_user_role = " . $id);
    }

    public function delete($id) {
        $this->db->delete('user_role', array('id_user_role' => $id));
    }

}

?>
