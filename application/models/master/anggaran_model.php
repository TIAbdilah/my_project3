<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggaran_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $sql = "select a.* "
                . ", (select k.nama_kegiatan from kegiatan k where k.id = a.id_kegiatan) as nama_kegiatan "
                . ", (select k.kode_kegiatan from kegiatan k where k.id = a.id_kegiatan) as kode_kegiatan "
                . ", (select k.id_unit from kegiatan k where k.id = a.id_kegiatan) as id_unit "
                . ", (select ak.kode_akun from akun ak where ak.id = a.id_akun) as kode_akun "
                . ", (select ak.jenis_belanja from akun ak where ak.id = a.id_akun) as jenis_belanja "
                . ", (select sum(v1.biaya) from view_realisasi_anggaran v1 where v1.id_anggaran = a.id and v1.nomor <> '-' group by v1.id_anggaran) as biaya "
                . ", (a.pagu - (select sum(v1.biaya) from view_realisasi_anggaran v1 where v1.id_anggaran = a.id and v1.nomor <> '-' group by v1.id_anggaran)) as sisa "
                . "from anggaran a "
                . "group by id "
                . "order by kode_kegiatan, kode_akun";
        return $this->db->query($sql);
    }

    public function select_by_id($id) {
        return $this->db->get_where('anggaran', array('id' => $id));
    }

    public function select_by_field($param = array()) {
        $sql = "select a.* "
                . ", (select k.nama_kegiatan from kegiatan k where k.id = a.id_kegiatan) as nama_kegiatan "
                . ", (select k.kode_kegiatan from kegiatan k where k.id = a.id_kegiatan) as kode_kegiatan "
                . ", (select k.id_unit from kegiatan k where k.id = a.id_kegiatan) as id_unit "
                . ", (select ak.kode_akun from akun ak where ak.id = a.id_akun) as kode_akun "
                . ", (select ak.jenis_belanja from akun ak where ak.id = a.id_akun) as jenis_belanja "
                . ", (select sum(v1.biaya) from view_realisasi_anggaran v1 where v1.id_anggaran = a.id and v1.nomor <> '-' group by v1.id_anggaran) as biaya "
                . ", (a.pagu - (select sum(v1.biaya) from view_realisasi_anggaran v1 where v1.id_anggaran = a.id and v1.nomor <> '-' group by v1.id_anggaran)) as sisa "
                . "from anggaran a "
                . "where 1 = 1 ";
        if (!empty($param['id_unit'])) {
            $sql = $sql . "and (select k.id_unit from kegiatan k where k.id = a.id_kegiatan) = " . $param['id_unit'] . " ";
        }
        if (!empty($param['kata_kunci'])) {
            $sql = $sql."and a.id_akun in (select ak.id from akun ak where ak.jenis_belanja like '%".$param['kata_kunci']."%')  ";
        }
        $sql = $sql . "group by id "
                . "order by kode_kegiatan, kode_akun";
        return $this->db->query($sql);
    }
    
    public function select_by_field_1($param = array()) {
        return $this->db->get_where('anggaran', $param);
    }

    public function add($data) {
        $data = array(
            'id_kegiatan' => $data['id_kegiatan'],
            'id_akun' => $data['id_akun'],
            'pagu' => $data['pagu'],
            'tahun_anggaran' => $data['tahun_anggaran']
        );
        $this->db->insert('anggaran', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_kegiatan' => $data['id_kegiatan'],
            'id_akun' => $data['id_akun'],
            'pagu' => $data['pagu'],
            'tahun_anggaran' => $data['tahun_anggaran']
        );
        $this->db->update('anggaran', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('anggaran', array('id' => $id));
    }

//    public function getDetailAnggaran($id_anggaran = string) {
//        $this->db->select('id_kegiatan,id_akun');
//        $this->db->from('anggaran');
//        $this->db->where('id', $id_anggaran);
//        $query = $this->db->get();
//        return $query->result();
//    }
//    
    public function getDetailAnggaran($id_anggaran = string) {
        $this->db->select('*');
        //subquery kegiatan
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_kegiatan')->from('kegiatan');
        $sub->where('anggaran.id_kegiatan = kegiatan.id');
        $this->subquery->end_subquery('nama_kegiatan');
        //subquery kegiatan
        $sub = $this->subquery->start_subquery('select');
        $sub->select('kode_kegiatan')->from('kegiatan');
        $sub->where('anggaran.id_kegiatan = kegiatan.id');
        $this->subquery->end_subquery('kode_kegiatan');
        //subquery akun
        $sub = $this->subquery->start_subquery('select');
        $sub->select('jenis_belanja')->from('akun');
        $sub->where('anggaran.id_akun = akun.id');
        $this->subquery->end_subquery('jenis_belanja');
        //subquery akun
        $sub = $this->subquery->start_subquery('select');
        $sub->select('kode_akun')->from('akun');
        $sub->where('anggaran.id_akun = akun.id');
        $this->subquery->end_subquery('kode_akun');
        //
        $this->db->from('anggaran');
        $this->db->where('id', $id_anggaran);

        $query = $this->db->get();
        return $query->result();
    }

    public function getDetailAnggaran2($id_anggaran = string) {
        $this->db->select('*');
        //subquery kegiatan
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_kegiatan')->from('kegiatan');
        $sub->where('anggaran.id_kegiatan = kegiatan.id');
        $this->subquery->end_subquery('nama_kegiatan');
        //subquery kegiatan
        $sub = $this->subquery->start_subquery('select');
        $sub->select('kode_kegiatan')->from('kegiatan');
        $sub->where('anggaran.id_kegiatan = kegiatan.id');
        $this->subquery->end_subquery('kode_kegiatan');
        //subquery akun
        $sub = $this->subquery->start_subquery('select');
        $sub->select('jenis_belanja')->from('akun');
        $sub->where('anggaran.id_akun = akun.id');
        $this->subquery->end_subquery('jenis_belanja');
        //subquery akun
        $sub = $this->subquery->start_subquery('select');
        $sub->select('kode_akun')->from('akun');
        $sub->where('anggaran.id_akun = akun.id');
        $this->subquery->end_subquery('kode_akun');
        //
        $this->db->from('anggaran');
        $this->db->where('id', $id_anggaran);

        return $this->db->get();
    }

}
