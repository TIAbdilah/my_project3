
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Pegawai</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('master/pegawai/add') ?>"><button class="btn">Tambah Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> NIP</th>
                    <th> Nama</th>
                    <th> Golongan</th>
                    <th> Jabatan</th>
                    <th> Kelas Jabatan</th>
                    <th> Status</th>
                    <th> Kode Unit</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->nip . " </td>"
                    . "<td><a href=\"" . site_url('master/pegawai/view/' . $row->id) . "\">" . $row->nama . "</a></td>"
                    . "<td>" . $row->golongan . "</td>"
                    . "<td>" . $row->jabatan . "</td>"
                    . "<td>" . $row->kelas_jabatan . "</td>"
                    . "<td>" . $row->status . "</td>"
                    . "<td>" . $row->nama_unit . "</td>"
                    . "<td class=\"td-actions\">"
                    . "<a href=\"" . site_url('master/pegawai/edit/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-ok\"> </i></a>"
                    . "<a href=\"" . site_url('master/pegawai/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"> </i></a>
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