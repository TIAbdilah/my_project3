<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekap_pembuktian_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_by_field($param = array()) {
        $sql = "select s1.* "
                . "from "
                . "(select distinct d.id_pegawai "
                . ", d.id_header "
                . ", (select p.nama from pegawai p where p.id= d.id_pegawai) as nama_pegawai "
                . ", (select p.kode_unit from pegawai p where p.id= d.id_pegawai) as id_unit "
                . ", (select pd1.no_spt from perjalanan_dinas pd1 where pd1.id = d.id_header) as no_spt "
                . ", (select pd1.jumlah_tujuan from perjalanan_dinas pd1 where pd1.id = d.id_header) as jumlah_tujuan "
                . ", (select pd1.jadwal_pulang_1 from perjalanan_dinas pd1 where pd1.id = d.id_header) as tgl_pulang_1 "
                . ", (select pd1.jadwal_pulang_2 from perjalanan_dinas pd1 where pd1.id = d.id_header) as tgl_pulang_2 "
                . ", (select pd1.jadwal_pulang_3 from perjalanan_dinas pd1 where pd1.id = d.id_header) as tgl_pulang_3 "
                . ", (select count(b.id) from bukti_perjalanan_dinas b where b.id_header = d.id_header and b.id_pegawai = d.id_pegawai) as jml_bukti "
                . "from detail_perjalanan_dinas d "
                . "where d.id_header in (select pd.id from perjalanan_dinas pd where pd.status = 5) "
                . "order by d.id_header ) s1 "
                . "where month(s1.tgl_pulang_1) =  " . $param['bulan'] . " or month(s1.tgl_pulang_2) =  " . $param['bulan'] . " or month(s1.tgl_pulang_3) =  " . $param['bulan'] . " "
                . "and year(s1.tgl_pulang_1) =  " . $param['tahun'] . " and year(s1.tgl_pulang_2) =  " . $param['tahun'] . "  and year(s1.tgl_pulang_3) =  " . $param['tahun'] . " ";
        return $this->db->query($sql);
    }

}
