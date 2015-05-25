<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Temp_anggaran_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        //return $this->db->get('temp_anggaran');

        $sql = "select a.* "
                . ", (select k.nama_kegiatan from temp_kegiatan k where k.kode_kegiatan = a.kode_kegiatan) as nama_kegiatan "
                . ", (select k.kode_unit from temp_kegiatan k where k.kode_kegiatan = a.kode_kegiatan) as id_unit "
                . ", (select ak.jenis_belanja from temp_akun ak where ak.kode_akun = a.kode_akun) as jenis_belanja "
                . "from temp_anggaran a "
                . "order by kode_kegiatan, kode_akun";
        return $this->db->query($sql);
    }

    public function select_by_id($id) {
        return $this->db->get_where('temp_anggaran', array('id' => $id));
    }

    public function select_by_field($param = array()) {
//        return $this->db->get_where('temp_anggaran', array($field => $keyword));
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
        if ($param['id_unit']) {
            $sql = $sql . "and (select k.id_unit from kegiatan k where k.id = a.id_kegiatan) = " . $param['id_unit'] . " ";
        }
        $sql = $sql . "group by id "
                . "order by kode_kegiatan, kode_akun";
        return $this->db->query($sql);
    }

    public function add($data) {
        $data = array(
            'kode_kegiatan' => $data['kode_kegiatan'],
            'kode_akun' => $data['kode_akun'],
            'pagu' => $data['pagu'],
            'tahun_anggaran' => $data['tahun_anggaran']
        );
        $this->db->insert('temp_anggaran', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'kode_kegiatan' => $data['kode_kegiatan'],
            'kode_akun' => $data['kode_akun'],
            'pagu' => $data['pagu'],
            'tahun_anggaran' => $data['tahun_anggaran']
        );
        $this->db->update('temp_anggaran', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('temp_anggaran', array('id' => $id));
    }

    public function truncate() {
        $this->db->truncate('temp_anggaran');
    }
}
