
<!-- widget-header -->
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Pengajuan Barang</h3>
    </div>           
    <div class="widget-content" style="padding: 10px;">

        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/pengajuan_barang/process/add') ?>" method="POST">            
            <div class="control-group">
                <label class="control-label" for="nomorPengajuan">Nomor Pengajuan</label>
                <div class="controls">
                    :&nbsp;<?php echo $data->nomor_pengajuan ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inIdAnggaran">Anggaran</label>
                <div class="controls" >
                    :&nbsp;<?php echo $data->nama_kegiatan ?> - <?php echo $data->jenis_belanja ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inMaksudKegiatan">Maksud Kegiatan</label>
                <div class="controls">
                     :&nbsp;<?php echo $data->maksud_kegiatan ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inTanggalPengajuan" >Tanggal Pengajuan</label>
                <div class="controls">
                    :&nbsp;<?php echo $data->tanggal_pengajuan ?>
                </div>
            </div>

           
        </form>
    </div>

</div>
<div class="widget-content" style="padding: 10px;">        
    <?php $this->load->view('admin/transaksi/detail_pengajuan_barang/add') ?> 
</div>
<div class="widget-content" style="padding: 10px;">        
    <?php $this->load->view('admin/transaksi/detail_pengajuan_barang/list') ?> 
</div>
<!-- /widget-header --> 
