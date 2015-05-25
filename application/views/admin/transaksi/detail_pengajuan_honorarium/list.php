
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Daftar Narasumber</h3>
        <span class="pull-right" style="margin-right: 10px;">

        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example1" class="table table-striped table-bordered">
            <thead>

                <tr>
                    <th width="2%">No</th>
                    <th width="12%">Nama</th>
                    <th width="3%">Gol</th>
                    <th width="6%">Jabatan/Instansi</th>
                    <th width="2%">Jumlah Jam</th>
                    <th width="6%">Besar Honor Per Jam</th>
                    <th width="6%">Jumlah(Rp.)</th>
                    <th width="6%">Potongan PPh Pasal 21 (Rp.)</th>
                    <th width="6%">Jumlah Bersih Yang Diterima (Rp.)</th>
                    <th width="3%">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                $pph = 0;
                $jumlah_honor = 0;
                $jumlah_bersih = 0;
                $total_jumlah_bersih = 0;
                $total_pph = 0;
                $total_honor = 0;
                foreach ($list_data as $row) {
                    $jumlah_honor = $row->jumlah * $row->honor;
                    $pieces = explode("/", $row->golongan);
                    if ($pieces[0] == 'III') {
                        $pph = (5 * $jumlah_honor) / 100;
                    } else if ($pieces[0] == 'IV') {
                        $pph = (15 * $jumlah_honor) / 100;
                    } else {
                        $pph = 0;
                    }
                    $jumlah_bersih = $jumlah_honor - $pph;


                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->narasumber . "</td>"
                    . "<td>" . $row->golongan . "</td>"
                    . "<td>" . $row->jabatan . "</td>"
                    . "<td>" . $row->jumlah . "</td>"
                    . "<td>" . number_format($row->honor) . "</td>"
                    . "<td>" . number_format($jumlah_honor) . "</td>"
                    . "<td>" . number_format($pph) . "</td>"
                    . "<td>" . number_format($jumlah_bersih) . "</td>"
                    . "<td class=\"td-actions\">"
                    . "<a title=\"Edit\" href=\"#editDetail\" role=\"button\" id=\"editDetailBarang\" data-toggle=\"modal\" data-id=\"$row->id\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>"
                    . "<a title=\"Delete\" href=\"" . site_url('transaksi/detail_pengajuan_honorarium/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>
                                                </td>"
                    . "</tr>";
                    $no++;
                    $total_jumlah_bersih = $total_jumlah_bersih + $jumlah_bersih;
                    $total_pph = $total_pph + $pph;
                    $total_honor = $total_honor + $jumlah_honor;
                }
                ?>
                <tr>
                    <th colspan="6">Jumlah</th>
                    <th><?php echo number_format($total_honor) ?></th>
                    <th><?php echo number_format($total_pph) ?></th>
                    <th id="outTotalDetailBarang"><?php echo number_format($total_jumlah_bersih) ?></th>
                    <th></th>
                </tr>
            </tbody>

        </table>
        <span class="pull-right">
            <!--<a href="#editDetail" role="button" data-toggle="modal">edit detail barang</a>-->

            <div id="editDetail" class="modal hide fade modal-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Alasan Penolakan Pengajuan</h3>
                </div>
                <div class="modal-body">
                    <?php
                    $this->load->view('admin/transaksi/detail_pengajuan_barang/edit');
                    ?>
                </div>
            </div>
        </span>
    </div>
    <!-- /widget-content --> 
</div>
