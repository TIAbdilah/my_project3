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
        Matrik Bukti SPD Pegawai Puslitbang Permukiman<br>
        Bulan:
        <?php
        $bl = add_zero($month);
        echo "<strong>" . $array_custom->bulan[$bl] . " " . $year . "</strong>"
        ?><br><br>

        <table style="width: 100%;border-collapse: collapse" border="1" >
            <tr>
                <th width="5%">No</th>
                <th width="35%">No. SPT</th>
                <th width="40%">Nama Pegawai</th>
                <th width="20%">Laporan Pemkuktian</th>
            </tr>
            <?php
            $no = 1;
            $no_spt = '';
            foreach ($list_data as $data) {
                if ($data->id_unit == $this->session->userdata('kode_unit')) {
                    echo "<tr>";
                    if ($no_spt != $data->no_spt) {
                        echo "<td align=\"center\">" . $no . "</td>"
                        . "<td>" . $data->no_spt . " </td>";
                    } else {
                        echo "<td></td><td></td>";
                    }
                    echo "<td>" . $data->nama_pegawai . "</td>";
                    if ($data->jml_bukti != 0) {
                        echo "<td align=\"center\">SUDAH</td>";
                    } else {
                        echo "<td align=\"center\">BELUM</td>";
                    }
                    echo "</tr>";
                    $no++;
                    $no_spt = $data->no_spt;
                }
            }
            ?>
        </table>
    </body>
</html>
