<?php

function format_date($string) {
    return substr($string, 8, 2) . '-' . substr($string, 5, 2) . '-' . substr($string, 0, 4);
}
?>

<!-- widget-header -->
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>View Data </h3>
    </div>           
    <div class="widget-content" style="padding: 10px;">        
        <table style="width: 100%">
            <tr>
                <td width="12%"><strong>Anggaran</strong></td>
                <td valign="top" width="50%">:&nbsp;<?php echo $data->nama_kegiatan ?> - <?php echo $data->jenis_belanja ?></td>                
            </tr>
            <tr>
                <td><strong>Maksud Perjalanan</strong></td>
                <td valign="top">:&nbsp;<?php echo $data->maksud_perjalanan ?></td>
            </tr>
            <tr>
                <td><strong>Jumlah Kota Tujuan</strong></td>
                <td valign="top">:&nbsp;<?php echo $data->jumlah_tujuan ?></td>
            </tr>
            <tr>
                <td><strong>Jadwal Berangkat</strong></td>
                <td valign="top">:&nbsp;
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
                <td><strong>Jadwal Pulang</strong></td>
                <td valign="top">:&nbsp;
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
                <td><strong>Kota Tujuan</strong></td>
                <td valign="top">:&nbsp;
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
        </table> 

    </div>
    <div class="widget-content" style="padding: 10px;">        
        <?php $this->load->view('admin/transaksi/panjar/list_view') ?>
    </div>
</div>
<!-- /widget-header --> 
