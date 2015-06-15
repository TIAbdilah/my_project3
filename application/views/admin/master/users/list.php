
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Pegawai</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('master/users/add') ?>"><button class="btn">Tambah Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th width="10%"> ID Jenis Pengguna</th>
                    <th> Nama</th>
                    <th> NIP</th>
                    <th> Alamat</th>
                    <th> Email</th>
                    <th> Username</th>
                    <th> Telp</th>
                    <th> Aktif</th>
                    <th  width="15%"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->nama_role . " </td>"
                    . "<td>" . $row->nama . "</td>"
                    . "<td>" . $row->nip . "</td>"
                    . "<td>" . $row->alamat . "</td>"
                    . "<td>" . $row->email . "</td>"
                    . "<td>" . $row->username . "</td>"
                    . "<td>" . $row->telp . "</td>"
                    . "<td>" . $array_custom->status_aktivasi[$row->status_aktivasi] . "</td>"
                    . "<td class=\"td-actions\">";
                    if(!$row->status_aktivasi){
                    echo "<a title=\"Aktifkan\" href=\"" . site_url('master/users/activate/' . $row->id_pengguna) . "\" class=\"btn btn-mini btn-primary\"><i class=\"btn-icon-only icon-ok\"></i></a>";
                    } else {
                        echo "<a title=\"Non Aktifkan\" href=\"" . site_url('master/users/deactivate/' . $row->id_pengguna) . "\" class=\"btn btn-mini btn-inverse\"><i class=\"btn-icon-only icon-remove-sign\"></i></a>";
                    }
                    echo "<a title=\"Edit\" href=\"" . site_url('master/users/edit/' . $row->id_pengguna) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>"
                    . "<a title=\"Delete\" href=\"" . site_url('master/users/delete/' . $row->id_pengguna) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>"
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