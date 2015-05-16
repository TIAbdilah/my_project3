<html>
    <body>
        <table style="width: 100%; border-collapse: collapse" border="1">
            <thead>
                <tr>
                    <th width="3%"> No </th>
                    <th width="38%"> Kegiatan</th>
                    <th width="10%"> Kode Kegiatan</th>
                    <th width="5%"> Kode Akun</th>
                    <th width="15%"> Akun</th>
                    <th width="8%"> Pagu</th>
                    <th width="8%"> Realisasi</th>
                    <th width="8%"> Sisa</th>
                    <th width="5%"> Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $nama_kegiatan = '';
                foreach ($list_data as $row) {
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
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
