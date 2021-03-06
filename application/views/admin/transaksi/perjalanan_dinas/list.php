
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Anggaran</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('transaksi/perjalanan_dinas/add') ?>" role="button" class="btn">Tambah Pengajuan Perjalanan Dinas</a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">        
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No</th>
                    <th width="15%"> No SPT</th>
                    <th width="25%"> Maksud</th>                    
                    <th width="15%"> Kota Tujuan</th>
                    <th width="15%"> Tanggal</th>
                    <th width="10%"> Status</th>
                    <th width="15%" class="td-actions">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->no_spt . " </td>"
                    . "<td>" . $row->maksud_perjalanan . "</td>";
                    if ($row->jumlah_tujuan == 1) {
                        echo "<td>" . $row->nama_kota_tujuan_1 . "</td>";
                    } else if ($row->jumlah_tujuan == 2) {
                        echo "<td>" . $row->nama_kota_tujuan_1 . ' - ' . $row->nama_kota_tujuan_2 . "</td>";
                    } else if ($row->jumlah_tujuan == 3) {
                        echo "<td>" . $row->nama_kota_tujuan_1 . ' - ' . $row->nama_kota_tujuan_2 . ' - ' . $row->nama_kota_tujuan_3 . "</td>";
                    }
                    $ber = $row->jadwal_berangkat_1;
                    $pul = $row->jadwal_pulang_1;
                    if ($row->jadwal_pulang_2 != '0000-00-00' && $row->jadwal_pulang_2 != null) {
                        $pul = $row->jadwal_pulang_2;
                    }
                    if ($row->jadwal_pulang_3 != '0000-00-00' && $row->jadwal_pulang_3 != null) {
                        $pul = $row->jadwal_pulang_3;
                    }
                    echo "<td>" . $ber . " - " . $pul . "</td>"
                    . "<td>" . $array_custom->status_approval[$row->status] . "</td>"
                    . "<td class=\"td-actions\">";
                    if ($row->status == 5 && $this->session->userdata('role') == 'operator') {
                        echo "<a title=\"Report (Surat Perintah Tugas)\" target=\"_blank\" href=\"" . site_url('report/surat_perintah_tugas/view/' . $row->id) . "\" class=\"btn btn-mini btn-info\"><i class=\"btn-icon-only icon-print\"></i></a>";
                        echo "<a title=\"Report (Daftar Biaya Perjalanan Dinas)\" target=\"_blank\" href=\"" . site_url('report/daftar_biaya_perjalanan/view/' . $row->id) . "\" class=\"btn btn-mini btn-inverse\"><i class=\"btn-icon-only icon-print\"></i></a>";
                    }
                    echo "<a title=\"View\" href=\"" . site_url('transaksi/perjalanan_dinas/view/' . $row->id . '/' . $row->jumlah_tujuan) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-file\"></i></a>";
                    if ($row->status == 0 && $this->session->userdata('role') == 'operator') {
                        echo "<a title=\"Edit\" href=\"" . site_url('transaksi/perjalanan_dinas/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>";
                        echo "<a title=\"Delete\" href=\"" . site_url('transaksi/perjalanan_dinas/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>";
                    }
                    echo "</td>"
                    . "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>