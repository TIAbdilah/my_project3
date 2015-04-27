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
                <td width="10%"><strong>Anggaran</strong></td>
                <td valign="top" width="50%">:&nbsp;<?php echo $data->id_anggaran ?></td>
                <td valign="top" width="40%" rowspan="6">
                    <?php if ($this->session->userdata('role') != 'operator') { ?>
                        <strong>Verifikasi</strong><br>
                        <textarea style="width: 95%" rows="2" placeholder="Alasan Penolakan"></textarea><br>
                        <a href="#" class="btn btn-mini btn-success">
                            <i class="btn-icon-only icon-ok"></i>Setujui
                        </a>
                        <a href="#" class="btn btn-danger btn-mini">
                            <i class="btn-icon-only icon-remove"></i>Tolak
                        </a><br>
                    <?php } else { ?>
                        <strong>Ajukan</strong><br>

                        <a href="#" class="btn btn-block btn-success">
                            <i class="icon-ok "></i>&nbsp; Ya
                        </a>                        
                    <?php } ?>
                    <span class="pull-right"><a href="#">alasan penolakan</a></span>
                </td>
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
                        echo $data->jadwal_berangkat_1;
                    } else if ($data->jumlah_tujuan == 2) {
                        echo $data->jadwal_berangkat_1 . ' / ' . $data->jadwal_berangkat_2;
                    } else if ($data->jumlah_tujuan == 3) {
                        echo $data->jadwal_berangkat_1 . ' / ' . $data->jadwal_berangkat_2 . ' / ' . $data->jadwal_berangkat_3;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><strong>Jadwal Pulang</strong></td>
                <td valign="top">:&nbsp;
                    <?php
                    if ($data->jumlah_tujuan == 1) {
                        echo $data->jadwal_pulang_1;
                    } else if ($data->jumlah_tujuan == 2) {
                        echo $data->jadwal_pulang_1 . ' / ' . $data->jadwal_pulang_2;
                    } else if ($data->jumlah_tujuan == 3) {
                        echo $data->jadwal_pulang_1 . ' / ' . $data->jadwal_pulang_2 . ' / ' . $data->jadwal_pulang_3;
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
        <?php $this->load->view('admin/transaksi/detail_perjalanan_dinas/list')?>
    </div>
</div>
<!-- /widget-header --> 
