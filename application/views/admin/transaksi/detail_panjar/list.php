
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Detail Uang Muka</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> Nama Pegawai</th>
                    <th> Jumlah Uang Muka</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>            
            <tbody>
                <?php
                $no = 1;
                foreach ($list_detail_panjar as $row) {
                    echo "<tr>"
                    . "<td align=\"center\">" . $no . "</td>"
                    . "<td>" . $row->nama_pegawai . " </td>"
                    . "<td align=\"right\">" . number_format($row->jumlah) . "</td>"
                    . "<td class=\"td-actions\">";
                    ?>
                <a title = "Edit" href = "#addDetail<?php echo $no ?>" class = "btn btn-mini btn-warning" data-toggle = "modal"><i class = "btn-icon-only icon-pencil"></i></a>
                <div id = "addDetail<?php echo $no ?>" class = "modal hide fade" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">×</button>
                        <h3 id = "myModalLabel">Uang Muka untuk <?php echo $row->nama_pegawai ?></h3>
                    </div>
                    <div class = "modal-body">
                        <?php
                        if (empty($row->jumlah)) {
                            $lnk = 'add';
                        } else {
                            $lnk = 'edit';
                        }
                        ?>
                        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_panjar/process/' . $lnk) ?>" method="POST">
                            <input type="hidden" name="inpIdPanjar" value="<?php echo $data->id ?>" />
                            <input type="hidden" name="inpIdPegawai" value="<?php echo $row->id_pegawai ?>" />
                            <table style="width: 100%">
                                <tr>
                                    <td width="25%">Jumlah Uang Muka</td>
                                    <td><input type="text" id="inpJumlah" name="inpJumlah" value="<?php echo $row->jumlah?>"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><button type="submit" class="btn">Simpan</button></td>
                                </tr>
                            </table>
                        </form>                        
                    </div>
                </div>
                <?php
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