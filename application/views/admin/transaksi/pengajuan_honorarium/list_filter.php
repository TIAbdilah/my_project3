
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Jasa</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('transaksi/pengajuan_honorarium/add') ?>" role="button" class="btn">Tambah Pengajuan Honorarium</a>
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
                    <th width="15%"> Nama Kegiatan</th>
                    <th width="15%"> Periode Pembayaran</th>
                    <th width="10%"> Status</th>
                    <th width="30%" class="td-actions">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    if ($row->id_unit == $this->session->userdata('kode_unit')) {
                        echo "<tr>"
                        . "<td>" . $no . "</td>"
                        . "<td>" . $row->nomor_pengajuan . " </td>"
                        . "<td>" . $row->nama_kegiatan . "</td>"
                        . "<td>" . $row->kegiatan . "</td>"
                        . "<td>" . $row->periode_pembayaran . "</td>"
                        . "<td>" . $array_custom->status_approval[$row->status_approval] . "</td>"
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
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>