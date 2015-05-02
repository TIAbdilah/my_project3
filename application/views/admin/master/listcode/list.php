
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Listcode</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('admin/listcode/add') ?>"><button class="btn">Tambah Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th> List Name</th>
                    <th> List Item</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $row->list_name . " </td>"
                    . "<td>" . $row->list_item . "</td>"
                    . "<td>"
                    . "<a title=\"Edit\" href=\"" . site_url('admin/listcode/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>&nbsp;"
                    . "<a title=\"Delete\" href=\"" . site_url('admin/listcode/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>"
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
<!-- /widget -->
