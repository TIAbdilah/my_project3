<?php

function format_date($string) {
    return substr($string, 8, 2) . '-' . substr($string, 5, 2) . '-' . substr($string, 0, 4);
}
?>
<html>
    <body>
    <center>
        <img height="20%" width="100%" src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/esatker/assets/img/' ?>header surat.jpg" />
    </center>
    <center>
        <h3>SURAT PERINTAH TUGAS</h3>
    </center>
    <table style="width:100%">
        <tr>
            <td width="20%">Kepada</td>
            <td>: Asisten Administrasi</td>
        </tr>
        <tr>
            <td>Dari</td>
            <td>: An. Kepala Satuan Kerja, Pejabat Pembuat Komitmen</td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>: Perintah Perjalanan Tugas</td>
        </tr>
    </table>
    <hr>
    Harap dibuat SURAT PERINTAH PERJALANAN DINAS (SPPD) untuk :<br>
    <ol>
        <?php
        $nama_pegawai = '';
        foreach ($list_data as $record) {
            if ($nama_pegawai != $record->nama_pegawai)
                echo '<li>' . $record->nama_pegawai . '</li>';
            $nama_pegawai = $record->nama_pegawai;
        }
        ?>    
    </ol> 
    <table style="width: 100%">
        <tr>
            <td valign="top" width="35%">Tujuan Perjalanan Dinas ke</td>
            <td>:&nbsp;
                    <?php
                    if ($data->jumlah_tujuan == 1) {
                        echo $data->nama_kota_tujuan_1;
                    } else if ($data->jumlah_tujuan == 2) {
                        echo $data->nama_kota_tujuan_1 . ' / ' . $data->nama_kota_tujuan_2;
                    } else if ($data->jumlah_tujuan == 3) {
                        echo $data->nama_kota_tujuan_1 . ' / ' . $data->nama_kota_tujuan_2 . ' / ' . $data->nama_kota_tujuan_3;
                    }
                    ?>
            </td>
        </tr>
        <tr>
            <td valign="top">Maksud Perjalanan Dinas</td>
            <td valign="top">: <?php echo $data->maksud_perjalanan ?></td>
        </tr>
        <tr>
            <td valign="top">Tanggal Berangkat</td>
            <td>:&nbsp;
                <?php
                if ($data->jumlah_tujuan == 1) {
                    echo format_date($data->jadwal_berangkat_1);
                } else if ($data->jumlah_tujuan == 2) {
                    echo format_date($data->jadwal_berangkat_1) . ' / ' . format_date($data->jadwal_berangkat_2);
                } else if ($data->jumlah_tujuan == 3) {
                    echo format_date($data->jadwal_berangkat_1) . ' / ' . format_date($data->jadwal_berangkat_2) . ' / ' . format_date($data->jadwal_berangkat_3);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td valign="top">Tanggal Kembali</td>
            <td>:&nbsp;
                <?php
                if ($data->jumlah_tujuan == 1) {
                    echo format_date($data->jadwal_pulang_1);
                } else if ($data->jumlah_tujuan == 2) {
                    echo format_date($data->jadwal_pulang_1) . ' / ' . format_date($data->jadwal_pulang_2);
                } else if ($data->jumlah_tujuan == 3) {
                    echo format_date($data->jadwal_pulang_1) . ' / ' . format_date($data->jadwal_pulang_2) . ' / ' . format_date($data->jadwal_pulang_3);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td valign="top">Kendaraan</td>
            <td>: Kereta/Pesawat/dll</td>
        </tr>
        <tr>
            <td valign="top">Pembebanan Biaya</td>
            <td>: </td>
        </tr>
    </table><br><br>
    <table style="width: 100%">
        <tr>
            <td align="center" width="50%">
                Mengetahui/Menyetujui<br>
                Kepala <?php echo $data_unit->nama_unit ?><br>
                <br>
                <br>
                <br>
                <br>
                <?php echo $data_unit->nama_pegawai ?>
            </td>
            <td align="center" width="50%">
                Bandung, <?php echo date('d F Y') ?><br>
                An. Kepala Satuan Kerja<br>
                Pejabat Pembuat Komitmen<br>
                <br>
                <br>
                <br>
                <br>
                Iwan Suprijanto, ST, MT<br>
                NIP: 1237162381623868
            </td>
        </tr>
    </table>
</body>
</html>
