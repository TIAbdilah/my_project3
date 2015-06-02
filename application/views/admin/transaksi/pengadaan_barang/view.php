<!-- widget-header -->
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>View Data </h3>
    </div>           
    <div class="widget-content" style="padding: 10px;">        
        <table style="width: 100%">
            <tr>
                <td width="12%"><strong>Nomor Pengajuan</strong></td>
                <td valign="top" width="50%">:&nbsp;<?php echo $data_pengajuan_barang->nomor_pengajuan ?></td>
                <td valign="top" width="40%" rowspan="6">
                    <form action="<?php echo site_url('transaksi/pengajuan_barang/update_status/' . $data_pengajuan_barang->id) ?>" method="POST">            
                        <input type="hidden" name="inpIdHeader" value="<?php echo $data_pengajuan_barang->id ?>" />
                        <input type="hidden" name="inpStatus" value="<?php echo $data_pengajuan_barang->status_approval ?>" />
                        <input type="hidden" name="inTotalDetailBarang" id="inTotalDetailBarang" />
                        <?php if ($this->session->userdata('role') != 'operator' && $data_pengajuan_barang->status_approval != 5) { ?>
                            <?php
                            if ($this->session->flashdata('result') != ''):
                                echo $this->session->flashdata('result');
                            endif;
                            ?>
                            <textarea style="width: 95%" rows="2" name="inpKomentar" id="inpKomentar" placeholder="Alasan Penolakan"></textarea><br>
                            <input type="submit" class="btn btn-success" id="btnKomentar" name="inpAksi" value="Setuju"/>
                            <input type="submit" class="btn btn-danger" id="btnKomentar" name="inpAksi" value="Tolak"/>
                            <br>
                        <?php } if ($this->session->userdata('role') == 'operator' && $data_pengajuan_barang->status_approval == 0) { ?>
                            <!--<strong>Ajukan</strong><br>-->
                            <input type="submit" class="btn btn-success" id="btnKomentar" name="inpAksi" value="Ajukan"/>
                        <?php } ?>
                    </form>

                </td>
            </tr>
            <tr>
                <td><strong>Anggaran</strong></td>
                <td valign="top">:&nbsp;<?php echo $data_pengajuan_barang->nama_kegiatan ?> - <?php echo $data_pengajuan_barang->jenis_belanja ?></td>
            </tr>
            <tr>
                <td><strong>Maksud Kegiatan</strong></td>
                <td valign="top">:&nbsp;<?php echo $data_pengajuan_barang->maksud_kegiatan ?></td>
            </tr>
            <tr>
                <td><strong>Tanggal Pengajuan</strong></td>
                <td valign="top">:&nbsp;<?php echo $data_pengajuan_barang->tanggal_pengajuan ?></td>
            </tr>
            <tr>
                <td><strong>Kode Jenis Barang</strong></td>
                <td valign="top">:&nbsp;<?php echo $data_pengajuan_barang->kode_jenis_barang ?></td>
            </tr>
        </table> 

    </div>
    <div class="widget-content" style="padding: 10px;">        
        <?php $this->load->view('admin/transaksi/detail_pengadaan_barang/list') ?>
    </div>
</div>
<!-- /widget-header --> 
