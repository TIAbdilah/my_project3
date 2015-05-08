<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_representatif_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('biaya_representatif');
    }

    public function select_by_id($id) {
        return $this->db->get_where('biaya_representatif', array('id' => $id));
    }

    public function select_by_field($field, $keyword) {
        return $this->db->get_where('biaya_representatif', array($field => $keyword));
    }

    public function add($data) {
        $data = array(
            'nama_kota' => $data['nama_kota'],
            'tingkat' => $data['tingkat'],
            'biaya' => $data['biaya']
        );
        $this->db->insert('biaya_representatif', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'nama_kota' => $data['nama_kota'],
            'tingkat' => $data['tingkat'],
            'biaya' => $data['biaya']
        );
        $this->db->update('biaya_representatif', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('biaya_representatif', array('id' => $id));
    }
    
    public function getBiayaRepresentatif($nama_kota = string, $id_pegawai = string) {
        $sql="select br.* "
                . "from biaya_representatif br "
                . "where br.nama_kota = ("
                . "select kt.nama_provinsi "
                . "from kota_tujuan kt where kt.nama_kota = '".$nama_kota."') "
                . "and br.tingkat = ("
                . "select peg.golongan "
                . "from pegawai peg where peg.id='".$id_pegawai."') ";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
