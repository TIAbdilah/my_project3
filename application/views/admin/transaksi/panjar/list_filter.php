
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Uang Muka Perjalanan Dinas</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('transaksi/panjar/add') ?>" role="button" class="btn">Tambah Pengajuan Perjalanan Dinas</a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">        
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No</th>
                    <th width="15%"> No SPT</th>
                    <th width="20%"> Penerima</th>
                    <th width="30%"> Deskripsi</th>
                    <th width="10%"> Jumlah Uang Muka</th>
                    <th width="15%" class="td-actions">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    if ($row->id_unit == $this->session->userdata('kode_unit')) {
                        echo "<tr>"
                        . "<td>" . $no . "</td>"
                        . "<td>" . $row->no_spt . "</td>"
                        . "<td>" . $row->nama_penerima . "</td>"
                        . "<td>" . $row->deskripsi_panjar . "</td>"
                        . "<td>" . number_format($row->jumlah) . "</td>"
                        . "<td class=\"td-actions\">"
                        . "<a title=\"Report (Uang Muka Perjalanan Dinas)\" target=\"_blank\" href=\"" . site_url('report/panjar/view/' . $row->id) . "\" class=\"btn btn-mini btn-inverse\"><i class=\"btn-icon-only icon-print\"></i></a>"
                        . "<a title=\"View\" href=\"" . site_url('transaksi/panjar/view/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-file\"></i></a>"
                        . "<a title=\"Edit\" href=\"" . site_url('transaksi/panjar/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>"
                        . "<a title=\"Delete\" href=\"" . site_url('transaksi/panjar/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>"
                        . "</td>"
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