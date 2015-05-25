
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Laporan (Daftar Detail Honorarium)</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;"><br>       
        <a href="<?php echo site_url('report/daftar_detail_honorarium/print_report/'.$id_header) ?>">
            <button class="btn">Cetak</button>
        </a>
    </div>
    <div class="widget-content" style="padding: 10px;"><br>
        <?php $this->load->view($report_page) ?>
    </div>>

    <!-- /widget-content --> 
</div>