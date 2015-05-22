
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Kegiatan</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('master/kegiatan/add') ?>"><button class="btn">Tambah Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> Unit</th>
                    <th> Kode Kegiatan</th>
                    <th> Nama Kegiatan</th>
                    <th> Koordinator</th>
                    <th> Penanggung Jawab</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td><a href=\"#\" title=\"".$row->nama_unit."\">".$row->kode_unit."</a> </td>"
                    . "<td>" . $row->kode_kegiatan . "</td>"
                    . "<td>" . $row->nama_kegiatan . "</td>"
                    . "<td>" . $row->nama_koordinator . "</td>"
                    . "<td>" . $row->nama_penanggung_jawab . "</td>"
                    . "<td class=\"td-actions\">"
                    . "<a title=\"Edit\" href=\"" . site_url('master/kegiatan/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>"
                    . "<a title=\"Delete\" href=\"" . site_url('master/kegiatan/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>
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