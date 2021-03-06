<?php

//Created By    : Rizal
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    var $table = 'pengguna';
    var $jenis_pengguna_level = 'jenis_pengguna'; //Tabel jenis_pengguna

    public function __construct() {
        parent::__construct();
    }

    public function checkLogin($username, $password) {
        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_role')->from('role');
        $sub->where('pengguna.id_jenis_pengguna = role.id_role');
        $this->subquery->end_subquery('nama_role');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }
    
    public function checkUser($username, $password){
        return $this->db->get_where('pengguna', array('username' => $username, 'password' => md5($password), 'status_aktivasi' => 0));
    }

    public function checkActivatedUser($username, $password){
        return $this->db->get_where('pengguna', array('username' => $username, 'password' => md5($password), 'status_aktivasi' => 1));
    }

    public function select_all() {
        
        $this->db->select('*');
       
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama')->from('pegawai');
        $sub->where('pengguna.id_pegawai = pegawai.id');
        $this->subquery->end_subquery('nama');
       
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nip')->from('pegawai');
        $sub->where('pengguna.id_pegawai = pegawai.id');
        $this->subquery->end_subquery('nip');
       
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_role')->from('role');       
        $sub->where('pengguna.id_jenis_pengguna = role.id_role');
        $this->subquery->end_subquery('nama_role');
        
        $this->db->from('pengguna');
        $this->db->order_by('username');
        
        return $this->db->get();
    }

    public function select_by_id($id) {
        return $this->db->get_where('pengguna', array('id_pengguna' => $id));
    }

    public function select_by_field($field, $keyword) {
        $this->db->select('*');
        
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama')->from('pegawai');
        $sub->where('pengguna.id_pegawai = pegawai.id');
        $this->subquery->end_subquery('nama');
        
        $sub = $this->subquery->start_subquery('select');
        $sub->select('kode_unit')->from('pegawai');
        $sub->where('pengguna.id_pegawai = pegawai.id');
        $this->subquery->end_subquery('kode_unit');
        
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nip')->from('pegawai');
        $sub->where('pengguna.id_pegawai = pegawai.id');
        $this->subquery->end_subquery('nip');
        
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_role')->from('role');
        $sub->where('pengguna.id_jenis_pengguna = role.id_role');
        $this->subquery->end_subquery('nama_role');
        
        $this->db->from('pengguna');
        $this->db->where(array($field => $keyword));
        return $this->db->get();
    }

    public function add($data) {
        $data = array(
            'id_jenis_pengguna' => $data['id_jenis_pengguna'],
            'id_pegawai' => $data['id_pegawai'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => md5($data['password']),
            'telp' => $data['telp']
        );
        $this->db->insert('pengguna', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_jenis_pengguna' => $data['id_jenis_pengguna'],
            'id_pegawai' => $data['id_pegawai'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => md5($data['password']),
            'telp' => $data['telp']
        );
        $this->db->update('pengguna', $data, "id_pengguna = " . $id);
    }

    public function activate($id, $data) {
        $data = array(
            'status_aktivasi' => $data['status_aktivasi']
        );
        $this->db->update('pengguna', $data, "id_pengguna = " . $id);
    }

    public function deactivate($id, $data) {
        $data = array(
            'status_aktivasi' => $data['status_aktivasi']
        );
        $this->db->update('pengguna', $data, "id_pengguna = " . $id);
    }

    public function delete($id) {
        $this->db->delete('pengguna', array('id_pengguna' => $id));
    }

}

?>
