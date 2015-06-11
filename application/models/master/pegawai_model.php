<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {

        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_unit')->from('unit');
        $sub->where('pegawai.kode_unit = unit.id');
        $this->subquery->end_subquery('nama_unit');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('kode_unit')->from('unit');
        $sub->where('pegawai.kode_unit = unit.id');
        $this->subquery->end_subquery('kode_unit');
        $this->db->from('pegawai');
        $this->db->where('narasumber', 0);
        $this->db->order_by('nama');

        return $this->db->get();
    }

    public function select_all_tidak_dinas() {

        $this->db->select('*');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama_unit')->from('unit');
        $sub->where('pegawai.kode_unit = unit.id');
        $this->subquery->end_subquery('nama_unit');
        $sub = $this->subquery->start_subquery('select');
        $sub->select('kode_unit')->from('unit');
        $sub->where('pegawai.kode_unit = unit.id');
        $this->subquery->end_subquery('kode_unit');
        $this->db->from('pegawai');
        $this->db->where('flag', 0);
        $this->db->order_by('nama');

        return $this->db->get();
    }

    public function select_pegawai_sedang_perjadin() {
        $sql = "select s1.* "
                . "from "
                . "(SELECT dp.id_header "
                . ",dp.id_pegawai "
                . ", (select p.kode_unit from pegawai p where p.id = dp.id_pegawai) as id_unit"
                . ", (select p.nama from pegawai p where p.id = dp.id_pegawai) as nama_pegawai "
                . ", (select pd1.jadwal_berangkat_1 from perjalanan_dinas pd1 where pd1.id = dp.id_header) as berangkat "
                . ", (select pd2.jadwal_pulang_1 from perjalanan_dinas pd2 where pd2.id = dp.id_header) as pulang_1 "
                . ", (select pd3.jadwal_pulang_2 from perjalanan_dinas pd3 where pd3.id = dp.id_header) as pulang_2 "
                . ", (select pd4.jadwal_pulang_3 from perjalanan_dinas pd4 where pd4.id = dp.id_header) as pulang_3 "
                . "FROM detail_perjalanan_dinas dp "
                . "where dp.id_header in (select pd.id from perjalanan_dinas pd where pd.status = 5) "
                . "group by id_header, id_pegawai "
                . "order by id_header "
                . ") s1 ";
        return $this->db->query($sql);
    }

    public function select_pegawai_tidak_perjadin($param = array()) {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where_not_in('nama', $param);
        $this->db->order_by('nama');
        return $this->db->get();
    }

    public function select_by_id($id) {
        return $this->db->get_where('pegawai', array('id' => $id, 'narasumber' => 0));
    }

    public function select_by_field($field, $keyword) {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where(array($field => $keyword));
        $this->db->order_by('nama');
        return $this->db->get();
    }

    public function add($data) {
        $data = array(
            'nip' => $data['nip'],
            'nama' => $data['nama'],
            'golongan' => $data['golongan'],
            'jabatan' => $data['jabatan'],
            'tgl_lahir' => $data['tgl_lahir'],
            'kelas_jabatan' => $data['kelas_jabatan'],
            'status' => $data['status'],
            'kode_unit' => $data['kode_unit'],
            'kriteria_pegawai' => $data['kriteria_pegawai'],
            'status_pendidikan' => $data['status_pendidikan'],
            'narasumber' => 0,
            'tingkat' => $data['tingkat']
        );
        $this->db->insert('pegawai', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'nip' => $data['nip'],
            'nama' => $data['nama'],
            'golongan' => $data['golongan'],
            'jabatan' => $data['jabatan'],
            'tgl_lahir' => $this->format_date_to_sql($data['tgl_lahir']),
            'kelas_jabatan' => $data['kelas_jabatan'],
            'status' => $data['status'],
            'kode_unit' => $data['kode_unit'],
            'kriteria_pegawai' => $data['kriteria_pegawai'],
            'status_pendidikan' => $data['status_pendidikan'],
            'tingkat' => $data['tingkat']
        );
        $this->db->update('pegawai', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('pegawai', array('id' => $id));
    }

    public function getDetailPegawai($id_pegawai = string) {
        $this->db->select('golongan,status');
        $this->db->from('pegawai');
        $this->db->where('id', $id_pegawai);
        $query = $this->db->get();
        return $query->result();
    }

    public function format_date_to_sql($str) {
        return substr($str, 6, 4) . '-' . substr($str, 3, 2) . '-' . substr($str, 0, 2);
    }

    public function update_flag($id, $data) {
        $data = array(
            'flag' => $data['flag']
        );
        $this->db->update('pegawai', $data, "id = " . $id);
    }

}
