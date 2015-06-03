<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 20 Mei 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengadaan_barang_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_all() {
        $sql = "select pj.* "
                . ", (select pd.nomor_pengajuan from pengajuan_barang pd where pd.id = pj.id_header) as no_spt "
                . ", (select p.nama from pegawai p where p.id = pj.penerima) as nama_penerima "
                . ", (select sum(dpj.jumlah) from detail_pengadaan_barang dpj where dpj.id_pengadaan_barang = pj.id group by dpj.id_pengadaan_barang) as jumlah "
                . ", (select k.id_unit from kegiatan k where k.id = (select a.id_kegiatan from anggaran a where a.id =(select pd1.id_anggaran from perjalanan_dinas pd1 where pd1.id = pj.id_header))) as id_unit "
                . "from pengadaan_barang pj";
        return $this->db->query($sql);
    }

    public function select_by_id($id) {
        return $this->db->get_where('pengadaan_barang', array('id' => $id));
    }

    public function select_by_field($param = array()) {
        $sql = "select pj.* "
                . ", (select pd.nomor_pengajuan from pengajuan_barang pd where pd.id = pj.id_header) as no_spt "
                . ", (select p.nama from pegawai p where p.id = pj.penerima) as nama_penerima "
                . ", (select p.nip from pegawai p where p.id = pj.penerima) as nip_penerima "
                . "from pengadaan_barang pj "
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
            'id_header' => $data['id_header'],
            'penerima' => $data['penerima'],
            'deskripsi_pengadaan_barang' => $data['deskripsi_pengadaan_barang']
        );
        $this->db->insert('pengadaan_barang', $data);
    }

    public function edit($id, $data) {
        $data = array(
            'id_header' => $data['id_header'],
            'penerima' => $data['penerima'],
            'deskripsi_pengadaan_barang' => $data['deskripsi_pengadaan_barang']
        );
        $this->db->update('pengadaan_barang', $data, "id = " . $id);
    }

    public function delete($id) {
        $this->db->delete('pengadaan_barang', array('id' => $id));
    }

}
