<html>
    <body>
    <center>
        <img height="20%" width="100%" src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/esatker/assets/img/' ?>header surat.jpg" />
    </center>
    <table style="width:100%">
        <tr>
            <td width="20%">Nomor</td>
            <td>: <?php echo $data_report->nomor_pengajuan ?></td>
            <td><?php echo $data_report->kode_kegiatan; ?></td>
        </tr>
        <tr>
            <td width="20%">Tanggal</td>
            <td>: <?php echo date('d M Y')?></td>
            <td></td>
        </tr>
        <tr>
            <td width="20%">Lampiran</td>
            <td>: 1 berkas</td>
            <td></td>
        </tr>
    </table>
    <center>
        <h3>NOTA DINAS</h3>
    </center>
    <table style="width:100%">
        <tr>
            <td width="20%">Kepada</td>
            <td>: Pejabat Pembuat Komitmen</td>
        </tr>
        <tr>
            <td>Cc</td>
            <td>: - Kepala Satker Puslitbang Permukiman</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>: - Asisten Administrasi dan Keuangan</td>
        </tr>
        <tr>
            <td>Dari</td>
            <td>: Kasubbid Program dan Evaluasi </td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>: Pengajuan Pengadaan Bahan ATK dan Bahan Komputer</td>
        </tr>
    </table>
    <hr>
    <p>Dalam rangka pelaksanaan kegiatan Pengembangan Data Center Tahun 2015, bersama ini kami mengusulkan pengajuan pengadaan bahan ATK dan bahan Komputer, yang akan kami bebankan kepada <b><?php echo $data_report->kode_kegiatan; ?></b> (rincian terlampir).</p>
    <p>Demikianlah nota dinas ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>

    <table style="width: 100%">
        <tr>
            <td align="center" width="50%">
                Mengetahui<br>
                Kepala Bidang Program  dan Kerjasama <br>
                <br>
                <br>
                <br>
                <br>
        <u><strong>Iwan Suprijanto, ST, MT</strong></u><br>
        NIP: 197109301998031001
        <br>
        </td>
        <td align="center" width="50%">
            &nbsp;<br>
            Kasubbid Program & Evaluasi <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        <u><strong>Sugeng Paryanto,ST.MT</strong></u><br>
        NIP. 19710402 199803 1 003
        <br>
        </td>
        </tr>
    </table>
</body>
</html>
