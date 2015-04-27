
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Anggaran</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="#detail" role="button" class="btn" data-toggle="modal">Tambah Detail</a>

            <div id="detail" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Pilih Jumlah Tujuan Perjalanan</h3>
                </div>
                <div class="modal-body">
                    <a href="<?php echo base_url() . 'transaksi/perjalanandinas/jumlahtujuan/1' ?>" role="button" class="btn"> 1 Tujuan</a><br/>
                    <a href="<?php echo base_url() . 'transaksi/perjalanandinas/jumlahtujuan/2' ?>" role="button" class="btn"> 2 Tujuan</a><br/>
                    <a href="<?php echo base_url() . 'transaksi/perjalanandinas/jumlahtujuan/3' ?>" role="button" class="btn"> 3 Tujuan</a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <!--<a href="<?php echo site_url('transaksi/perjalanandinas/add') ?>"><button class="btn btn-primary">Isi Form Pengajuan</button></a>-->
                </div>
            </div>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> Kegiatan</th>
                    <th> Akun</th>
                    <th> Pagu</th>
                    <th> Tahun</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->id_kegiatan . " </td>"
                    . "<td>" . $row->id_akun . "</td>"
                    . "<td>" . $row->pagu . "</td>"
                    . "<td>" . $row->tahun_anggaran . "</td>"
                    . "<td class=\"td-actions\">"
                    . "<a href=\"" . site_url('master/anggaran/edit/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-ok\"> </i></a>"
                    . "<a href=\"" . site_url('master/anggaran/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"> </i></a>
                                                </td>"
                    . "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>