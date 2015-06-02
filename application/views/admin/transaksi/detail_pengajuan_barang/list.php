
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
                    . "<td class=\"td-actions\">";
                    ?>

                <!--<a title = "    Edit" href = "#addDetail<?php echo $row->id ?>" class = "btn btn-mini btn-warning" data-toggle = "modal"><i class = "btn-icon-only icon-pencil"></i></a>-->
                <a title="Delete" href=" <?php echo site_url('transaksi/detail_pengajuan_barang/delete/' . $row->id) ?>" class="btn btn-danger btn-mini"><i class="btn-icon-only icon-remove"></i></a>
                <div id = "addDetail<?php echo $row->id ?>" class = "modal hide fade modal-admin " tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">×</button>
                        <h3 id = "myModalLabel">Edit Barang</h3>
                    </div>
                    <div class = "modal-body">

                        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_pengajuan_barang/process/edit/' . $row->id) ?>" method="POST">
                            <input type="hidden" id="inIdHeader" name="inIdHeader" value="<?php echo $data->id ?>"/>
                            <?php // print_r($row) ?>
                            <table class="table table-bordered" border="0" style="width: 70%">        
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="input-large" name="inNamaBarang2" class="inNamaBarang2">
                                                <option>Pilih Nama Barang</option>

                                                <?php
                                                foreach ($SIList_barang as $row_1) {
//                                                    if (empty($row_1->merek_barang) && empty($row_1->spesifikasi)) {
//                                                        echo "<option value=\"" . $row_1->id . "\"" . set_select('inNamaBarang2', $row_1->id, $row_1->id == $row->id_barang) . ">" . $row_1->nama_barang . "</option>";
//                                                    } else if (empty($row_1->merek_barang)) {
//                                                        echo "<option value=\"" . $row_1->id . "\"" . set_select('inNamaBarang2', $row_1->id, $row_1->id == $row->id_barang) . ">" . $row_1->nama_barang . " - " . $row_1->spesifikasi . "</option>";
//                                                    } else if (empty($row_1->spesifikasi)) {
//                                                        echo "<option value=\"" . $row_1->id . "\"" . set_select('inNamaBarang2', $row_1->id, $row_1->id == $row->id_barang) . ">" . $row_1->nama_barang . " - " . $row_1->merek_barang . "</option>";
//                                                    } else {
//                                                        echo "<option value=\"" . $row_1->id . "\"" . set_select('inNamaBarang2', $row_1->id, $row_1->id == $row->id_barang) . ">" . $row_1->nama_barang . " - " . $row_1->merek_barang . " - " . $row_1->spesifikasi . "</option>";
//                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <label class="clblSatuanBarang" name="clblSatuanBarang" style="min-width: 50px"></label>
                                        </td>
                                        <td>
                                            <label class="clblHargaBarang" name="clblHargaBarang" style="min-width: 50px"></label>
                                        </td>
                                        <td>
                                            <input type="text" id="inJumlah" name="inJumlah" class="input-mini" value="<?php echo $row->jumlah ?>"/>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <input type="submit" class="btn btn-success" value=" Simpan "/>
                        </form>


                    </div>
                </div>
                <?php
                echo "</td>"
                . "</tr>";
                $total = $total + $subtotal;
                $no++;
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
