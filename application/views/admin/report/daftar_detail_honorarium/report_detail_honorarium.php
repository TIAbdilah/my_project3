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

    <center>
        <h3>D A F T A R</h3><br>
        <b>PEMBAYARAN HONORARIUM NARA SUMBER</b><br>
        <b>PROSEDING DISEMINASI, SOSIALISASI DAN PELATIHAN</b><br>
        <b>KODE : <?php echo $data->kode_kegiatan ?></b><br><br>
        <b>KEGIATAN :</b><br>
        <b><?php echo $data->kegiatan ?></b>
    </center>
    <center>
        <table border="0" style="width: 70%; border-collapse: collapse; ">
            <thead>
                <tr>
                    <th width="30%"></th>
                    <th width="70%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jumlah</td>
                    <td>Rp. <?php echo number_format($total_honor) ?></td>
                </tr>
                <tr>
                    <td>Dengan Huruf</td>
                    <td><?php echo $curency->convertCurrencyToWords($total_honor) ?></td>
                </tr>
                <tr>
                    <td>Berdasarkan</td>
                    <td>SK Kepala Satuan Kerja Pusat Penelitian dan Pengembangan Permukiman</td>
                </tr>
                <tr>
                    <td>Nomor</td>
                    <td><?php echo $data->nomor_pengajuan ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Agenda</td>
                    <td><?php echo $data->acara ?></td>
                </tr>
                <tr>
                    <td>Periode Pembayaran</td>
                    <td><?php echo format_date($data->periode_pembayaran) ?></td>
                </tr>
            </tbody>
        </table>
    </center>
    <table border="1" style="width: 100%; border-collapse: collapse">
        <thead>

            <tr>
                <th width="2%">No</th>
                <th width="12%">Nama</th>
                <th width="3%">Gol</th>
                <th width="6%">Jabatan/Instansi</th>
                <th width="2%">Jumlah Jam</th>
                <th width="6%">Besar Honor Per Jam</th>
                <th width="6%">Jumlah(Rp.)</th>
                <th width="6%">Potongan PPh Pasal 21 (Rp.)</th>
                <th width="6%">Jumlah Bersih Yang Diterima (Rp.)</th>
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
                . "<td>" . $row->golongan . "</td>"
                . "<td>" . $row->jabatan . "</td>"
                . "<td>" . $row->jumlah . "</td>"
                . "<td>" . number_format($row->honor) . "</td>"
                . "<td>" . number_format($jumlah_honor) . "</td>"
                . "<td>" . number_format($pph) . "</td>"
                . "<td>" . number_format($jumlah_bersih) . "</td>"
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
    <table style="width: 100%">
        <tr>
            <td align="center" width="30%">

               MENGETAHUI/MENYETUJUI,<br>
                PEJABAT PEMBUAT KOMITMEN, <br>
                <br>
                <br>
                <br>
                <br>
        <u><strong>Iwan Suprijanto, ST, MT</strong></u><br>
        NIP. 19710930 199803 1 01
        <br>
        </td>

        <td align="center" width="30%">

            &nbsp;<br>
            BENDAHARA, <br>
            <br>
            <br>
            <br>
            <br>
        <u><strong>Drajat Subuhri</strong></u><br>
        NIP. 19680612 200701 1 004
        <br>
        </td>

        <td align="center" width="30%">

            Bandung, <?php echo $format_date->format_date_dfy(date('Y-m-d')) ?><br>
            MENGETAHUI TELAH DIBAYARKAN <br>
            KEPADA YANG BERHAK<br>
            <br>
            <br>
            <br>
        <u><strong>Beben Sugiarti</strong></u><br>
        NIP. 
        <br>
        </td>
        </tr>
    </table>
</body>
</html>
