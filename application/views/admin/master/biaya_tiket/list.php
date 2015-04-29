
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Biaya Tiket</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('master/biaya_tiket/add') ?>"><button class="btn">Tambah Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> Kota Asal</th>
                    <th> Kota Tujuan</th>
                    <th> Jenis Kendaraan</th>
                    <th> Biaya</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->kota_asal . " </td>"
                    . "<td>" . $row->kota_tujuan . " </td>"
                    . "<td>" . $row->jenis_kendaraan . " </td>"
                    . "<td>" . number_format($row->biaya) . " </td>"
                    . "<td class=\"td-actions\">"
                    . "<a title=\"Edit\" href=\"" . site_url('master/biaya_tiket/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-ok\"></i></a>"
                    . "<a title=\"Delete\" href=\"" . site_url('master/biaya_tiket/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>"
                    . "</td>"
                    . "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>