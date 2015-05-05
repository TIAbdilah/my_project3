
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Panjar</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> Nama Pegawai</th>
                    <th> Total Biaya Perjalanan</th>
                    <th> Jumlah Uang Muka</th>
                    <th> Penerima</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>            
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->nama_pegawai . " </td>"
                    . "<td>" . number_format($row->total_biaya) . "</td>"
                    . "<td>" . number_format($row->jml_panjar) . "</td>"
                    . "<td>" . $row->nama_penerima . "</td>"
                    . "<td class=\"td-actions\">";
                    ?>
                <a title="Edit" href="#addDetail<?php echo $no ?>" class="btn btn-mini btn-warning" data-toggle="modal"><i class="btn-icon-only icon-pencil"></i></a>
                <div id="addDetail<?php echo $no ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Tambah Data Uang Muka</h3>
                    </div>
                    <div class="modal-body">
                        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/panjar/process/add') ?>" method="POST">
                            <input type="hidden" name="inpIdHeader" value="<?php echo $data->id ?>" />
                            <input type="hidden" name="inpIdPegawai" value="<?php echo $row->id_pegawai ?>" />
                            <table style="width: 100%">
                                <tr>
                                    <td width="20%">Jumlah Uang Muka</td>
                                    <td><input type="text" id="inpJmlPanjar" name="inpJmlPanjar" placeholder="Kode Akun"></td>
                                </tr>
                                <tr>
                                    <td>Penerima</td>
                                    <td>
                                        <select class="input-xlarge" name="inpPenerima">
                                            <option>Nama Pegawai</option>
                                            <?php
                                            foreach ($SIList_pegawai as $row_1) {
                                                echo "<option value=\"" . $row_1->id . "\">" . $row_1->nama . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td colspan="2"><button type="submit" class="btn">Simpan</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <?php
                echo "<a title=\"(Report) Uang Muka Pejalanan\" target=\"_blank\" href=\"" . site_url('report/panjar/view/' . $data->id . "/" . $row->id_pegawai) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-print\"></i></a>";

                echo "</td>"
                . "</tr>";
                $no++;
            }
            ?>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>