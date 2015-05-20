<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Anggaran</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <?php if ($data->status == 0 and $this->session->userdata('role') == 'operator') { ?>
                <a href="#addDetail" role="button" class="btn" data-toggle="modal" id="btnTambahPengajuan" name="btnTambahPengajuan">Tambah Pengajuan Perjalanan Dinas</a>
            <?php } ?>
            <div id="addDetail" class="modal hide fade modal-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Tambah Data Peserta Perjalanan Dinas</h3>
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
                    <th rowspan="2" width="8%">GOL</th>
                    <th rowspan="2" width="15%">Jabatan</th>
                    <th rowspan="2" width="8%">Tujuan</th>
                    <th colspan="2">Tanggal</th>
                    <th colspan="8">Rincian Kebutuhan Dana (Rp)</th>
                    <?php if ($data->status == 0 and $this->session->userdata('role') == 'operator') { ?>
                        <th rowspan="2"  width="3%" class="td-actions">&nbsp;</th>
                    <?php } ?>
                    <?php if ($data->status == 5 and $this->session->userdata('role') == 'operator') { ?>
                        <th colspan="2" rowspan="2"  width="3%" class="td-actions">&nbsp;</th>
                    <?php } ?>
                </tr>
                <tr>
                    <th width="8%">Berangkat</th>
                    <th width="8%">Kembali</th>
                    <th width="6%">Uang Harian</th>
                    <th width="6%">Uang Ref</th>
                    <th width="6%">Trans</th>
                    <th width="6%">Penginapan</th>
                    <th width="6%">Riil</th>
                    <th width="6%">Diklat</th>
                    <th width="6%">Sewa</th>
                    <th width="6%">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $subtotal_transport = 0;
                $subtotal = 0;
                $total = 0;
                $nama_pegawai = "";
                $rowspan = $data->jumlah_tujuan + 1;
                foreach ($list_data_detail as $data_detail) {
                    $subtotal_transport = $data_detail->transport_utama + $data_detail->transport_pendukung;
                    $subtotal = $data_detail->harian + $data_detail->representatif + $subtotal_transport + $data_detail->penginapan + $data_detail->riil + $data_detail->diklat + $data_detail->sewa;
                    echo "<tr>";
                    if ($nama_pegawai != $data_detail->nama_pegawai) {
                        echo "<td valign=\"top\" align=\"center\" rowspan=\"" . $rowspan . "\">" . $no . "</td>"
                        . "<td valign=\"top\" rowspan=\"" . $rowspan . "\">" . $data_detail->nama_pegawai . " </td>"
                        . "<td valign=\"top\" align=\"center\" rowspan=\"" . $rowspan . "\">" . $data_detail->golongan . "</td>"
                        . "<td valign=\"top\" rowspan=\"" . $rowspan . "\">" . $data_detail->jabatan . "</td>";
                        $no++;
                    }
                    echo "<td>" . $data_detail->kota_tujuan . "</td>"
                    . "<td>" . $data_detail->tgl_berangkat . "</td>"
                    . "<td>" . $data_detail->tgl_pulang . "</td>"
                    . "<td align=\"right\">" . number_format($data_detail->harian) . "</td>"
                    . "<td>" . number_format($data_detail->representatif) . "</td>"
                    . "<td>" . number_format($subtotal_transport) . "</td>"
                    . "<td>" . number_format($data_detail->penginapan) . "</td>"
                    . "<td>" . number_format($data_detail->riil) . "</td>"
                    . "<td>" . number_format($data_detail->diklat) . "</td>"
                    . "<td>" . number_format($data_detail->sewa) . "</td>"
                    . "<td>" . number_format($subtotal) . "</td>";
                    if ($this->session->userdata('role') == 'operator' && $data->status == 0) {
                        echo "<td class=\"td-actions\">"
//                        . "<a title=\"Edit\" href=\"" . site_url('transaksi/detail_perjalanan_dinas/edit/') . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"> </i></a>"
                        . "<a title=\"Delete\" href=\"" . site_url('transaksi/detail_perjalanan_dinas/delete/' . $data->id . '/' . $data_detail->id_pegawai) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"> </i></a>"
                        . "</td>";
                    } else if ($this->session->userdata('role') == 'operator' && $data->status == 5) {

                        echo "<td class=\"td-actions\">"
                        . "<a title=\"Bukti\" href=\"" . site_url('transaksi/bukti_perjalanan_dinas/add/' . $data->id . '/' . $data_detail->id_pegawai . '/' . $data->jumlah_tujuan . '/' . $data_detail->kota_tujuan) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"> </i></a>"
                        . "<a title=\"View Bukti\" href=\"" . site_url('transaksi/bukti_perjalanan_dinas/view/' . $data->id . '/' . $data_detail->id_pegawai . '/' . $data->jumlah_tujuan . '/' . $data_detail->kota_tujuan) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-edit\"> </i></a>"
                        . "</td>";
                        if ($nama_pegawai != $data_detail->nama_pegawai) {
                            echo "<td rowspan=\"" . $rowspan . "\">"
                            . "<a title=\"Report (Kuitansi)\" target=\"_blank\" href=\"" . site_url('report/kuitansi/view/' . $data->id . '/' . $data_detail->id_pegawai) . "\" class=\"btn btn-mini btn-primary\"><i class=\"btn-icon-only icon-print\"> </i></a>"
                            . "<a title=\"Report (Bukti Perjalanan Dinas)\" target=\"_blank\" href=\"" . site_url('report/bukti_perjalanan_dinas/view/' . $data->id . '/' . $data_detail->id_pegawai) . "\" class=\"btn btn-mini btn-inverse\"><i class=\"btn-icon-only icon-print\"> </i></a>"
                            . "<a title=\"Report (Pengeluaran Riil)\" target=\"_blank\" href=\"" . site_url('report/pengeluaran_riil/view/' . $data->id . '/' . $data_detail->id_pegawai) . "\" class=\"btn btn-mini btn-primary\"><i class=\"btn-icon-only icon-print\"> </i></a>"
                            . "</td>";
                        }
                    }
                    echo "</tr>";
                    $total += $subtotal;
                    $nama_pegawai = $data_detail->nama_pegawai;
                }
                ?>
                <tr>
                    <th colspan="14">Total</th>
                    <th id="outTotalDetail"><?php echo number_format($total) ?></th>
                        <?php if ($data->status == 0 and $this->session->userdata('role') == 'operator') { ?>
                        <th>&nbsp;</th>
                    <?php } ?>
                    <?php if ($data->status == 5 and $this->session->userdata('role') == 'operator') { ?>
                        <th colspan="2">&nbsp;</th>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>
