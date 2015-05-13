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
        echo $array_custom->bulan[$bl] . " " . $year
        ?><br>
        Bid. Program dan Kerjasama<br>
        SubBid. Program dan Evaluasi<br><br>

        <table style="width: 100%;border-collapse: collapse" border="1" >
            <tr>
                <td rowspan="2" width="3%" align="center">No</td>
                <td rowspan="2" width="26%" align="center">Nama</td>
                <?php
                $int_day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                $width_colspan = $int_day * 2;
                ?>
                <td colspan="<?php echo $int_day ?>" width="<?php echo $width_colspan . "%" ?>"  align="center">Tanggal</td>
                <td rowspan="2"  width="10%" align="center">Ket</td>
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
                    <td><?php echo $no?></td>
                    <td><?php echo $data->id_pegawai.' '.$data->id_header?></td>                    
                    <?php
                    $t_ber = strtotime($data->tgl_berangkat);
                    $t_pul = strtotime($data->tgl_pulang);
                    for ($i = 1; $i <= $int_day; $i++) {
                        $tgl = strtotime($year . "-" . $month . "-" . $i);
                        $day = date('D', $tgl);
                        if ($day == 'Sun') {
                            $color = 'red';
                        } else {
                            $color = 'white';
                        }
                        if ($tgl <= $t_pul && $tgl >= $t_ber) {
                            $color = 'blue';
                        }
                        echo "<td  style=\"background-color:" . $color . "\"></td>";
                    }
                    ?>
                    <td></td>
                </tr>
                <?php
                $no++;
            }
            ?>
        </table>
    </body>
</html>
