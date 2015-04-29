
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data User Role</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('master/user_role/add') ?>"><button class="btn">Tambah Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> Nama User</th>
                    <th> Nama Role</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->id_user . " </td>"
                    . "<td>" . $row->id_role . " </td>"
                    . "<td class=\"td-actions\">"
                    . "<a title=\"Edit\" href=\"" . site_url('master/user_role/edit/' . $row->id_user_role) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-ok\"></i></a>"
                    . "<a title=\"Delete\" href=\"" . site_url('master/user_role/delete/' . $row->id_user_role) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>"
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