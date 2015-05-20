<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 20 Mei 2015
//Updated Date  : 20 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_panjar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('detail_panjar');
    }

    public function select_by_id($id) {
        return $this->db->get_where('detail_panjar', array('id' => $id));
    }

    public function select_by_field($param = array()) {
        $sql = "select d.id_pegawai "
                . ", (select p.nama from pegawai p where p.id= d.id_pegawai) as nama_pegawai "
                . ", (select dpj.jumlah from detail_panjar dpj where dpj.id_pegawai = d.id_pegawai) as jumlah "
                . "from detail_perjalanan_dinas d "
                . "where 1 = 1 ";
        if (!empty($param['id_panjar'])) {
            $sql = $sql . "and d.id_header = (select pj.id_header from panjar pj where pj.id = " . $param['id_panjar'] . ") ";
        }
        if(!empty($param['id_header'])){
            $sql = $sql . "and d.id_header = ".$param['id_header']." ";
        }
        if(!empty($param['id_pegawai'])){
            $sql = $sql . "and d.id_pegawai = ".$param['id_pegawai']." ";
        }
        $sql = $sql . "group by id_header, id_pegawai";
        return $this->db->query($sql);
    }

    public function add($data) {
        $data = array(
            'id_panjar' => $data['id_panjar'],
            'id_pegawai' => $data['id_pegawai'],
            'jumlah' => $data['jumlah']
        );
        $this->db->insert('detail_panjar', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_panjar' => $data['id_header'],
            'id_pegawai' => $data['id_pegawai'],
            'jumlah' => $data['jumlah']
        );
        $this->db->update('detail_panjar', $data, "id = " . $id);
    }

    public function delete($param = array()) {
        $this->db->delete('detail_panjar', $param);
    }

}
