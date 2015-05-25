
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
                    . "<td class=\"td-actions\">";
                    ?>

                <a title = "Edit" href = "#addDetail<?php echo $row->id ?>" class = "btn btn-mini btn-warning" data-toggle = "modal"><i class = "btn-icon-only icon-pencil"></i></a>
                <a title="Delete" href=" <?php echo site_url('transaksi/detail_pengajuan_honorarium/delete/' . $row->id) ?>" class="btn btn-danger btn-mini"><i class="btn-icon-only icon-remove"></i></a>
                <div id = "addDetail<?php echo $row->id ?>" class = "modal hide fade modal-admin " tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">×</button>
                        <h3 id = "myModalLabel">Edit Honorarium</h3>
                    </div>
                    <div class = "modal-body">


                        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_pengajuan_honorarium/process/edit/' . $row->id) ?>" method="POST">
                            <input type="hidden" id="inIdHeader" name="inIdHeader" value="<?php echo $data->id ?>"/>
                            <table class="table " border="0" style="width: 70%">        
                                <thead>
                                    <tr>
                                        <th>Nama Narasumber</th>
                                        <th>Jumlah Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="input-xxlarge" name="inNamaNarasumber" id="inNamaNarasumber">
                                                <option value="">-Pilih-</option>
                                                <?php
                                                foreach ($SIList_narasumber as $row_1) {
                                                    echo "<option value=\"" . $row_1->id . "\"" . set_select('inNamaNarasumber', $row_1->id, $row_1->id == $row->id_narasumber) . ">" . $row_1->nama . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" id="inJumlah" name="inJumlah" class="input-small" value="<?php echo $row->jumlah?>"/>
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

    </div>
    <!-- /widget-content --> 
</div>
