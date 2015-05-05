
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
                    <th width="40%"> Anggaran</th>
                    <th width="15%"> Maksud</th>
                    <th width="10%"> Status</th>
                    <th width="10%" class="td-actions">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    if ($row->status == 5) {
                        echo "<tr>"
                        . "<td>" . $no . "</td>"
                        . "<td>" . $row->no_spt . " </td>"
                        . "<td>" . $row->nama_kegiatan . "</td>"
                        . "<td>" . $row->maksud_perjalanan . "</td>"
                        . "<td>" . $status[$row->status] . "</td>"
                        . "<td class=\"td-actions\">";

//                        if ($row->status == 5 && $this->session->userdata('role') == 'operator') {
//                            echo "<a title=\"Report (Uang Muka Kerja)\" href=\"" . site_url('report/panjar/view/' . $row->id) . "\" class=\"btn btn-mini btn-info\"><i class=\"btn-icon-only icon-print\"></i></a>";
//                        }
                        echo "<a title=\"View\" href=\"" . site_url('transaksi/panjar/view/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-file\"></i></a>";                        
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