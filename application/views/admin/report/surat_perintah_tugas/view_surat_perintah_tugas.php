
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Laporan (Surat Perintah Tugas)</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;"><br>
        <form class="bs-docs-example form-inline" action="<?php echo site_url('report/surat_perintah_tugas/view/'.$data->id) ?>" method="POST">
            <strong>Tampilkan berdasarkan unit : </strong>
            <select name="inpIdUnit">                                                
                <option>Pilih Unit</option>
                <?php
                $nm_unit = '';
                foreach ($SIList_unit as $row_1) {
                    if($nm_unit != $row_1->nama_unit)
                    echo "<option value=\"" . $row_1->kode_unit . "\">" . $row_1->nama_unit . "</option>";
                    $nm_unit = $row_1->nama_unit;
                }
                ?>
            </select>
            <button type="submit" class="btn">Tampilkan</button>
        </form>
        <?php 
            if(!empty($data_unit)){
        ?>
        <a href="<?php echo site_url('report/surat_perintah_tugas/print_report/' . $data->id . '/' . $data_unit->id) ?>">
            <button class="btn">Cetak</button>
        </a>
        <?php
            }
        ?>
    </div>
    <div class="widget-content" style="padding: 10px;"><br>
        <?php $this->load->view($report_page) ?>
    </div>

    <!-- /widget-content --> 
</div>