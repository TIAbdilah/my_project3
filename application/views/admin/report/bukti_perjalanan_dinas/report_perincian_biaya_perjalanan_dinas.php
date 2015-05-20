<html>
    <body>
        <table>
            <tr>
                <td>
                    <img style="float: left" height="20%" width="65%" src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/esatker/assets/img/' ?>header surat.jpg" />
                </td>
                <td>
                    <table style="border-collapse: collapse" border="1">
                        <tr>
                            <td>1. Kode SATKER</td>
                            <td>622319</td>
                        </tr>
                        <tr>
                            <td>2. Tahun Anggaran</td>
                            <td>2015</td>
                        </tr>
                        <tr>
                            <td>3. Pembebanan</td>
                            <td>DIPA</td>
                        </tr>
                        <tr>
                            <td>4. Tolak Ukur / Kegiatan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5. Mata Anggaran</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6. No. Urut B.K.U</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7. Tanggal Pembukuan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8. Paraf</td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

<!--<img style="float: left" height="20%" width="75%" src="<?php echo base_url() . '/assets/img/' ?>header surat.jpg" />-->

    <center>
        <h3>PERINCIAN BIAYA PERJALANAN DINAS</h3>
    </center>
    <table style="width:100%">
        <tr>
            <td width="25%"><div align="left">Lampiran SPPD Nomor</div></td>
            <td width="2%"><div align="center">:</div></td>
            <td width="73%"><div align="left"><?php echo $data_perjalanan_dinas->no_spt ?></div></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><div align="center">:</div></td>
            <td><?php echo $format_date->format_date_dfy($data_perjalanan_dinas->tanggal_approval) ?></td>
        </tr>
    </table>
    <table style="width:100%;border-collapse: collapse" border="1">
        <tr>
            <td width="5%"><div align="center">NO</div></td>
            <td width="40%"><div align="center">PERINCIAN BIAYA</div></td>
            <td width="25%"><div align="center">JUMLAH</div></td>
            <td width="30%"><div align="center">KETERANGAN</div></td>
        </tr>
        <?php
        $no = 1;
        $total_biaya = 0;
        foreach ($list_data_bukti as $data) {
            if ($data->jumlah_bukti != 0) {
                echo "<tr>"
                . "<td align=\"center\">" . $no . "</td>";
                echo "<td>";
                switch ($data->jenis_biaya) {
                    case 'harian':
                        echo "Biaya uang harian di kota " . $data->kota_tujuan;
                        break;
                    case 'penginapan':
                        echo "Biaya penginapan di kota " . $data->kota_tujuan;
                        break;
                    case 'transport_utama':
                        echo "Biaya tiket perjalanan ke kota " . $data->kota_tujuan;
                        break;
                    case 'transport_pendukung':
                        echo "Biaya transport pendukung di kota " . $data->kota_tujuan;
                        break;
                    case 'representatif':
                        echo "Uang representatif di kota " . $data->kota_tujuan;
                        break;
                    case 'diklat':
                        echo "Uang diklat di kota " . $data->kota_tujuan;
                        break;
                    case 'sewa':
                        echo "Uang sewa di kota " . $data->kota_tujuan;
                        break;
                    default:
                        echo "Biaya pengeluaran riil di kota " . $data->kota_tujuan;
                        break;
                }
                echo"</td>";
                echo "<td align=\"right\">" . number_format($data->jumlah_bukti) . "</td>"
                . "<td>&nbsp;</td>"
                . "</tr>";
                $no++;
                $total_biaya += $data->biaya;
            }
        }
        ?>

        <tr>
            <td colspan="2"><div align="right">Jumlah :</div></td>
            <td align="right">Rp. <?php echo number_format($total_biaya) ?></td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <p>Terbilang : <strong><?php echo $curency->convertCurrencyToWords($total_biaya) ?></strong></p>
    <br>
    <table style="width: 100%">
        <tr>
            <td align="center" width="50%"> 
                Bendahara Pengeluaran,<br>
                <br>
                <br>
                <br>
                <br>
                Drajat Subuhri<br>
                NIP. 1996806122007011004<br>
            </td>
            <td align="center" width="50%"> 
                Bandung, <?php echo $format_date->format_date_dfy($data_perjalanan_dinas->tanggal_approval) ?><br>
                Yang melakukan perjalanan,<br>
                <br>
                <br>
                <br>
                <?php echo $data_pegawai->nama ?><br>
                NIP.&nbsp;<?php echo $data_pegawai->nip ?><br>
            </td>
        </tr>
    </table>
    <br>
    <hr>
    <br>
    <center><h3>PERHITUNGAN SPPD RAMPUNG</h3></center><br>
    <table style="width: 100%">
        <tr>
            <td valign="top" width="35%">Ditetapkan sejumlah</td>
            <td>: Rp. <?php echo number_format($total_biaya) ?></td>
        </tr>
        <tr>
            <td valign="top">Telah dibayar sebesar</td>
            <td valign="top">: Rp. 
                <?php
                if (!empty($data_detail_panjar->jumlah)) {
                    echo number_format($data_detail_panjar->jumlah);
                } else {
                    echo '0';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td valign="top">Sisa kurang/lebih</td>
            <?php
            if (!empty($data_detail_panjar->jumlah)) {
                $sisa = $total_biaya - $data_detail_panjar->jumlah;
            } else {
                $sisa = $total_biaya;
            }
            ?>
            <td>: Rp. <?php echo number_format($sisa) ?></td>
        </tr>
    </table><br><br>
    <table style="width: 100%">
        <tr>
            <td align="center" width="50%"><br>
                <br>
                <br>
                <br>

            </td>
            <td align="center" width="50%"><br>
                An. Kepala Satuan Kerja<br>
                Pejabat Pembuat Komitmen<br>
                <br>
                <br>
                <br>
                <br>
                Iwan Suprijanto, ST, MT<br>
                NIP: 197109301998031001
            </td>
        </tr>
    </table>
</body>
</html>
