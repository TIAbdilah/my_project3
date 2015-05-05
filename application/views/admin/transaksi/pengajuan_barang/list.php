
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Barang</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('transaksi/pengajuan_barang/add') ?>" role="button" class="btn">Tambah Pengajuan Barang</a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">        
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No</th>
                    <th width="15%"> No Pengajuan</th>
                    <th width="20%"> Nama Anggaran</th>
                    <th width="15%"> Maksud Kegiatan</th>
                    <th width="15%"> Tanggal Pengajuan</th>
                    <th width="10%"> Status</th>
                    <th width="30%" class="td-actions">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->nomor_pengajuan . " </td>"
                    . "<td>" . $row->nama_kegiatan . "</td>"
                    . "<td>" . $row->maksud_kegiatan . "</td>"
                    . "<td>" . $row->tanggal_pengajuan . "</td>"
                    . "<td>" . $status_approval[$row->status_approval] . "</td>"
                    . "<td class=\"td-actions\">";
                    
                    if ($row->status_approval == 5 && $this->session->userdata('role') == 'operator') {
                        echo "<a title=\"Report (Surat Perintah Tugas)\" href=\"" . site_url('report/surat_perintah_tugas/view/' . $row->id) . "\" class=\"btn btn-mini btn-info\"><i class=\"btn-icon-only icon-print\"></i></a>";
                        echo "<a title=\"Report (Daftar Biaya Perjalanan Dinas)\" href=\"" . site_url('report/daftar_biaya_perjalanan/view/' . $row->id) . "\" class=\"btn btn-mini btn-inverse\"><i class=\"btn-icon-only icon-print\"></i></a>";
                    }
                    echo "<a title=\"View\" href=\"" . site_url('transaksi/pengajuan_barang/view/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-file\"></i></a>";
                    if ($row->status_approval == 0 && $this->session->userdata('role') == 'operator') {
//                        echo "<a title=\"Edit\" href=\"" . site_url('transaksi/perjalanan_dinas/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>";
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