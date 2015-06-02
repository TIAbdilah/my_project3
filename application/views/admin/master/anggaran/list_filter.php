
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Anggaran</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a title="(Report) Realisasi Anggaran" href="<?php echo site_url('report/realisasi_anggaran/print_report_1') ?>"><button class="btn">Cetak Report</button></a>
            <a href="<?php echo site_url('master/anggaran/add') ?>"><button class="btn">Tambah Data</button></a>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example2" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> Kegiatan</th>
                    <th> Kode Akun</th>
                    <th> Akun</th>
                    <th> Pagu</th>
                    <th> Realisasi</th>
                    <th> Sisa</th>
                    <th> Persentase</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    if ($row->id_unit == $this->session->userdata('kode_unit')) {
                        echo "<tr>"
                        . "<td>" . $no . "</td>"
                        . "<td>" . $row->kode_kegiatan . " - " . $row->nama_kegiatan ." </td>"
                        . "<td>" . $row->kode_akun . "</td>"
                        . "<td>" . $row->jenis_belanja . "</td>"
                        . "<td class=\"dt-body-right\">" . number_format($row->pagu) . "</td>"
                        . "<td class=\"dt-body-right\">" . number_format($row->biaya) . "</td>"
                        . "<td class=\"dt-body-right\">" . number_format($row->sisa) . "</td>";
                        $persen = ($row->biaya / $row->pagu) * 100;
                        echo "<td class=\"dt-body-right\">" . sprintf("%.2f", $persen) . "% </td>"
                        . "<td class=\"td-actions\">"
                        . "<a title=\"Edit\" href=\"" . site_url('master/anggaran/edit/' . $row->id) . "\" class=\"btn btn-mini btn-warning\"><i class=\"btn-icon-only icon-pencil\"></i></a>"
                        . "<a title=\"Delete\" href=\"" . site_url('master/anggaran/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"></i></a>"
                        . "</td>"
                        . "</tr>";
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>