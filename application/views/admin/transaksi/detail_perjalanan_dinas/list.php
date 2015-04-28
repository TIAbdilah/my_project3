
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Anggaran</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="#addDetail" role="button" class="btn" data-toggle="modal" id="btnTambahPengajuan" name="btnTambahPengajuan">Tambah Pengajuan Perjalanan Dinas</a>

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
                    <th colspan="6">Rincian Kebutuhan Dana (Rp)</th>
                    <th rowspan="2"  width="3%" class="td-actions">&nbsp;</th>
                </tr>
                <tr>
                    <th width="8%">Berangkat</th>
                    <th width="8%">Kembali</th>
                    <th width="6%">Uang Harian</th>
                    <th width="6%">Uang Ref</th>
                    <th width="6%">Trans</th>
                    <th width="6%">Penginapan</th>
                    <th width="6%">Riil</th>
                    <th width="6%">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $subtotal_transport = 0;
                $subtotal = 0;
                $total = 0;
                foreach ($list_data_detail as $data) {
                    $subtotal_transport = $data->transport_utama + $data->transport_pendukung;
                    $subtotal = $data->harian + $data->representatif + $subtotal_transport + $data->penginapan + $data->riil;
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $data->nama_pegawai . " </td>"
                    . "<td>" . $data->golongan . "</td>"
                    . "<td>" . $data->jabatan . "</td>"
                    . "<td>" . $data->nama_kota . "</td>"
                    . "<td>" . $data->tgl_berangkat . "</td>"
                    . "<td>" . $data->tgl_pulang . "</td>"
                    . "<td>" . number_format($data->harian) . "</td>"
                    . "<td>" . number_format($data->representatif) . "</td>"
                    . "<td>" . number_format($subtotal_transport) . "</td>"
                    . "<td>" . number_format($data->penginapan) . "</td>"
                    . "<td>" . number_format($data->riil) . "</td>"
                    . "<td>" . number_format($subtotal) . "</td>"
                    . "<td class=\"td-actions\">";
                    if ($this->session->userdata('role') == 'operator' && $this->status == 0) {
                        echo "<a href=\"" . site_url('master/unit/edit/') . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-ok\"> </i></a>"
                        . "<a href=\"" . site_url('master/unit/delete/') . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"> </i></a>";
                    }
                    echo "</td>"
                    . "</tr>";
                    $no++;
                    $total += $subtotal;
                }
                ?>
                <tr>
                    <th colspan="12">Total</th>
                    <th><?php echo number_format($total) ?></th>
                    <th>&nbsp;</th>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>
