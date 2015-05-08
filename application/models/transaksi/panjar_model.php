<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panjar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_by_header($id_header) {
        $sql = "select d.id_header, d.id_pegawai"
                . ", (select p.nama from pegawai p where p.id= d.id_pegawai) as nama_pegawai "
                . ", sum(d.biaya) as total_biaya "
                . ", (select pj.jml_panjar from panjar pj where pj.id_header = d.id_header and pj.id_pegawai = d.id_pegawai) as jml_panjar "
                . ", (select pj.penerima from panjar pj where pj.id_header = d.id_header and pj.id_pegawai = d.id_pegawai) as penerima "
                . ", (select pj.deskripsi_panjar from panjar pj where pj.id_header = d.id_header and pj.id_pegawai = d.id_pegawai) as deskripsi_panjar "
                . ", (select (select p.nama from pegawai p where p.id = pj.penerima) as nama_penerima from panjar pj where pj.id_header = d.id_header and pj.id_pegawai = d.id_pegawai) as nama_penerima "
                . "from detail_perjalanan_dinas d "
                . "where d.id_header = ".$id_header." "                
                . "group by id_header, id_pegawai";
        return $this->db->query($sql);
    }

    public function select_all() {
        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama')->from('pegawai');
        $sub->where('pegawai.id = panjar.id_pegawai');
        $this->subquery->end_subquery('nama_pegawai');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama')->from('pegawai');
        $sub->where('pegawai.id = panjar.penerima');
        $this->subquery->end_subquery('nama_penerima');
        $this->db->from('panjar');

        return $this->db->get();
    }

    public function select_by_id($id) {
        return $this->db->get_where('panjar', array('id' => $id));
    }

    public function select_by_field($param = array()) {
        
        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama')->from('pegawai');
        $sub->where('pegawai.id = panjar.id_pegawai');
        $this->subquery->end_subquery('nama_pegawai');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama')->from('pegawai');
        $sub->where('pegawai.id = panjar.penerima');
        $this->subquery->end_subquery('nama_penerima');
        $this->db->from('panjar');
        $this->db->where($param);

        return $this->db->get();
    }

    public function add($data) {
        $data = array(
            'id_header' => $data['id_header'],
            'id_pegawai' => $data['id_pegawai'],
            'jml_panjar' => $data['jml_panjar'],
            'penerima' => $data['penerima'],
            'deskripsi_panjar' => $data['deskripsi_panjar']
        );
        $this->db->insert('panjar', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_header' => $data['id_header'],
            'id_pegawai' => $data['id_pegawai'],
            'jml_panjar' => $data['jml_panjar'],
            'penerima' => $data['penerima'],
            'deskripsi_panjar' => $data['deskripsi_panjar']
        );
        $this->db->update('panjar', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('panjar', array('id' => $id));
    }

}
