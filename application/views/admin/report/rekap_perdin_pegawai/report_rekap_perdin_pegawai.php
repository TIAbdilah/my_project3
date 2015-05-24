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
        Matrik SPD Pegawai Puslitbang Permukiman<br>
        Bulan:
        <?php
        $bl = add_zero($month);
        echo "<strong>" . $array_custom->bulan[$bl] . " " . $year . "</strong>"
        ?><br>
        Bid. Program dan Kerjasama<br><br>

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
                if ($data->id_unit == $this->session->userdata('kode_unit')) {
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data->nama_pegawai ?></td>                    
                        <?php
                        $t_ber = strtotime($data->berangkat);
                        $t_pul = strtotime($data->pulang_1);
                        if ($data->pulang_2 != '0000-00-00' && $data->pulang_2 != null) {
                            $t_pul = strtotime($data->pulang_2);
                        }
                        if ($data->pulang_3 != '0000-00-00' && $data->pulang_3 != null) {
                            $t_pul = strtotime($data->pulang_3);
                        }
                        $jml = 0;
                        for ($i = 1; $i <= $int_day; $i++) {
                            $tgl = strtotime($year . "-" . $month . "-" . $i);
                            $day = date('D', $tgl);
                            if ($day == 'Sun') {
                                $color = '#003322';
                            } else if ($day == 'Sat') {
                                $color = '#ABD0BC';
                            } else {
                                $color = 'white';
                            }
                            if ($t_ber <= $tgl && $tgl <= $t_pul) {
//                        if ($tgl <= $t_pul && $tgl >= $t_ber) {
                                $color = '#00D856';
                                $jml += 1;
                            }
                            echo "<td  style=\"background-color:" . $color . "\"></td>";
                        }
                        ?>
                        <td align="center"><?php echo $jml; ?></td>
                        <td></td>
                    </tr>
                    <?php
                    $no++;
                }
            }
            ?>
        </table>
    </body>
</html>
