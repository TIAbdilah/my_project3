<html>
    <body>
    <center>
        <img height="20%" width="100%" src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/esatker/assets/img/' ?>header surat.jpg" />
    </center>
    <center>
        <h3>DAFTAR PENGELUARAN RIIL</h3>
        <p>&nbsp;</p>
    </center>
    <p>Yang bertanda tangan di bawah ini :
        <label><br>
        </label>
    </p>
    <table style="width:100%">
        <tr>
            <td width="21%"><div align="left">Nama</div></td>
            <td width="2%"><div align="center">:</div></td>
            <td width="77%"><div align="left"><?php echo $data_pegawai->nama ?></div></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td><div align="center">:</div></td>
            <td><?php echo $data_pegawai->nip ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><div align="center">:</div></td>
            <td><?php echo $data_pegawai->jabatan ?></td>
        </tr>
    </table>
    <?php
    $tgl_app = $data_perjalanan_dinas->tanggal_approval;
    if ($tgl_app == '0000-00-00') {
        $tgl_app = date('Y-m-d');
    }
    ?>
    <p>berdasarkan Surat Perintah Perjalanan Dinas (SPPD) Nomor <strong><?php echo $data_perjalanan_dinas->no_spt ?></strong> tanggal, <strong><?php echo $format_date->format_date_dfy($tgl_app) ?></strong> dengan ini kami menyatakan dengan sesungguhnya bahwa :</p>
    <p>1. Biaya transport pegawai dan/atau biaya penginapan di bawah ini yang tidak dapat diperoleh bukti-bukti pengeluarannya, meliputi :</p>
    <table style="width:100%;border-collapse: collapse" border="1">
        <tr>
            <td width="5%"><div align="center">No</div></td>
            <td width="70%"><div align="center">Uraian</div></td>
            <td width="25%"><div align="center">Jumlah (Rp.)</div></td>
        </tr>
        <?php
        $no = 1;
        $total_riil = 0;
        $tanggal_entri = "";
        foreach ($list_data_bukti_riil as $data) {
            if (!empty($data->nomor_bukti)) {
                echo "<tr>"
                . "<td>" . $no . "</td>"
                . "<td>" . $data->nomor_bukti . "</td>"
                . "<td align=\"right\">" . number_format($data->jumlah_bukti) . "</td>"
                . "</tr>";
                $no++;
                $tanggal_entri = $data->tgl_entri_bukti;
                $total_riil += $data->jumlah_bukti;
            }
        }
        ?>
        <tr>
            <td>&nbsp;</td>
            <td><div align="center">Jumlah (Rp)</div></td>
            <td align="right"><?php echo number_format($total_riil) ?></td>
        </tr>
    </table>

    <p>2. Jumlah urang tersebut pada angka 1 di atas benar-benar dikeluarkan untuk pelaksanaan perjalanan dinas dimaksud dan apabila di kemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke Kas Negara.</p>
    <p>&nbsp;</p>
    <p>Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.<br>

    </p>
    <table style="width: 100%">
        <tr>
            <td align="center" width="50%"><br>
                <br>
                <p>Mengetahui/menyetujui<br>
                    An. Kepala Satuan Kerja<br>
                    Pejabat Pembuat Komitmen,</p>

                <p>&nbsp;</p>
                <p><br>
                    Iwan Suprijanto, ST, MT<br>
                    NIP: 197109301998031001 </p>
                <br>
                <br>

            </td>
            <?php
            if (empty($tanggal_entri)) {
                $tanggal_entri = date('Y-m-d');
            }
            ?>
            <td align="center" width="50%"><p>Bandung, <?php echo $format_date->format_date_dfy($tanggal_entri) ?><br>
                    Yang melakukan perjalanan,<br>
                    <br>
                </p>
                <p>&nbsp;</p>
                <p><?php echo $data_pegawai->nama ?></p>
                <p>NIP. <?php echo $data_pegawai->nip ?><br>
                    <br>
                </p></td>
        </tr>
    </table>
</body>
</html>
