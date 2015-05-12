<html>
    <head>

    </head>
    <body>
    <center>
        <h3><u>DAFTAR NOMINATIF PERJALANAN DINAS</u></h3>
        <p>Nomor : <?php echo $data_header->no_spt ?></p>
        <p>
            <label><br>
            </label>
        </p>
    </center>
    <table style="width:100%">
        <tr>
            <td width="21%"><div align="left">1. Kode Kantor/Satker</div></td>
            <td width="2%"><div align="center">:</div></td>
            <td width="77%"><div align="left">0123/12312/12/313/1</div></td>
        </tr>
        <tr>
            <td>2. Nama Kantor/Satker</td>
            <td><div align="center">:</div></td>
            <td>Satuan Kerja Satu Dua dan Tiga</td>
        </tr>
        <tr>
            <td>3. Tanggal dan Nomor DIPA</td>
            <td><div align="center">:</div></td>
            <td><?php echo $data_header->no_spt . ' yang di setujui pada tanggal ' . $format_date->format_date_dfy($data_header->tanggal_approval) ?></td>
        </tr>
        <tr>
            <td>4. Jenis Belanja</td>
            <td><div align="center">:</div></td>
            <td><?php echo $data_header->jenis_belanja ?></td>
        </tr>
    </table>
    <p>&nbsp;</p>
    <table style="width:100%;border-collapse: collapse" border="1">
        <thead>
            <tr>
                <th rowspan="2" width="3%">No</th>
                <th rowspan="2" width="12%">Nama</th>
                <th rowspan="2" width="5%">Gol</th>
                <th rowspan="2" width="12%">Jabatan</th>
                <th rowspan="2" width="7%">Tujuan</th>
                <th colspan="2">Tanggal</th>
                <th rowspan="2" width="5%">Lama Perj. Dinas</th>
                <th colspan="7">Rincian Kebutuhan Dana (Rp)</th>
                <!--<th rowspan="2"  width="3%" class="td-actions">Keterangan</th>-->
            </tr>
            <tr>
                <th width="7%">Berangkat</th>
                <th width="7%">Kembali</th>

                <th width="6%">Uang Harian</th>
                <th width="6%">Uang Ref</th>
                <th width="6%">Trans</th>
                <th width="6%">Penginapan</th>
                <th width="6%">Diklat</th>
                <th width="6%">Sewa</th>
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
                . "<td align=\"center\">" . $data->golongan . "</td>"
                . "<td>" . $data->jabatan . "</td>"
                . "<td align=\"center\">" . $data->kota_tujuan . "</td>"
                . "<td align=\"center\">" . $format_date->format_date_dmy($data->tgl_berangkat) . "</td>"
                . "<td align=\"center\">" . $format_date->format_date_dmy($data->tgl_pulang) . "</td>"
                . "<td align=\"center\">" . $data->lama_hari . "</td>"
                . "<td align=\"right\">" . number_format($data->harian) . "</td>"
                . "<td align=\"right\">" . number_format($data->representatif) . "</td>"
                . "<td align=\"right\">" . number_format($subtotal_transport) . "</td>"
                . "<td align=\"right\">" . number_format($data->penginapan) . "</td>"
                . "<td align=\"right\">" . number_format($data->penginapan) . "</td>"
                . "<td align=\"right\">" . number_format($data->penginapan) . "</td>"
                . "<td align=\"right\">" . number_format($subtotal) . "</td>"
                //. "<td></td>"
                . "</tr>";
                $no++;
                $total += $subtotal;
            }
            ?>
            <tr>
                <td colspan="14" align="center"><strong>Total</strong></td>
                <td align="right"><?php echo number_format($total)?></td>
            </tr>
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

                </p>
            </td>
            <td align="center" width="50%">
                <p>
                    Bandung, <?php echo $format_date->format_date_dfy($data_header->tanggal_approval) ?><br>
                    PEJABAT PEMBUAT KOMITMEN<br>
                    <br>
                </p>
                <p>&nbsp;</p>
                <p><u>Iwan Suprijanto, ST, MT</u><br>
        NIP: 197109301998031001 <br>
        <br>
        </p>
        </td>
        </tr>
    </table>
</body>
</html>
