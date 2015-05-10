
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Laporan (Daftar Biaya Perjalnan)</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;"><br>       
        <a href="<?php echo site_url('report/daftar_biaya_perjalanan/print_report/'.$data_header->id) ?>">
            <button class="btn">Cetak</button>
        </a>
    </div>
    <div class="widget-content" style="padding: 10px;"><br>
        <?php $this->load->view($report_page) ?>
    </div>>

    <!-- /widget-content --> 
</div>