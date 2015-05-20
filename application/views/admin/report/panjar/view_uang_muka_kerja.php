
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Laporan (Uang Muka Perjalanan)</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;"><br>       
        <a href="<?php echo site_url('report/panjar/print_report/'.$id_panjar) ?>">
            <button class="btn">Cetak</button>
        </a>
    </div>
    <div class="widget-content" style="padding: 10px;"><br>
        <?php $this->load->view($report_page) ?>
    </div>>

    <!-- /widget-content --> 
</div>