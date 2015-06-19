
<?php if ($perjalanan_dinas_ditolak) { ?>
    <div class="alert alert-danger" role="alert" align="center"><B>ADA PENGAJUAN PERJALANAN DINAS YANG DITOLAK</B></div>
<?php } ?>
<?php if ($barang_ditolak) { ?>
    <div class="alert alert-danger" role="alert" align="center"><B>ADA PENGAJUAN BARANG YANG DITOLAK</B></div>
<?php } ?>
<?php if ($honorarium_ditolak) { ?>
    <div class="alert alert-danger" role="alert" align="center"><B>ADA PENGAJUAN HONORARIUM YANG DITOLAK</B></div>
<?php } ?>
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Seranai Tugas</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">

        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#ppd">Pengajuan Perjalanan Dinas</a></li>
            <li><a href="#pb">Pengajuan Barang</a></li>
            <li><a href="#pj">Pengajuan Jasa</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="ppd">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"> No</th>
                            <th width="15%"> No SPT</th>
                            <th width="20%"> Maksud</th>                    
                            <th width="15%"> Kota Tujuan</th>
                            <th width="15%"> Tanggal</th>
                            <th width="7%"> Status</th>
                            <th width="8%"> Status Penolakan</th>
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
                            echo "<td class=\"dt-center\">" . $format_date->format_date_dmy($ber) . " - " . $format_date->format_date_dmy($pul) . "</td>"
                            . "<td>" . $status_approval[$row->status] . "</td>"
                            . "<td>" . $status_penolakan[$row->status_penolakan] . "</td>"
                            . "<td class=\"td-actions\">";
                            if ($row->status == 5 && $this->session->userdata('role') == 'operator') {
                                echo "<a title=\"Report (Surat Perintah Tugas)\" href=\"" . site_url('report/surat_perintah_tugas/view/' . $row->id) . "\" class=\"btn btn-mini btn-info\"><i class=\"btn-icon-only icon-print\"></i></a>";
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
            <div class="tab-pane" id="pb">
                <table id="example11" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"> No</th>
                            <th width="15%"> No Pengajuan</th>
                            <th width="20%"> Nama Anggaran</th>
                            <th width="15%"> Maksud Kegiatan</th>
                            <th width="15%"> Tanggal Pengajuan</th>
                            <th width="10%"> Status</th>
                            <th width="10%"> Status Penolakan</th>
                            <th width="30%" class="td-actions">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_data_barang as $row) {
                            echo "<tr>"
                            . "<td>" . $no . "</td>"
                            . "<td>" . $row->nomor_pengajuan . " </td>"
                            . "<td>" . $row->nama_kegiatan . "</td>"
                            . "<td>" . $row->maksud_kegiatan . "</td>"
                            . "<td class=\"dt-center\">" . $format_date->format_date_dmy($row->tanggal_pengajuan) . "</td>"
                            . "<td>" . $status[$row->status_approval] . "</td>"
                            . "<td>" . $status_penolakan[$row->status_penolakan] . "</td>"
                            . "<td class=\"td-actions\">";

                            if ($row->status_approval == 5 && $this->session->userdata('role') == 'operator') {
                                echo "<a title=\"Report (Surat Perintah Tugas)\" href=\"" . site_url('report/surat_perintah_tugas/view/' . $row->id) . "\" class=\"btn btn-mini btn-info\"><i class=\"btn-icon-only icon-print\"></i></a>";
                                echo "<a title=\"Report (Daftar Biaya Perjalanan Dinas)\" href=\"" . site_url('report/daftar_biaya_perjalanan/view/' . $row->id) . "\" class=\"btn btn-mini btn-inverse\"><i class=\"btn-icon-only icon-print\"></i></a>";
                            }
                            echo "<a title=\"View\" href=\"" . site_url('transaksi/pengajuan_barang/view/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-file\"></i></a>";
                            if ($row->status_approval == 0 && $this->session->userdata('role') == 'operator') {
                                echo "<a title=\"Edit\" href=\"" . site_url('transaksi/pengajuan_barang/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>";
                                echo "<a title=\"Delete\" href=\"" . site_url('transaksi/pengajuan_barang/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>";
                            }
                            echo "</td>"
                            . "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="pj">
                <table id="example111" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"> No</th>
                            <th width="15%"> No Pengajuan</th>
                            <th width="20%"> Nama Anggaran</th>
                            <th width="15%"> Nama Kegiatan</th>
                            <th width="15%"> Periode Pembayaran</th>
                            <th width="10%"> Status</th>
                            <th width="10%"> Status Penolakan</th>
                            <th width="30%" class="td-actions">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_data_honorarium as $row) {
                            echo "<tr>"
                            . "<td>" . $no . "</td>"
                            . "<td>" . $row->nomor_pengajuan . " </td>"
                            . "<td>" . $row->nama_kegiatan . "</td>"
                            . "<td>" . $row->kegiatan . "</td>"
                            . "<td class=\"dt-center\">" . $format_date->format_date_dmy($row->periode_pembayaran) . "</td>"
                            . "<td>" . $status[$row->status_approval] . "</td>"
                            . "<td>" . $status_penolakan[$row->status_penolakan] . "</td>"
                            . "<td class=\"td-actions\">";

                            if ($row->status_approval == 5 && $this->session->userdata('role') == 'operator') {
                                echo "<a title=\"Report (Daftar Honorarium)\" href=\"" . site_url('report/daftar_detail_honorarium/view/' . $row->id) . "\" class=\"btn btn-mini btn-info\"><i class=\"btn-icon-only icon-print\"></i></a>";
//                            echo "<a title=\"Report (Daftar Detail Barang)\" href=\"" . site_url('report/daftar_detail_barang/view/' . $row->id) . "\" class=\"btn btn-mini btn-inverse\"><i class=\"btn-icon-only icon-print\"></i></a>";
                            }
                            echo "<a title=\"View\" href=\"" . site_url('transaksi/pengajuan_honorarium/view/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-file\"></i></a>";
                            if ($row->status_approval == 0 && $this->session->userdata('role') == 'operator') {
                                echo "<a title=\"Edit\" href=\"" . site_url('transaksi/pengajuan_honorarium/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>";
                                echo "<a title=\"Delete\" href=\"" . site_url('transaksi/pengajuan_honorarium/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>";
                            }
                            echo "</td>"
                            . "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /widget-content -->    
</div>