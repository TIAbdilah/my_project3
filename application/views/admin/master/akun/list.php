
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Akun</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('master/akun/add') ?>"><button class="btn">Tambah Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> Kode Akun</th>
                    <th> Jenis Belanja</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->kode_akun . " </td>"
                    . "<td>" . $row->jenis_belanja . "</td>"
                    . "<td class=\"td-actions\">"
                    . "<a href=\"" . site_url('master/akun/edit/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-ok\"> </i></a>"
                    . "<a href=\"" . site_url('master/akun/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"> </i></a>
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