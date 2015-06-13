<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Array_custom extends CI_Controller {

    var $int_role = array(
        'operator' => 0,
        'esselon 4' => 1,
        'esselon 3' => 2,
        'asisten satker' => 3,
        'ppk' => 4
    );
    var $kode_role = array(
        1 => 'OPR',
        2 => 'ES4',
        3 => 'ES3',
        4 => 'AST',
        5 => 'PPK',
    );
    var $status = array(
        '0' => 'baru dibuat',
        '1' => 'menunggu verifikasi esselon 4',
        '2' => 'menunggu verifikasi esselon 3',
        '3' => 'menunggu verifikasi asisten satker',
        '4' => 'menunggu verifikasi PPK',
        '5' => 'lengkap'
    );
    var $status_aktivasi = array(
        '0' => 'tidak aktif',
        '1' => 'aktif'
    );
    var $status_approval = array(
        '0' => 'baru dibuat',
        '1' => 'menunggu verifikasi esselon 4',
        '2' => 'menunggu verifikasi esselon 3',
        '3' => 'menunggu verifikasi asisten satker',
        '4' => 'menunggu verifikasi PPK',
        '5' => 'lengkap'
    );
    var $status_penolakan = array(
        '0' => '-',
        '1' => '<button class="btn btn-danger"><strong>DITOLAK</strong></button>'
    );
    var $status_diklat = array(
        '0' => 'Tidak',
        '1' => 'Ya',
    );
    var $bulan_romawi = array(
        '01' => 'I',
        '02' => 'II',
        '03' => 'III',
        '04' => 'IV',
        '05' => 'V',
        '06' => 'VI',
        '07' => 'VII',
        '08' => 'VIII',
        '09' => 'IX',
        '10' => 'X',
        '11' => 'XI',
        '12' => 'XII'
    );
    var $bulan = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    );

    public function list_bulan() {
        $bl = "";
        $w = array_fill(0, 12, array());
        for ($i = 1; $i <= 12; $i++) {
            if (strlen($i) == 1) {
                $bl = "0" . $i;
            } else {
                $bl = $i;
            }
            $x = $i - 1;
            $w[$x] = array(
                'no_bulan' => $bl,
                'str_bulan' => $this->bulan[$bl]
            );
        }
        return $w;
    }

    public function select_item_bulan($name, $id = null, $class = null) {
        $str = "";
        $list_bl = $this->list_bulan();
        $str = $str . "<select name=\"" . $name . "\" class=\"" . $class . "\" id=\"" . $id . "\">"
                . "<option value=\"\">Pilih Bulan</option>";
        for ($i = 0; $i < 12; $i++) {
            $nbl = $i + 1;
            $str = $str . "<option value=\"" . $nbl . "\">" . $list_bl[$i]['str_bulan'] . "</option>";
        }
        $str = $str . "</select>";
        return $str;
    }

    public function test_range(){
        $t_ber = strtotime("2015-4-1");
        $t_pul = strtotime("2015-4-5");
        $tgl = strtotime("2015-4-7");
        if($tgl <= $t_pul && $tgl >= $t_ber){
            echo "ya";
        } else {
            echo "tidak";
        }
    }

}
