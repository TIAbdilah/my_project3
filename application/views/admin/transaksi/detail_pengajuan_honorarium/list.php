
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Barang</h3>
        <span class="pull-right" style="margin-right: 10px;">

        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example1" class="table table-striped table-bordered">
            <thead>

                <tr>
                    <th width="2%">No</th>
                    <th width="8%">Nama Barang</th>
                    <th width="6%">Jumlah</th>
                    <th width="6%">Satuan</th>
                    <th width="6%">Harga Satuan </th>
                    <th width="6%">Total</th>
                    <th width="3%">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($list_data as $row) {
                    $subtotal = $row->jumlah * $row->pagu_harga;

                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->nama_barang . "</td>"
                    . "<td>" . number_format($row->jumlah) . "</td>"
                    . "<td>" . $row->satuan . "</td>"
                    . "<td>" . number_format($row->pagu_harga) . "</td>"
                    . "<td>" . number_format($subtotal) . "</td>"
                    . "<td class=\"td-actions\">"
                    . "<a title=\"Edit\" href=\"#editDetail\" role=\"button\" id=\"editDetailBarang\" data-toggle=\"modal\" data-id=\"$row->id\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>"
                    . "<a title=\"Delete\" href=\"" . site_url('transaksi/detail_pengajuan_barang/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>
                                                </td>"
                    . "</tr>";
                    $no++;
                    $total = $total + $subtotal;
                }
                ?>
                <tr>
                    <th colspan="5">Total</th>
                    <th id="outTotalDetailBarang"><?php echo number_format($total) ?></th>
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
