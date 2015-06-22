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
            <tr>
                <td><strong>Uang Muka</strong></td>
                <td>
                <a title = "Edit" href = "#addDetailUangMuka" class = "btn btn-mini btn-warning" data-toggle = "modal"><i class = "btn-icon-only icon-pencil"></i></a>
                    <div id = "addDetailUangMuka" class = "modal hide fade" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
                        <div class = "modal-header">
                            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">×</button>
                            <h3 id = "myModalLabel">Uang Muka untuk Nomor : <?php echo $data_pengajuan_barang->nomor_pengajuan ?></h3>
                        </div>
                        <div class = "modal-body">
                            <?php
                            if (empty($jumlah_pengadaan_barang->jumlah)) {
                                $lnk = 'add';
                            } else {
                                $lnk = 'edit';
                            }
							// echo $lnk;
                            ?>
                            <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_pengadaan_barang/process/' . $lnk) ?>" method="POST">
                                <input type="hidden" name="inpIdPengadaanBarang" value="<?php echo $data->id ?>" />
                                <input type="hidden" name="inpIdBarang" value="<?php /*echo $row->id_barang */?>" />
                                <br/>
								<table style="width: 100%">
                                    <tr>
                                        <td width="25%">Jumlah Uang Muka</td>
                                        <td><input class="input-xlarge" type="text" id="inpJumlah" name="inpJumlah" value="<?php if (!empty($jumlah_pengadaan_barang->jumlah)){echo $jumlah_pengadaan_barang->jumlah;} ?>"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><button type="submit" class="btn">Simpan</button></td>
                                    </tr>
                                </table>
                            </form>                        
                        </div>
                    </div>

                </td>
            </tr>
        </table> 

    </div>
    <div class="widget-content" style="padding: 10px;">        
        <?php $this->load->view('admin/transaksi/detail_pengadaan_barang/list') ?>
    </div>
</div>
<!-- /widget-header --> 
