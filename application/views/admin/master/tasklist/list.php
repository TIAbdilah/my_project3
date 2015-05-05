
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Seranai Tugas</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">

        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#ppd">Pengajuan Perjalanan Dinas</a></li>
            <li><a href="#pbj">Pengajuan Barang dan Jasa</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="ppd">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"> No</th>
                            <th width="15%"> No SPT</th>
                            <th width="40%"> Anggaran</th>
                            <th width="15%"> Status Dokumen</th>
                            <th width="10%"> Status Penolakan</th>
                            <th class="td-actions">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_data as $row) {
                            echo "<tr>"
                            . "<td>" . $no . "</td>"
                            . "<td>" . $row->no_spt . " </td>"
                            . "<td>" . $row->nama_kegiatan . "</td>"
                            . "<td>" . $status[$row->status] . "</td>"
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
            <div class="tab-pane" id="pbj">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"> No</th>
                            <th width="15%"> No SPT</th>
                            <th width="45%"> Anggaran</th>
                            <th width="20%"> Status</th>
                            <th class="td-actions">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
//                $no = 1;
//                foreach ($list_data as $row) {
//                    echo "<tr>"
//                    . "<td>" . $no . "</td>"
//                    . "<td>" . $row->no_spt . " </td>"
//                    . "<td>" . $row->nama_kegiatan . "</td>"
//                    . "<td>" . $status[$row->status] . "</td>"
//                    . "<td class=\"td-actions\">";
//                    if ($row->status == 5 && $this->session->userdata('role') == 'operator') {
//                        echo "<a href=\"" . site_url('report/surat_perintah_tugas/view/' . $row->id) . "\" class=\"btn btn-mini btn-info\"><i class=\"btn-icon-only icon-print\"></i></a>";
//                    }
//                    echo "<a href=\"" . site_url('transaksi/perjalanan_dinas/view/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-file\"></i></a>";
//                    if ($row->status == 0 && $this->session->userdata('role') == 'operator') {
//                        echo "<a href=\"" . site_url('transaksi/perjalanan_dinas/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>";
//                        echo "<a href=\"" . site_url('transaksi/perjalanan_dinas/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>";
//                    }
//                    echo "</td>"
//                    . "</tr>";
//                    $no++;
//                }
//                
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /widget-content -->    
</div>