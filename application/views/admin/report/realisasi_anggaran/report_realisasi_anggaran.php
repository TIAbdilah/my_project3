<html>
    <body>
        <table style="width: 100%; border-collapse: collapse" border="1">
            <thead>
                <tr>
                    <th width="3%"> No </th>
                    <th width="25%"> Kegiatan</th>
                    <th width="12%"> Kode Kegiatan</th>
                    <th width="7%"> Kode Akun</th>
                    <th width="15%"> Akun</th>
                    <th width="9%"> Pagu</th>
                    <th width="9%"> Realisasi</th>
                    <th width="9%"> Sisa</th>
                    <th width="6%"> Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total_pagu = 0;
                $total_biaya = 0;
                $total_sisa = 0;
                $nama_kegiatan = '';
                foreach ($list_data as $row) {
                    if ($row->nama_kegiatan != $nama_kegiatan && $nama_kegiatan != '') {
                        echo "<tr>"
                        . "<th colspan=\"5\" align=\"center\">Total</th>"
                        . "<th align=\"right\">" . number_format($total_pagu) . "</th>"
                        . "<th align=\"right\">" . number_format($total_biaya) . "</th>"
                        . "<th align=\"right\">" . number_format($total_sisa) . "</th>"
                        . "<th>&nbsp;</th>"
                        . "</tr>";
                        $total_pagu = 0;
                        $total_biaya = 0;
                        $total_sisa = 0;
                    }
                    echo "<tr>";
                    if ($row->nama_kegiatan != $nama_kegiatan) {
                        echo "<td>" . $no . "</td>"
                        . "<td>" . $row->nama_kegiatan . " </td>"
                        . "<td>" . $row->kode_kegiatan . "</td>";
                        $no++;
                    } else {
                        echo "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>";
                    }
                    echo "<td>" . $row->kode_akun . "</td>"
                    . "<td>" . $row->jenis_belanja . "</td>"
                    . "<td align=\"right\">" . number_format($row->pagu) . "</td>"
                    . "<td align=\"right\">" . number_format($row->biaya) . "</td>"
                    . "<td align=\"right\">" . number_format($row->sisa) . "</td>"
                    . "<td align=\"center\">" . $row->tahun_anggaran . "</td>"
                    . "</tr>";
                    $nama_kegiatan = $row->nama_kegiatan;
                    $total_pagu += $row->pagu;
                    $total_biaya += $row->biaya;
                    $total_sisa += $row->sisa;
                }
                echo "<tr>"
                . "<th colspan=\"5\" align=\"center\">Total</th>"
                . "<th align=\"right\">" . number_format($total_pagu) . "</th>"
                . "<th align=\"right\">" . number_format($total_biaya) . "</th>"
                . "<th align=\"right\">" . number_format($total_sisa) . "</th>"
                . "<th>&nbsp;</th>"
                . "</tr>";
                ?>
            </tbody>
        </table>
    </body>
</html>
