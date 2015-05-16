<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekap_perdin_pegawai_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_by_field($param = array()) {
        $sql = "SELECT dp.id_header, "
                . "dp.id_pegawai, "
                . "(select p.nama from pegawai p where p.id = dp.id_pegawai) as nama_pegawai, "                
                . "dp.tgl_berangkat, dp.tgl_pulang, "
                . "month(dp.tgl_berangkat) as bln_berangkat, "
                . "year(dp.tgl_berangkat) as thn_berangkat, "
                . "month(dp.tgl_pulang) as bln_pulang, "
                . "year(dp.tgl_pulang) as thn_pulang "
                . "FROM detail_perjalanan_dinas dp "
                . "where dp.id_header in (select pd.id from perjalanan_dinas pd where pd.status = 5) "
                . "and month(dp.tgl_berangkat) = " . $param['bulan'] . " or month(dp.tgl_pulang) = " . $param['bulan'] . " "
                . "and year(dp.tgl_berangkat) = " . $param['tahun'] . " and year(dp.tgl_pulang) = " . $param['tahun'] . " "
                . "group by id_header, id_pegawai "
                . "order by id_header";
        return $this->db->query($sql);
    }

}
