
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Anggaran</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="#addDetail" role="button" class="btn" data-toggle="modal">Tambah Pengajuan Perjalanan Dinas</a>

            <div id="addDetail" class="modal hide fade modal-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Alasan Penolakan Pengajuan</h3>
                </div>
                <div class="modal-body">
                    <?php
                    if ($data->jumlah_tujuan == 1) {
                        $this->load->view('admin/transaksi/detail_perjalanan_dinas/add');
                    } else if ($data->jumlah_tujuan == 2) {
                        $this->load->view('admin/transaksi/detail_perjalanan_dinas/add_2');
                    } else {
                        $this->load->view('admin/transaksi/detail_perjalanan_dinas/add_3');
                    }
                    ?>
                </div>
            </div>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example1" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th rowspan="2" width="3%">No</th>
                    <th rowspan="2" width="15%">Nama / NIP</th>
                    <th rowspan="2" width="8%">Golongan</th>
                    <th rowspan="2" width="15%">Jabatan</th>
                    <th rowspan="2" width="8%">Tujuan</th>
                    <th colspan="2">Tanggal</th>
                    <th colspan="5">Rincian Kebutuhan Dana (Rp)</th>
                    <th rowspan="2"  width="3%" class="td-actions">&nbsp;</th>
                </tr>
                <tr>
                    <th width="8%">Berangkat</th>
                    <th width="8%">Kembali</th>
                    <th width="6%">Uang Harian</th>
                    <th width="6%">Uang Ref</th>
                    <th width="6%">Trans</th>
                    <th width="6%">Penginapan</th>
                    <th width="6%">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($index = 0; $index < 10; $index++) {
                    ?>
                    <tr>
                        <td>10</td>
                        <td>Taufik Ismail A</td>
                        <td>III/A</td>
                        <td>Juru Ketik</td>
                        <td>Jakarta</td>
                        <td>22-04-2015</td>
                        <td>23-04-2015</td>
                        <td><?php echo number_format(2000000) ?></td>
                        <td>-</td>
                        <td><?php echo number_format(2000000) ?></td>
                        <td><?php echo number_format(2000000) ?></td>
                        <td><?php echo number_format(6000000) ?></td>
                        <td>
                            <?php
                            echo "<a href=\"" . site_url('transaksi/perjalanan_dinas/edit/') . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a><br>";
                            echo "<a href=\"" . site_url('transaksi/perjalanan_dinas/delete/') . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>";
                            ?> 
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>