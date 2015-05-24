<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 20 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengajuan_jasa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $sql = "select pj.* "
                . ", (select pd.no_spt from perjalanan_dinas pd where pd.id = pj.id_header) as no_spt "
                . ", (select p.nama from pegawai p where p.id = pj.penerima) as nama_penerima "
                . ", (select sum(dpj.jumlah) from detail_panjar dpj where dpj.id_panjar = pj.id group by dpj.id_panjar) as jumlah "
                . ", (select k.id_unit from kegiatan k where k.id = (select a.id_kegiatan from anggaran a where a.id =(select pd1.id_anggaran from perjalanan_dinas pd1 where pd1.id = pj.id_header))) as id_unit "
                . "from panjar pj";
        return $this->db->query($sql);
    }

    public function select_by_field($param = array()) {
        $sql = "select pj.* "
                . ", (select pd.no_spt from perjalanan_dinas pd where pd.id = pj.id_header) as no_spt "
                . ", (select p.nama from pegawai p where p.id = pj.penerima) as nama_penerima "
                . ", (select p.nip from pegawai p where p.id = pj.penerima) as nip_penerima "
                . ", (select sum(dpj.jumlah) from detail_panjar dpj where dpj.id_panjar = pj.id group by dpj.id_panjar) as jumlah "
                . "from panjar pj "
                . "where 1 = 1 ";
        if (!empty($param['id_header'])) {
            $sql = $sql . "and pj.id_header = " . $param['id_header'];
        }
        if (!empty($param['id'])) {
            $sql = $sql . "and pj.id = " . $param['id'];
        }
        return $this->db->query($sql);
    }

    public function add($data) {
        $data = array(
            'no_pengajuan_jasa' => $data['no_pengajuan_jasa'],
            'id_anggaran' => $data['id_anggaran'],
            'kegiatan' => $data['kegiatan'],
            'status' => $data['status'],
            'status_penolakan' => $data['status_penolakan']
        );
        $this->db->insert('panjar', $data);
    }

    public function edit($param = array(),$data) {
        $data = array(
            'no_pengajuan_jasa' => $data['no_pengajuan_jasa'],
            'id_anggaran' => $data['id_anggaran'],
            'kegiatan' => $data['kegiatan'],
            'status' => $data['status'],
            'status_penolakan' => $data['status_penolakan']
        );
        $this->db->update('panjar', $data, $param);
    }

    public function delete($param = array()) {
        $this->db->delete('panjar', $param);
    }

}
