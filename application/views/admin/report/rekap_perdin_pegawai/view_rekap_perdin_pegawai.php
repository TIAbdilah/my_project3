
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Laporan (Rekap Perjalanan Dinas Pegawai)</h3>        
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;"><br>
        <form class="bs-docs-example form-inline" action="<?php echo site_url('report/rekap_perdin_pegawai/view/') ?>" method="POST">
            Bulan&nbsp;<?php echo $array_custom->select_item_bulan('inpBulan') ?>
            Tahun&nbsp;
            <select name="inpTahun">
                <option value="">Pilih Tahun</option>
                <?php
                for ($i = 2015; $i < 2020; $i++) {
                    echo "<option value=\"" . $i . "\">" . $i . "</option>";
                }
                ?>
            </select>&nbsp;
            <button type="submit" class="btn">Tampilkan</button>  
        </form>        
        <?php
        if (!empty($month) && !empty($year) && $this->session->userdata('role') != 'asisten satker') {
            ?>
            <a href="<?php echo site_url('report/rekap_perdin_pegawai/print_report/' . $month . '/' . $year . '/' . $kode_unit) ?>">
                <button class="btn btn-success">Cetak</button>
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