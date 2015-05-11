
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
        <form action="<?php echo site_url('transaksi/pengajuan_barang/update_status/' . $data->id) ?>" method="POST">            
            <input type="hidden" name="inpIdHeader" value="<?php echo $data->id ?>" />
            <input type="hidden" name="inpStatus" value="<?php echo $data->status_approval ?>" />
            <?php if ($this->session->userdata('role') != 'operator' && $data->status_approval != 5) { ?>
                                <!--<strong>Verifikasi</strong><br>-->

                <?php
                if ($this->session->flashdata('result') != ''):
                    echo $this->session->flashdata('result');
                endif;
                ?>
                <textarea style="width: 95%" rows="2" name="inpKomentar" id="inpKomentar" placeholder="Alasan Penolakan"></textarea><br>
                <input type="submit" class="btn btn-success" id="btnKomentar" name="inpAksi" value="Setuju"/>
                <input type="submit" class="btn btn-danger" id="btnKomentar" name="inpAksi" value="Tolak"/>
                <br>
            <?php } if ($this->session->userdata('role') == 'operator' && $data->status_approval == 0) { ?>
                <!--<strong>Ajukan</strong><br>-->
                <input type="submit" class="btn btn-success" id="btnKomentar" name="inpAksi" value="Ajukan"/>
            <?php } ?>
        </form>
        <span class="pull-right">
                        <a href="#viewKomentar" role="button" data-toggle="modal">alasan penolakan</a>

                        <div id="viewKomentar" class="modal hide fade modal-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Alasan Penolakan Pengajuan</h3>
                            </div>
                            <div class="modal-body">
                                <?php
                                $this->load->view('admin/transaksi/komentar/list');
                                ?>
                            </div>
                        </div>
                    </span>
    </div>

</div>
<?php if ($this->session->userdata('role') == 'operator') { ?>
<div class="widget-content" style="padding: 10px;">        
    <?php $this->load->view('admin/transaksi/detail_pengajuan_barang/add') ?> 
</div>
<?php } ?>
<div class="widget-content" style="padding: 10px;">        
    <?php $this->load->view('admin/transaksi/detail_pengajuan_barang/list') ?> 
</div>
<!-- /widget-header --> 
