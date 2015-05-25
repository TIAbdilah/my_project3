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
        <h2>K U I T A N S I</h2>
    </center>
    <table style="width:100%">
        <tr>
            <td width="25%"><div align="left">Sudah Terima dari</div></td>
            <td width="2%"><div align="center">:</div></td>
            <td width="73%"><div align="left">Kepala Satuan Kerja Pusat Litbang Permukiman</div></td>
        </tr>
        <tr>
            <td>Uang Sebesar</td>
            <td><div align="center">:</div></td>
            <?php
            $total = 0;
            $tanggal_entri = "";
            foreach ($data_kuitansi as $data) {
                $total += $data->biaya;
                $tanggal_entri = $data->tgl_entri_bukti;
            }
            ?>
            <td>Rp. <?php echo number_format($total) ?></td>
        </tr>
        <tr>
            <td>Untuk Pembayaran SPPD</td>
            <td><div align="center">:</div></td>
            <td><?php echo $data_header->no_spt ?></td>
        </tr>
        <tr>
            <td>Terbilang</td>
            <td><div align="center">:</div></td>            
            <td><?php echo $curency->convertCurrencyToWords($total) ?></td>
        </tr>
    </table>
    <br><br>
    <table style="width: 100%">
        <tr>
            <td v-align="top" align="center" width="30%"> 
                Mengetahui,<br>
                An. Kepala Satuan Kerja<br>
                Pejabat Pembuat Komitmen<br>
                <br><br><br>
                Iwan Suprijanto, ST, MT<br>
                NIP: 197109301998031001                
            </td>
            <td v-align="top" align="center" width="30%"> 
                Bendahara Pengeluaran,<br>
                <br>
                <br>
                <br><br><br>
                Drajat Subuhri<br>
                NIP. 196806122007011004
            </td>
            <td v-align="top" align="center" width="30%"> 
                <?php 
                    if(empty($tanggal_entri)){
                        $tanggal_entri = date('Y-m-d');
                    }
                ?>
                Bandung, <?php echo $format_date->format_date_dfy($tanggal_entri) ?><br>
                Yang menerima,<br>
                <br>
                <br><br><br>
                <?php echo $data_pegawai->nama ?></br>
                NIP. <?php echo $data_pegawai->nip ?>
            </td>
        </tr>
    </table>
    <br><br>
    <hr>
</body>
</html>
