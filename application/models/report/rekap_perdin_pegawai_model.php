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
        $sql = "select s1.* "
                . "from "
                . "(SELECT dp.id_header "
                . ",dp.id_pegawai  "
                . ",(select p.nama from pegawai p where p.id = dp.id_pegawai) as nama_pegawai "
                . ", (select pd1.jadwal_berangkat_1 from perjalanan_dinas pd1 where pd1.id = dp.id_header) as berangkat "
                . ", (select pd2.jadwal_pulang_1 from perjalanan_dinas pd2 where pd2.id = dp.id_header) as pulang_1 "
                . ", (select pd3.jadwal_pulang_2 from perjalanan_dinas pd3 where pd3.id = dp.id_header) as pulang_2 "
                . ", (select pd4.jadwal_pulang_3 from perjalanan_dinas pd4 where pd4.id = dp.id_header) as pulang_3 "
                . "FROM detail_perjalanan_dinas dp "
                . "where dp.id_header in (select pd.id from perjalanan_dinas pd where pd.status = 5) "
                . "group by id_header, id_pegawai "
                . "order by id_header "
                . ") s1 "
                . "where  month(s1.berangkat) =  ".$param['bulan']."  or month(s1.pulang_1) =  ".$param['bulan']." "
                . "or month(s1.pulang_2) =  ".$param['bulan']." or month(s1.pulang_3) =  ".$param['bulan']." "
                . "and year(s1.berangkat) =  ".$param['tahun']."  and year(s1.pulang_1) =  ".$param['tahun']." "
                . "and year(s1.pulang_2) =  ".$param['tahun']."  and year(s1.pulang_3) =  ".$param['tahun']." ";
        return $this->db->query($sql);
    }

}
