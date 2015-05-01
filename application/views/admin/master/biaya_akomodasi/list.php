
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Uang Harian</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('master/biaya_akomodasi/add') ?>"><button class="btn">Tambah Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Provinsi</th>
                    <th>Status Pegawai</th>
                    <th>Biaya</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $namaKota = "";
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>";
                    if($namaKota != $row->nama_kota){
                        echo  "<td >" . $row->nama_kota . " </td>";
                    } else {
                        echo  "<td ></td>";
                    }                
                    echo "<td>" . $row->status_pegawai . " </td>"
                    . "<td>" . number_format($row->biaya) . " </td>"
                    . "<td class=\"td-actions\">"
                    . "<a title=\"Edit\" href=\"" . site_url('master/biaya_akomodasi/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>"
                    . "<a title=\"Delete\" href=\"" . site_url('master/biaya_akomodasi/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>"
                    . "</td>"
                    . "</tr>";
                    $no++;
                    $namaKota = $row->nama_kota;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>