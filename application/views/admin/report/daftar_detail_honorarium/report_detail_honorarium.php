<?php

function format_date($string) {
    return substr($string, 8, 2) . '-' . substr($string, 5, 2) . '-' . substr($string, 0, 4);
}
?>
<?php
$total_honor = 0;
$jumlah_honor = 0;
foreach ($data_report as $row) {
    $jumlah_honor = $row->jumlah * $row->honor;
    $total_honor = $total_honor + $jumlah_honor;
}
?>
<html>
    <body>
        <table style="width: 100%">
            <tr>
                <td align="center">
                    <strong>D A F T A R</strong><br>
                    <strong>PEMBAYARAN HONORARIUM NARA SUMBER</strong><br>
                    <strong>PROSEDING DISEMINASI, SOSIALISASI DAN PELATIHAN</strong><br>
                    <strong>KODE : <?php echo $data->kode_kegiatan ?></strong><br><br>
                    <strong>KEGIATAN :</strong><br>
                    <strong><?php echo $data->kegiatan ?></strong>
                </td>
            </tr>
        </table>
    <center>
        <table border="0" style="alignment-adjust: central;width: 70%; border-collapse: collapse; ">           
            <tbody>
                <tr>
                    <td width="30%">Jumlah</td>
                    <td width="70%">:&nbsp;Rp. <?php echo number_format($total_honor) ?></td>
                </tr>
                <tr>
                    <td>Dengan Huruf</td>
                    <td>:&nbsp;<?php echo $curency->convertCurrencyToWords($total_honor) ?></td>
                </tr>
                <tr>
                    <td>Berdasarkan</td>
                    <td>:&nbsp;SK Kepala Satuan Kerja Pusat Penelitian dan Pengembangan Permukiman</td>
                </tr>
                <tr>
                    <td>Nomor</td>
                    <td>:&nbsp;<?php echo $data->nomor_pengajuan ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:&nbsp;<?php echo $format_date->format_date_dfy($data->tanggal_pembuatan) ?></td>
                </tr>
                <tr>
                    <td>Agenda</td>
                    <td>:&nbsp;<?php echo $data->acara ?></td>
                </tr>
                <tr>
                    <td>Periode Pembayaran</td>
                    <td>:&nbsp;<?php echo $format_date->format_date_dfy($data->periode_pembayaran) ?></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </tbody>
        </table>
    </center>
    <table border="1" style="width: 100%; border-collapse: collapse">
        <thead>
            <tr>
                <th width="2%">No</th>
                <th width="18%">Nama</th>
                <th width="5%">Gol</th>
                <th width="16%">Jabatan/Instansi</th>
                <th width="4%">Jumlah Jam</th>
                <th width="9%">Besar Honor Per Jam</th>
                <th width="9%">Jumlah(Rp.)</th>
                <th width="9%">Potongan PPh Pasal 21 (Rp.)</th>
                <th width="9%">Jumlah Bersih Yang Diterima (Rp.)</th>
                <th width="6%">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total = 0;
            $pph = 0;
            $jumlah_honor = 0;
            $jumlah_bersih = 0;
            $total_jumlah_bersih = 0;
            $total_pph = 0;
            $total_honor = 0;
            foreach ($data_report as $row) {
                $jumlah_honor = $row->jumlah * $row->honor;
                $pieces = explode("/", $row->golongan);
                if ($pieces[0] == 'III') {
                    $pph = (5 * $jumlah_honor) / 100;
                } else if ($pieces[0] == 'IV') {
                    $pph = (15 * $jumlah_honor) / 100;
                } else {
                    $pph = 0;
                }
                $jumlah_bersih = $jumlah_honor - $pph;
                echo "<tr>"
                . "<td>" . $no . "</td>"
                . "<td>" . $row->narasumber . "</td>"
                . "<td align=\"center\">" . $row->golongan . "</td>"
                . "<td>" . $row->jabatan . "</td>"
                . "<td align=\"center\">" . $row->jumlah . "</td>"
                . "<td align=\"right\">" . number_format($row->honor) . "</td>"
                . "<td align=\"right\">" . number_format($jumlah_honor) . "</td>"
                . "<td align=\"right\">" . number_format($pph) . "</td>"
                . "<td align=\"right\">" . number_format($jumlah_bersih) . "</td>"
                . "<td>" . "<br><br><br>" . "</td>"
                . "</tr>";
                $no++;
                $total_jumlah_bersih = $total_jumlah_bersih + $jumlah_bersih;
                $total_pph = $total_pph + $pph;
                $total_honor = $total_honor + $jumlah_honor;
            }
            ?>
            <tr>
                <th colspan="6">Jumlah</th>
                <th><?php echo number_format($total_honor) ?></th>
                <th><?php echo number_format($total_pph) ?></th>
                <th id="outTotalDetailBarang"><?php echo number_format($total_jumlah_bersih) ?></th>
                <th></th>
            </tr>
        </tbody>

    </table>
    <br>
    <table style="width: 100%">
        <tr>
            <td align="center" width="30%">
                <br>
                MENGETAHUI/MENYETUJUI,<br>
                PEJABAT PEMBUAT KOMITMEN, <br>
                <br><br><br><br>
                <strong><u>Iwan Suprijanto, ST, MT</u></strong><br>
                NIP. 19710930199803101
            </td>
            <td align="center" width="30%">
                <br><br>
                BENDAHARA, <br>
                <br><br><br><br>
                <strong><u>Drajat Subuhri</u></strong><br>
                NIP. 196806122007011004
            </td>
            <td align="center" width="30%">
                Bandung, <?php echo $format_date->format_date_dfy($data->periode_pembayaran) ?><br>
                MENGETAHUI TELAH DIBAYARKAN <br>
                KEPADA YANG BERHAK<br>
                <br><br><br><br>
                <strong><u>Beben Sugiarti</u></strong><br>
                NIP.<?php
                for ($i = 0; $i < 30; $i++) {
                    echo "&nbsp;";
                }
                ?> 
            </td>
        </tr>
    </table>
</body>
</html>
