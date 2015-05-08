<html>
    <body>
    <center>
        <img height="20%" width="100%" src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/esatker/assets/img/' ?>header surat.jpg" />
    </center>
    <center>
        <h3><u>UANG MUKA KERJA</u></h3>
        <p>Panjar Kerja</p>
        <p>&nbsp;</p>
        <label><br>
        </label>
    </center>
    <table style="width:100%">
        <tr>
            <td width="21%">Sudah terima dari</td>
            <td width="2%">:</td>
            <td width="77%">Kepala Satuan Kerja Pusat Penelitian dan Pengembangan Permukiman</td>
        </tr>
        <tr>
            <td>Banyaknya uang (rupiah)</td>
            <td>:</td>
            <td><?php echo $curency->convertCurrencyToWords($data_panjar->jml_panjar)?></td>
        </tr>
        <tr>
            <td>Untuk pembayaran</td>
            <td>:</td>
            <td><?php echo $data_panjar->deskripsi_panjar?></td>
        </tr>
    </table>
    <p><u>Jumlah Rp.</u><?php echo number_format($data_panjar->jml_panjar)?></p>

<table style="width: 100%">
    <tr>
        <td valign="top" align="center" width="30%">
            <p>Mengetahui/menyetujui<br>
                <strong>An. Kepala Satuan Kerja</strong><br>
                Pejabat Pembuat Komitmen,</p>
            <p>&nbsp;</p>
            <p><br>
                <strong><u>Iwan Suprijanto, ST, MT</u></strong><br>
                NIP: 197109301998031001 </p>
            <br>
            <br>
        </td>
        <td valign="top" align="center" width="30%">
            <p>Setuju Bayar<br>
                Bendahara Pengeluaran,<br>
            </p>
            <p>&nbsp;</p>
            <p><strong><u>Drajat Subuhri</u></strong><br>
                NIP. 1983200423042023201<br>
                <br>
            </p></td>
        <td valign="top" align="center" width="30%">
            <p>Bandung, <?php echo $format_date->format_date_dfy($data_header->tanggal_approval)?><br>
                Yang menerima,</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p><strong><?php echo $data_panjar->nama_penerima?></strong></p></td>
    </tr>
</table>
<p>CATATAN :<br>
</p>
<ol>
    <li>Uang muka/panjar ini harap dipertanggung jawabkan dengan Kwitansi dalam wktu 3 (tiga) hari kerja setelah uang muka dierima.</li>
    <li>Uang muka/panjar untuk pengadaan/pembelian barang mulai dari Rp. 250.000,- pertanggung jawaban (kwitansi) harus dari pengusaha/rekanan yang mempunyai NPWP/faktur pajak dilengkapi dengan materai tempel Rp. 3.000,- dan untuk pengadaan/pembelian barang dengan nilai Rp. 1.000.000,- ke atas dilengkapi dengan meterai Rp. 6.000,-</li>
    <li>Uang muka/panjar untuk pengadaan/pembelian barang dengan nilai Rp. 1.000.000,- ke atas dikenakan pajak sesuai dengan ketentuan yang berlaku.</li>
    <li>Tidak diperkenankan meminta uang muka/panjar kembali apabila uang muka terdahulu belum dipertanggung-jawabkan.</li>
    <li>Bukti kwitansi dan nota/faktur harus mencantumkan dengan jelas : Cap Perusahaan, Tanda Tangan dan Nama Jelas Pengusahanya.</li>
</ol>
</body>
</html>
