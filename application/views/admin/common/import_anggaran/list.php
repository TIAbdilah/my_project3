
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Import Anggaran</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('common/import_anggaran/import_excel') ?>"><button class="btn">Import Data</button></a>
        </span>        
        <span class="pull-right" style="margin-right: 10px;">
            <a href="<?php echo site_url('common/import_anggaran/truncate_table') ?>"><button class="btn">Truncate Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">

        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#kg">Kegiatan</a></li>
            <li><a href="#ak">Akun</a></li>
            <li><a href="#ag">Anggaran</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="kg">
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
                        foreach ($list_data_kegiatan as $row) {
                            echo "<tr>"
                            . "<td>" . $no . "</td>"
                            . "<td>" . $row->kode_unit . "</a> </td>"
                            . "<td>" . $row->kode_kegiatan . "</td>"
                            . "<td>" . $row->nama_kegiatan . "</td>"
                            . "<td>" . $row->koordinator . "</td>"
                            . "<td>" . $row->penanggung_jawab . "</td>"
                            . "<td class=\"td-actions\">"
                            . "<a title=\"Edit\" href=\"" . site_url('common/temp_kegiatan/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>"
                            . "<a title=\"Delete\" href=\"" . site_url('common/temp_kegiatan/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>"
                            . "</td>"
                            . "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="ak">
                <table id="example11" class="table table-striped table-bordered">
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
                        foreach ($list_data_akun as $row) {
                            echo "<tr>"
                            . "<td>" . $no . "</td>"
                            . "<td>" . $row->kode_akun . " </td>"
                            . "<td>" . $row->jenis_belanja . "</td>"
                            . "<td class=\"td-actions\">"
                            . "<a title=\"Edit\" href=\"" . site_url('common/temp_akun/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>"
                            . "<a title=\"Delete\" href=\"" . site_url('common/temp_akun/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>"
                            . "</td>"
                            . "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="ag">
                <table id="example111" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"> No </th>
                            <th> Kegiatan</th>
                            <th> Kode Akun</th>
                            <th> Akun</th>
                            <th> Pagu</th>
                            <th class="td-actions"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_data_anggaran as $row) {
                            echo "<tr>"
                            . "<td>" . $no . "</td>"
                            . "<td>" . $row->kode_kegiatan . " - " . $row->nama_kegiatan . " </td>"
                            . "<td>" . $row->kode_akun . "</td>"
                            . "<td>" . $row->jenis_belanja . "</td>"
                            . "<td class=\"dt-body-right\">" . number_format($row->pagu) . "</td>"
                            . "<td class=\"td-actions\">"
                            . "<a title=\"Edit\" href=\"" . site_url('common/temp_anggaran/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>"
                            . "<a title=\"Delete\" href=\"" . site_url('common/temp_anggaran/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>"
                            . "</td>"
                            . "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /widget-content -->    
</div>