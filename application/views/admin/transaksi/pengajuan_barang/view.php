<div class="widget-content" style="padding: 10px;">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#a">Tambah Data Barang</a></li>
        <li><a href="#b">Detail Header</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="a">
            <h1>cau1</h1>
        </div>
        <div class="tab-pane" id="b">
            <h1>cau2</h1>
        </div>
    </div>
</div>
<!-- widget-header -->
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>View Data </h3>
    </div>           
    <div class="widget-content" style="padding: 10px;">        
        <table style="width: 100%">
            <tr>
                <td width="12%"><strong>Nomor Pengajuan</strong></td>
                <td valign="top" width="50%">:&nbsp;<?php echo $data->nomor_pengajuan ?></td>
                <td valign="top" width="40%" rowspan="6">
                    <form action="<?php echo site_url('transaksi/pengajuan_barang/update_status/' . $data->id) ?>" method="POST">            
                        <input type="hidden" name="inpIdHeader" value="<?php echo $data->id ?>" />
                        <input type="hidden" name="inpStatus" value="<?php echo $data->status_approval ?>" />
                        <input type="hidden" name="inTotalDetailBarang" id="inTotalDetailBarang" />
                        <?php if ($this->session->userdata('role') != 'operator' && $data->status_approval != 5) { ?>
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
                </td>
            </tr>
            <tr>
                <td><strong>Anggaran</strong></td>
                <td valign="top">:&nbsp;<?php echo $data->nama_kegiatan ?> - <?php echo $data->jenis_belanja ?></td>
            </tr>
            <tr>
                <td><strong>Maksud Kegiatan</strong></td>
                <td valign="top">:&nbsp;<?php echo $data->maksud_kegiatan ?></td>
            </tr>
            <tr>
                <td><strong>Tanggal Pengajuan</strong></td>
                <td valign="top">:&nbsp;<?php echo $data->tanggal_pengajuan ?></td>
            </tr>
            <tr>
                <td><strong>Kode Jenis Barang</strong></td>
                <td valign="top">:&nbsp;<?php echo $data->kode_jenis_barang ?></td>
            </tr>
        </table> 

    </div>

    <?php if ($this->session->userdata('role') == 'operator') { ?>
        <div class="widget-content" style="padding: 10px;">        
            <?php $this->load->view('admin/transaksi/detail_pengajuan_barang/add') ?> 
        </div>
    <?php } ?>
    <div class="widget-content" style="padding: 10px;">        
        <?php $this->load->view('admin/transaksi/detail_pengajuan_barang/list') ?> 
    </div>
</div>
<!-- /widget-header --> 

