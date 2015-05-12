<?php

//Created By    : Rizal
//Updated By    : Rizal
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksiperjalanandinasdetail_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        return $this->db->get('transaksi_perjalanandinas_detail');
    }

    public function select_by_id($id) {
        return $this->db->get_where('transaksi_perjalanandinas_detail', array('id' => $id));
    }

    public function select_by_header_id($id) {

        $this->db->select('*');

        $sub = $this->subquery->start_subquery('select');
        $sub->select('nama')->from('pegawai');
        $sub->where('pegawai.id = transaksi_perjalanandinas_detail.id_pegawai');
        $this->subquery->end_subquery('nama_pegawai'); // as 

        $sub = $this->subquery->start_subquery('select');
        $sub->select('nip')->from('pegawai');
        $sub->where('pegawai.id = transaksi_perjalanandinas_detail.id_pegawai');
        $this->subquery->end_subquery('nip'); // as 

        $sub = $this->subquery->start_subquery('select');
        $sub->select('golongan')->from('pegawai');
        $sub->where('pegawai.id = transaksi_perjalanandinas_detail.id_pegawai');
        $this->subquery->end_subquery('golongan'); // as 

        $sub = $this->subquery->start_subquery('select');
        $sub->select('jabatan')->from('pegawai');
        $sub->where('pegawai.id = transaksi_perjalanandinas_detail.id_pegawai');
        $this->subquery->end_subquery('jabatan'); // as 

        $this->db->from('transaksi_perjalanandinas_detail');
        $this->db->where(array('id_transaksi_perjalanandinas_header' => $id));

        return $this->db->get();
    }

    public function select_by_field($param = array()) {  
        $sql="select tpd.*, "
                . "p.kode_unit, "
                . "p.nama "
                . "from transaksi_perjalanandinas_detail tpd,  pegawai p "
                . "where tpd.id_pegawai = p.id"
                . " and tpd.id_transaksi_perjalanandinas_header = ".$param['id_transaksi_perjalanandinas_header']
                . " and p.kode_unit = ".$param['id_unit'];
        return $this->db->query($sql);
    }
    
    public function select_unit_from_detail($id_header){
        $sql = "SELECT tr_pd_d.id_pegawai, "
                . "tb_peg_uni.nama_unit, "
                . "tb_peg_uni.id, "
                . "tb_peg_uni.id_unit "
                . "from transaksi_perjalanandinas_detail tr_pd_d,"
                . "(select p.id, p.nama, u.nama_unit, u.id as id_unit "
                . "from pegawai p, unit u "
                . "where p.kode_unit = u.id) as tb_peg_uni "
                . "where tb_peg_uni.id = tr_pd_d.id_pegawai";
        return $this->db->query($sql);
    }

    public function add3($data) {


        $data1 = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_transaksi_perjalanandinas_header' => $data['id_transaksi_perjalanandinas_header'],
            'transport_pendukung' => $data['transport_pendukung'],
            'jenis_penginapan' => $data['jenis_penginapan'],
            'pengeluaran_riil' => $data['pengeluaran_riil'],
            'jadwal_berangkat' => $data['jadwal_berangkat1'],
            'jadwal_pulang' => $data['jadwal_pulang1'],
            'biaya_akomodasi' => $data['biaya_akomodasi1'],
            'biaya_penginapan' => $data['biaya_penginapan1'],
            'kota_tujuan' => $data['kota_tujuan1'],
            'transport_utama' => $data['transport_utama']
        );
        $this->db->insert('transaksi_perjalanandinas_detail', $data1);
        $data2 = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_transaksi_perjalanandinas_header' => $data['id_transaksi_perjalanandinas_header'],
            'transport_pendukung' => $data['transport_pendukung'],
            'jenis_penginapan' => $data['jenis_penginapan'],
            'pengeluaran_riil' => $data['pengeluaran_riil'],
            'jadwal_berangkat' => $data['jadwal_berangkat2'],
            'jadwal_pulang' => $data['jadwal_pulang2'],
            'biaya_akomodasi' => $data['biaya_akomodasi2'],
            'biaya_penginapan' => $data['biaya_penginapan2'],
            'kota_tujuan' => $data['kota_tujuan2']
        );
        $this->db->insert('transaksi_perjalanandinas_detail', $data2);
        $data3 = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_transaksi_perjalanandinas_header' => $data['id_transaksi_perjalanandinas_header'],
            'transport_pendukung' => $data['transport_pendukung'],
            'jenis_penginapan' => $data['jenis_penginapan'],
            'pengeluaran_riil' => $data['pengeluaran_riil'],
            'jadwal_berangkat' => $data['jadwal_berangkat3'],
            'jadwal_pulang' => $data['jadwal_pulang3'],
            'biaya_akomodasi' => $data['biaya_akomodasi3'],
            'biaya_penginapan' => $data['biaya_penginapan3'],
            'kota_tujuan' => $data['kota_tujuan3']
        );
        $this->db->insert('transaksi_perjalanandinas_detail', $data3);
    }

    public function add2($data) {
        $data1 = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_transaksi_perjalanandinas_header' => $data['id_transaksi_perjalanandinas_header'],
            'transport_pendukung' => $data['transport_pendukung'],
            'jenis_penginapan' => $data['jenis_penginapan'],
            'pengeluaran_riil' => $data['pengeluaran_riil'],
            'jadwal_berangkat' => $data['jadwal_berangkat1'],
            'jadwal_pulang' => $data['jadwal_pulang1'],
            'biaya_akomodasi' => $data['biaya_akomodasi1'],
            'biaya_penginapan' => $data['biaya_penginapan1'],
            'kota_tujuan' => $data['kota_tujuan1'],
            'transport_utama' => $data['transport_utama']
        );
        $this->db->insert('transaksi_perjalanandinas_detail', $data1);
        $data2 = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_transaksi_perjalanandinas_header' => $data['id_transaksi_perjalanandinas_header'],
            'transport_pendukung' => $data['transport_pendukung'],
            'jenis_penginapan' => $data['jenis_penginapan'],
            'pengeluaran_riil' => $data['pengeluaran_riil'],
            'jadwal_berangkat' => $data['jadwal_berangkat2'],
            'jadwal_pulang' => $data['jadwal_pulang2'],
            'biaya_akomodasi' => $data['biaya_akomodasi2'],
            'biaya_penginapan' => $data['biaya_penginapan2'],
            'kota_tujuan' => $data['kota_tujuan2']
        );
        $this->db->insert('transaksi_perjalanandinas_detail', $data2);
    }

    public function add1($data) {
        $data1 = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_transaksi_perjalanandinas_header' => $data['id_transaksi_perjalanandinas_header'],
            'transport_pendukung' => $data['transport_pendukung'],
            'jenis_penginapan' => $data['jenis_penginapan'],
            'pengeluaran_riil' => $data['pengeluaran_riil'],
            'jadwal_berangkat' => $data['jadwal_berangkat1'],
            'jadwal_pulang' => $data['jadwal_pulang1'],
            'biaya_akomodasi' => $data['biaya_akomodasi1'],
            'biaya_penginapan' => $data['biaya_penginapan1'],
            'kota_tujuan' => $data['kota_tujuan1'],
            'transport_utama' => $data['transport_utama']
        );
        $this->db->insert('transaksi_perjalanandinas_detail', $data1);
    }

    public function edit($id, $data) {
        $data = array(
            'id_pegawai' => $data['id_pegawai'],
            'id_transaksi_perjalanandinas_header' => $data['id_transaksi_perjalanandinas_header'],
            'transport_pendukung' => $data['transport_pendukung'],
            'jenis_penginapan' => $data['jenis_penginapan'],
            'pengeluaran_riil' => $data['pengeluaran_riil']
        );
        $this->db->update('transaksi_perjalanandinas_detail', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('transaksi_perjalanandinas_detail', array('id' => $id));
    }

}
