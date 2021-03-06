<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Rizal
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perjalanan_dinas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $query = "select a1.*, pd.*,  "
                . '(select k1.nama_kota from kota_tujuan k1 where k1.id = pd.kota_tujuan_1) as nama_kota_tujuan_1, '
                . '(select k2.nama_kota from kota_tujuan k2 where k2.id = pd.kota_tujuan_2) as nama_kota_tujuan_2, '
                . '(select k3.nama_kota from kota_tujuan k3 where k3.id = pd.kota_tujuan_3) as nama_kota_tujuan_3 '                
                . "from perjalanan_dinas pd, "
                . "(select a.id, k.nama_kegiatan, k.id_unit, ak.jenis_belanja "
                . "from anggaran a, kegiatan k, akun ak "
                . "where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 "
                . "where pd.id_anggaran = a1.id "
                . "order by status asc, tanggal_pembuatan desc";
        return $this->db->query($query);
    }

    public function select_by_id($id) {
        $query = 'select  a1.nama_kegiatan, a1.jenis_belanja, a1.kode_kegiatan, a1.kode_akun, pd.*,'
                . '(select k1.nama_kota from kota_tujuan k1 where k1.id = pd.kota_tujuan_1) as nama_kota_tujuan_1, '
                . '(select k2.nama_kota from kota_tujuan k2 where k2.id = pd.kota_tujuan_2) as nama_kota_tujuan_2, '
                . '(select k3.nama_kota from kota_tujuan k3 where k3.id = pd.kota_tujuan_3) as nama_kota_tujuan_3 '
                . 'from perjalanan_dinas pd, '
                . '(select a.id, k.nama_kegiatan, k.id_unit, ak.jenis_belanja, k.kode_kegiatan, ak.kode_akun '
                . 'from anggaran a, kegiatan k, akun ak '
                . 'where ak.id = a.id_akun and a.id_kegiatan = k.id) as a1 '
                . 'where pd.id_anggaran = a1.id '
                . 'and pd.id = ' . $id;
        return $this->db->query($query);
    }

    public function select_by_field($param = array()) {
        $query = "select a1.*, pd.*, "
                . '(select k1.nama_kota from kota_tujuan k1 where k1.id = pd.kota_tujuan_1) as nama_kota_tujuan_1, '
                . '(select k2.nama_kota from kota_tujuan k2 where k2.id = pd.kota_tujuan_2) as nama_kota_tujuan_2, '
                . '(select k3.nama_kota from kota_tujuan k3 where k3.id = pd.kota_tujuan_3) as nama_kota_tujuan_3 '
                . "from perjalanan_dinas pd, "
                . "(select a.id, k.nama_kegiatan, k.id_unit, ak.jenis_belanja "
                . "from anggaran a, kegiatan k, akun ak "
                . "where ak.id = a.id_akun and a.id_kegiatan = k.id ";
        if (!empty($param['kode_unit'])) {
            $query = $query . " and k.id_unit = " . $param['kode_unit'] . " ";
        }
        $query = $query . ") as a1 "
                . "where pd.id_anggaran = a1.id "
                . "and pd.status = " . $param['status'] . " ";


        if (!empty($param['status_penolakan'])) {
            $query = $query . " and pd.status_penolakan = " . $param['status_penolakan'] . " ";
        }
        
        // print_r($query);

        if (!empty($param['kode_unit'])) {
            $query = $query . " and a1.id_unit = " . $this->session->userdata('kode_unit') . " ";
        }
        $query = $query . " order by tanggal_approval";
        return $this->db->query($query);
    }

    public function add($data) {
        $data = array(
            'no_spt' => $data['no_spt'],
            'status' => $data['status_approval'],
            'status_diklat' => $data['status_diklat'],
            'id_anggaran' => $data['id_anggaran'],
            'jumlah_tujuan' => $data['jumlah_tujuan'],
            'maksud_perjalanan' => $data['maksud_perjalanan'],
            'jadwal_berangkat_1' => $this->format_date_to_sql($data['jadwal_berangkat_1']),
            'jadwal_berangkat_2' => $this->format_date_to_sql($data['jadwal_berangkat_2']),
            'jadwal_berangkat_3' => $this->format_date_to_sql($data['jadwal_berangkat_3']),
            'jadwal_pulang_1' => $this->format_date_to_sql($data['jadwal_pulang_1']),
            'jadwal_pulang_2' => $this->format_date_to_sql($data['jadwal_pulang_2']),
            'jadwal_pulang_3' => $this->format_date_to_sql($data['jadwal_pulang_3']),
            'kota_tujuan_1' => $data['kota_tujuan_1'],
            'kota_tujuan_2' => $data['kota_tujuan_2'],
            'kota_tujuan_3' => $data['kota_tujuan_3'],
            'status_penolakan' => 0
        );
        $this->db->insert('perjalanan_dinas', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'no_spt' => $data['no_spt'],
            'status' => $data['status_approval'],
            'status_diklat' => $data['status_diklat'],
            'id_anggaran' => $data['id_anggaran'],
            'jumlah_tujuan' => $data['jumlah_tujuan'],
            'maksud_perjalanan' => $data['maksud_perjalanan'],
            'jadwal_berangkat_1' => $this->format_date_to_sql($data['jadwal_berangkat_1']),
            'jadwal_berangkat_2' => $this->format_date_to_sql($data['jadwal_berangkat_2']),
            'jadwal_berangkat_3' => $this->format_date_to_sql($data['jadwal_berangkat_3']),
            'jadwal_pulang_1' => $this->format_date_to_sql($data['jadwal_pulang_1']),
            'jadwal_pulang_2' => $this->format_date_to_sql($data['jadwal_pulang_2']),
            'jadwal_pulang_3' => $this->format_date_to_sql($data['jadwal_pulang_3']),
            'kota_tujuan_1' => $data['kota_tujuan_1'],
            'kota_tujuan_2' => $data['kota_tujuan_2'],
            'kota_tujuan_3' => $data['kota_tujuan_3']
        );

        $this->db->update('perjalanan_dinas', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('perjalanan_dinas', array('id' => $id));
    }

    //tambahan

    public function update_status($id, $data) {
        $data = array(
            'status' => $data['status']
        );
        $this->db->update('perjalanan_dinas', $data, "id = " . $id);
    }

    public function update_status_penolakan($id, $data) {
        $data = array(
            'status_penolakan' => $data['status_penolakan']
        );
        $this->db->update('perjalanan_dinas', $data, "id = " . $id);
    }

    public function update_no_spt($id, $data) {
        $data = array(
            'no_spt' => $data['no_spt'],
            'tanggal_approval' => $data['tanggal_approval']
        );
        $this->db->update('perjalanan_dinas', $data, "id = " . $id);
    }

    public function get_jumlah_tujuan($id) {
        $sql = "select jumlah_tujuan from perjalanan_dinas where id=" . $id;
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function format_date_to_sql($str) {
        return substr($str, 6, 4) . '-' . substr($str, 3, 2) . '-' . substr($str, 0, 2);
    }

    public function get_biaya_total() {
        $sql = 'SELECT id_header, sum(biaya) as total_biaya  FROM `detail_perjalanan_dinas` group by id_header';
    }

}
