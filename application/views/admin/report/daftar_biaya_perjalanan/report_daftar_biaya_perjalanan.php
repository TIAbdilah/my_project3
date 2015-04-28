<html>
    <body>
    <center>
        <h3><u>DAFTAR NOMINATIF PERJALANAN DINAS</u></h3>
        <p>Nomor : 82492349287307347297</p>
        <p>
            <label><br>
            </label>
        </p>
    </center>
    <table style="width:100%">
        <tr>
            <td width="21%"><div align="left">1. Kode Kantor/Satker</div></td>
            <td width="2%"><div align="center">:</div></td>
            <td width="77%"><div align="left"></div></td>
        </tr>
        <tr>
            <td>2. Nama Kantor/Satker</td>
            <td><div align="center">:</div></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>3. Tanggal dan Nomor DIPA</td>
            <td><div align="center">:</div></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>4. Jenis Belanja</td>
            <td><div align="center">:</div></td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <p>&nbsp;</p>
    <table style="width:100%" border="1">
        <thead>
            <tr>
                <th rowspan="2" width="3%">No</th>
                <th rowspan="2" width="15%">Nama</th>
                <th rowspan="2" width="8%">Gol</th>
                <th rowspan="2" width="15%">Jabatan</th>
                <th rowspan="2" width="8%">Tujuan</th>
                <th colspan="2">Tanggal</th>
                <th rowspan="2" width="8%">Lama Perj. Dinas</th>
                <th colspan="5">Rincian Kebutuhan Dana (Rp)</th>
                <th rowspan="2"  width="3%" class="td-actions">Keterangan</th>
            </tr>
            <tr>
                <th width="8%">Berangkat</th>
                <th width="8%">Kembali</th>

                <th width="6%">Uang Harian</th>
                <th width="6%">Uang Ref</th>
                <th width="6%">Trans</th>
                <th width="6%">Penginapan</th>
                <th width="6%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $subtotal_transport = 0;
            $subtotal = 0;
            $total = 0;
            foreach ($list_data_detail as $data) {
                $subtotal_transport = $data->transport_utama + $data->transport_pendukung;
                $subtotal = $data->harian + $data->representatif + $subtotal_transport + $data->penginapan + $data->riil;
                echo "<tr>"
                . "<td>" . $no . "</td>"
                . "<td>" . $data->nama_pegawai . " </td>"
                . "<td>" . $data->golongan . "</td>"
                . "<td>" . $data->jabatan . "</td>"
                . "<td>" . $data->nama_kota . "</td>"
                . "<td>" . $data->tgl_berangkat . "</td>"
                . "<td>" . $data->tgl_pulang . "</td>"
                . "<td>" . number_format($data->harian) . "</td>"
                . "<td>" . number_format($data->representatif) . "</td>"
                . "<td>" . number_format($subtotal_transport) . "</td>"
                . "<td>" . number_format($data->penginapan) . "</td>"
                . "<td>" . number_format($data->riil) . "</td>"
                . "<td>" . number_format($subtotal) . "</td>"
                . "<td class=\"td-actions\">";                
                echo "</td>"
                . "</tr>";
                $no++;
                $total += $subtotal;
            }
            ?>

        </tbody>
    </table>
    <table style="width: 100%">
        <tr>
            <td align="center" width="50%"><br>
                <p>KPPN Bandung II<br>
                    Kepala Seksi Pencairan Dana</p>

                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p><br>
                    ......................................<br>
                    <br>

                </p></td>
            <td align="center" width="50%"><p>Bandung, .........<br>
                    PEJABAT PEMBUAT KOMITMEN<br>
                    <br>
                </p>
                <p>&nbsp;</p>
                <p>Iwan Suprijanto, ST, MT<br>
                    NIP: 197109301998031001 <br>
                    <br>
                </p></td>
        </tr>
    </table>
</body>
</html>
