<?php

function add_zero($x) {
    if (strlen($x) == 1) {
        $x = "0" . $x;
    }
    return $x;
}
?>
<html>
    <body>
        <table style="width: 100%">
            <tr>
                <td align="center">
                    <strong>Matrik SPD Pegawai Puslitbang Permukiman</strong><br>
                    Bulan:
                    <?php
                    $bl = add_zero($month);
                    echo "<strong>" . $array_custom->bulan[$bl] . " " . $year . "</strong>"
                    ?><br>
                    <strong>Bidang Program dan Kerjasama</strong>
                </td>
            </tr>
        </table>
        <br><br>

        <!--testing-->
        <?php
        //inisialisasi array
        $dt_peg = array();
        foreach ($list_data as $data) {
            $tgl_pegawai = array_fill(1, 31, 0);
            $dt_peg[$data->nama] = $tgl_pegawai;
        }

        //updating array
        foreach ($list_data_perjalanan as $data) {

            //inisilisasi 'tgl berangkat' dan 'tgl pulang'
            $t_ber = strtotime($data->berangkat);
            $t_pul = strtotime($data->pulang_1);
            if ($data->pulang_2 != '0000-00-00' && $data->pulang_2 != null) {
                $t_pul = strtotime($data->pulang_2);
            }
            if ($data->pulang_3 != '0000-00-00' && $data->pulang_3 != null) {
                $t_pul = strtotime($data->pulang_3);
            }

            //cek tanggal 
            $int_day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            for ($i = 1; $i <= $int_day; $i++) {
                $tgl = strtotime($year . "-" . $month . "-" . $i);
                $day = date('D', $tgl);
                if ($t_ber <= $tgl && $tgl <= $t_pul) {
                    $dt_peg[$data->nama_pegawai][$i] = 1;
                }
            }
        }
//        print_r($dt_peg) . '<br>';
        ?>
        <!--end testing-->

        <table style="width: 100%;border-collapse: collapse" border="1" >
            <tr>
                <td rowspan="2" width="3%" align="center">No</td>
                <td rowspan="2" width="26%" align="center">Nama</td>
                <?php
                $int_day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                $width_colspan = $int_day * 2;
                ?>
                <td colspan="<?php echo $int_day ?>" width="<?php echo $width_colspan . "%" ?>"  align="center">Tanggal</td>
                <td rowspan="2"  width="3%" align="center">Jml</td>
                <td rowspan="2"  width="7%" align="center">Ket</td>
            </tr>
            <tr>
                <?php
                for ($i = 1; $i <= $int_day; $i++) {
                    echo "<td width=\"2%\" align=\"center\">" . $i . "</td>";
                }
                ?>
            </tr>
            <?php
            $no = 1;
            foreach ($list_data as $data) {
                ?>
                <tr>
                    <td width="3%" align="center"><?php echo $no ?></td>
                    <td width="26%" ><?php echo $data->nama ?></td>
                    <?php
                    $jml = 0;
                    for ($i = 1; $i <= $int_day; $i++) {
                        $tgl = strtotime($year . "-" . $month . "-" . $i);
                        $day = date('D', $tgl);
                        if ($day == 'Sun') {
                            $color = '#fc0012';
                        } else if ($day == 'Sat') {
                            $color = '#f7a2a8';
                        } else {
                            $color = 'white';
                        }
                        if ($dt_peg[$data->nama][$i] == 1) {
                            $color = '#70ed39';
                            $jml += 1;
                        }
                        echo "<td width=\"2%\" style=\"background-color:" . $color . "\">&nbsp;</td>";
                    }
                    ?>
                    <td align="center"><?php echo $jml; ?></td>
                    <td></td>
                </tr>
                <?php
                $no++;
            }
            ?>
        </table>
        <br>
        <table>
            <tr>
                <td><strong>Keterangan :&nbsp;&nbsp;</strong></td>
                <td width="22px" align="center"><span style="display: block;width: 20px; height: 20px; background-color: #fc0012"></span></td>
                <td>Minggu</td>
                <td width="22px" align="center"><span style="display: block;width: 20px; height: 20px; background-color: #f7a2a8"></span></td>
                <td>Sabtu</td>
                <td width="22px" align="center"><span style="display: block;width: 20px; height: 20px; background-color: #70ed39"></span></td>
                <td>Perjalanan Dinas</td>
        </table>
    </body>
</html>
