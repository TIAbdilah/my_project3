
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Pegawai</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('master/barang/add') ?>"><button class="btn">Tambah Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> Jenis Barang</th>
                    <th> Kode Barang</th>
                    <th> Nama Barang</th>
                    <th> Tipe Barang</th>
                    <th> Merek Barang</th>
                    <th> Satuan</th>
                    <th> Harga Satuan</th>                    
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->kode_jenis_barang . "</td>"
                    . "<td>" . $row->kode_barang . " </td>"
                    . "<td>" . $row->nama_barang . "</td>"
                    . "<td>" . $row->tipe_barang . "</td>"
                    . "<td>" . $row->merek_barang . "</td>"
                    . "<td>" . $row->satuan . "</td>"
                    . "<td>" . $row->pagu_harga . "</td>"
                    . "<td class=\"td-actions\">"
                    . "<a title=\"Edit\" href=\"" . site_url('master/barang/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"> </i></a>"
                    . "<a title=\"Delete\" href=\"" . site_url('master/barang/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"> </i></a>"
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