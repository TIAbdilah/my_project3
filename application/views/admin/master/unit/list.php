
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Unit</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('master/unit/add') ?>"><button class="btn">Tambah Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> Kode Unit</th>
                    <th> Nama Unit</th>
                    <th> Kepala Unit</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->kode_unit . " </td>"
                    . "<td>" . $row->nama_unit . "</td>"
                    . "<td>" . $row->nama_pegawai . "</td>"
                    . "<td class=\"td-actions\">"
                    . "<a title=\"Edit\" href=\"" . site_url('master/unit/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>"
                    . "<a htitle=\"Delete\" ref=\"" . site_url('master/unit/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>"
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