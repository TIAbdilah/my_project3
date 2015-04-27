
<!-- widget-header -->
<div class="widget-content" ><br>
    <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/perjalanandinas/process/edit') ?>" method="POST">
        <input type="hidden" class="inIdHeader" name="inIdHeader" value="<?php echo $row->id; ?>">

        <input name="inJumTujuan" type="hidden" value="<?php echo $row->jumlah_tujuan; ?>">
        <div class="control-group">
            <label class="control-label" for="inSPT">No SPT</label>
            <div class="controls" id="inSPT">
                <input type="text" disabled="true" placeholder="Auto Generated">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inAnggaran">Anggaran</label>
            <div class="controls" >
                <select class="input-xxlarge" name="inAnggaran" id="inAnggaran" <?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>> 
                    <option>--Anggaran--</option>
                    <?php
                    foreach ($SIList_anggaran as $row_2) {
                        echo "<option value=\"" . $row_2->id . "\"" . set_select('inAnggaran', $row_2->id, $row_2->id == $row->id_anggaran) . ">" . $row_2->kode_kegiatan . " - " . $row_2->nama_kegiatan . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inMaksudPerjalanan">Maksud Perjalanan</label>
            <div class="controls">
                <?php if ($jumlahtujuan['jumlah_tujuan'] == 1) { ?>
                    <input type="text" id="inMaksudPerjalanan1" name="inMaksudPerjalanan1" placeholder="Maksud Perjalanan" value="<?php echo $row->maksud_perjalanan_1; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>
                <?php } else if ($jumlahtujuan['jumlah_tujuan'] == 2) { ?>
                    <input type="text" id="inMaksudPerjalanan1" name="inMaksudPerjalanan1" placeholder="Maksud Perjalanan" value="<?php echo $row->maksud_perjalanan_1; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>                    
                    <input type="text" id="inMaksudPerjalanan2" name="inMaksudPerjalanan2" placeholder="Maksud Perjalanan Kedua" value="<?php echo $row->maksud_perjalanan_2; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>                    
                <?php } else if ($jumlahtujuan['jumlah_tujuan'] == 3) { ?>
                    <input type="text" id="inMaksudPerjalanan1" name="inMaksudPerjalanan1" placeholder="Maksud Perjalanan" value="<?php echo $row->maksud_perjalanan_1; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>                    
                    <input type="text" id="inMaksudPerjalanan2" name="inMaksudPerjalanan2" placeholder="Maksud Perjalanan Kedua" value="<?php echo $row->maksud_perjalanan_2; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>    
                    <input type="text" id="inMaksudPerjalanan3" name="inMaksudPerjalanan3" placeholder="Maksud Perjalanan Ketiga" value="<?php echo $row->maksud_perjalanan_3; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>    
                <?php } ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inJadwalBerangkat">Jadwal Berangkat</label>
            <div class="controls">
                <?php if ($jumlahtujuan['jumlah_tujuan'] == 1) { ?>
                    <input type="text" class="inJadwalBerangkat1" name="inJadwalBerangkat1" placeholder="Tanggal Perjalanan" value="<?php echo $row->jadwal_berangkat_1; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>
                <?php } else if ($jumlahtujuan['jumlah_tujuan'] == 2) { ?>
                    <input type="text" class="inJadwalBerangkat1" name="inJadwalBerangkat1" placeholder="Tanggal Perjalanan" value="<?php echo $row->jadwal_berangkat_1; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>                    
                    <input type="text" class="inJadwalBerangkat2" name="inJadwalBerangkat2" placeholder="Tanggal Perjalanan Kedua" value="<?php echo $row->jadwal_berangkat_2; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>                    
                <?php } else if ($jumlahtujuan['jumlah_tujuan'] == 3) { ?>
                    <input type="text" class="inJadwalBerangkat1" name="inJadwalBerangkat1" placeholder="Tanggal Perjalanan" value="<?php echo $row->jadwal_berangkat_1; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>                    
                    <input type="text" class="inJadwalBerangkat2" name="inJadwalBerangkat2" placeholder="Tanggal Perjalanan Kedua" value="<?php echo $row->jadwal_berangkat_2; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>    
                    <input type="text" class="inJadwalBerangkat3" name="inJadwalBerangkat3" placeholder="Tanggal Perjalanan Ketiga" value="<?php echo $row->jadwal_berangkat_3; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>    
                <?php } ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inJadwalPulang">Jadwal Pulang</label>
            <div class="controls">
                <?php if ($jumlahtujuan['jumlah_tujuan'] == 1) { ?>
                    <input type="text" class="inJadwalPulang1" name="inJadwalPulang1" placeholder="Tanggal Pulang" value="<?php echo $row->jadwal_pulang_1; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>
                <?php } else if ($jumlahtujuan['jumlah_tujuan'] == 2) { ?>
                    <input type="text" class="inJadwalPulang1" name="inJadwalPulang1" placeholder="Tanggal Pulang" value="<?php echo $row->jadwal_pulang_1; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>                    
                    <input type="text" class="inJadwalPulang2" name="inJadwalPulang2" placeholder="Tanggal Pulang Kedua" value="<?php echo $row->jadwal_pulang_2; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>                    
                <?php } else if ($jumlahtujuan['jumlah_tujuan'] == 3) { ?>
                    <input type="text" class="inJadwalPulang1" name="inJadwalPulang1" placeholder="Tanggal Pulang" value="<?php echo $row->jadwal_pulang_1; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>                    
                    <input type="text" class="inJadwalPulang2" name="inJadwalPulang2" placeholder="Tanggal Pulang Kedua" value="<?php echo $row->jadwal_pulang_2; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>    
                    <input type="text" class="inJadwalPulang3" name="inJadwalPulang3" placeholder="Tanggal Pulang Ketiga" value="<?php echo $row->jadwal_pulang_3; ?>"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>    
                <?php } ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inKotaTujuan">Kota Tujuan</label>
            <div class="controls">
                <?php if ($jumlahtujuan['jumlah_tujuan'] == 1) { ?>
                    <select  name="inKotaTujuan1" id="inKotaTujuan1"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>
                        <option>--Nama Kota--</option>
                        <?php
                        foreach ($SIList_kota_tujuan as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\"" . set_select('inKotaTujuan1', $row_1->id, $row_1->id == $row->kota_tujuan_1) . ">" . $row_1->nama_kota . "</option>";
                        }
                        ?>
                    </select>
                <?php } else if ($jumlahtujuan['jumlah_tujuan'] == 2) { ?>
                    <select name="inKotaTujuan1" id="inKotaTujuan1"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>
                        <option>--Nama Kota--</option>
                        <?php
                        foreach ($SIList_kota_tujuan as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\"" . set_select('inKotaTujuan1', $row_1->id, $row_1->id == $row->kota_tujuan_1) . ">" . $row_1->nama_kota . "</option>";
                        }
                        ?>
                    </select>
                    <select  name="inKotaTujuan2" id="inKotaTujuan2"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>
                        <option>--Nama Kota--</option>
                        <?php
                        foreach ($SIList_kota_tujuan as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\"" . set_select('inKotaTujuan1', $row_1->id, $row_1->id == $row->kota_tujuan_2) . ">" . $row_1->nama_kota . "</option>";
                        }
                        ?>
                    </select>
                <?php } else if ($jumlahtujuan['jumlah_tujuan'] == 3) { ?>
                    <select name="inKotaTujuan1" id="inKotaTujuan1"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>
                        <option>--Nama Kota--</option>
                        <?php
                        foreach ($SIList_kota_tujuan as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\"" . set_select('inKotaTujuan1', $row_1->id, $row_1->id == $row->kota_tujuan_1) . ">" . $row_1->nama_kota . "</option>";
                        }
                        ?>
                    </select>
                    <select  name="inKotaTujuan2" id="inKotaTujuan2"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>
                        <option>--Nama Kota--</option>
                        <?php
                        foreach ($SIList_kota_tujuan as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\"" . set_select('inKotaTujuan1', $row_1->id, $row_1->id == $row->kota_tujuan_2) . ">" . $row_1->nama_kota . "</option>";
                        }
                        ?>
                    </select>
                    <select  name="inKotaTujuan3" id="inKotaTujuan3"<?php if ($akun['role'] != 'operator') { ?>disabled="true"<?php } ?>>
                        <option>--Nama Kota--</option>
                        <?php
                        foreach ($SIList_kota_tujuan as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\"" . set_select('inKotaTujuan1', $row_1->id, $row_1->id == $row->kota_tujuan_3) . ">" . $row_1->nama_kota . "</option>";
                        }
                        ?>
                    </select>
                <?php } ?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">  
                <?php if ($akun['role'] == 'operator') { ?>
                    <button type="submit" class="btn">Simpan</button>
                    <?php
                }
                ?>
            </div>
        </div>
    </form>
    <div>
        <div class="row-fluid">
            <?php /* if ($akun['role'] != 'operator' && $akun['role'] != 'kepala satker') { */ ?>
            <?php if ($akun['role'] != 'operator') { ?>

                <div class="span3 ">
                    <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/perjalanandinas/updateStatus/ya/' . $row->status_approval) ?>" method="POST">
                        <input type="hidden" id="inIdHeader" name="inIdHeader" value="<?php echo $row->id; ?>">
                        <input type="submit" role="button" class="btn btn-primary" value="Verifikasi"/>
                    </form>
                </div>
                <div class="span3">
                    <a href="#reject" role="button" class="btn btn-danger" data-toggle="modal">Tolak</a>

                    <div id="reject" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Alasan Penolakan Pengajuan</h3>
                        </div>
                        <div class="modal-body">
                            <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/perjalanandinas/updateStatus/tidak/' . $row->status_approval) ?>" method="POST">
                                <input type="hidden" id="inIdHeader" name="inIdHeader" value="<?php echo $row->id; ?>">
                                <div class="control-group">
                                    <label>Komentar</label>
                                    <div class="controls">
                                        <textarea id="inComment" name="inComment"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">

                                    <div class="controls">
                                        <input type="submit" class="btn btn-primary" id="btnKomentar" value="Tolak"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <!--<a href="<?php echo site_url('transaksi/perjalanandinas/add') ?>"><button class="btn btn-primary">Isi Form Pengajuan</button></a>-->
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="row-fluid">
<<<<<<< HEAD
        <?php if ($akun['role'] == 'operator' && $row->status_approval == 5) { ?>
        <div class="span3">
            <form class="bs-docs-example form-horizontal" method="POST" action="<?php echo site_url('report/surat_perintah_tugas/print_report') ?>">        
                <div class="control-group">
                    <div class="controls"> 
                        <input type="hidden" id="inpIdHeader" name="inpIdHeader" value="<?php echo $row->id; ?>">
                        <input type="submit" class="btn" value="Cetak Surat Perintah Tugas">
=======
        <?php if ($akun['role'] == 'kepala satker') { ?>
            <div class="span3">
                <form class="bs-docs-example form-horizontal" method="POST" action="<?php echo site_url('report/surat_perintah_tugas/print_report') ?>">        
                    <div class="control-group">
                        <div class="controls"> 
                            <input type="hidden" id="inpIdHeader" name="inpIdHeader" value="<?php echo $row->id; ?>">
                            <input type="submit" class="btn" value="Cetak Surat Perintah Tugas">
                        </div>
>>>>>>> c3c04e13961f518a4ce15392615f554f8fe4cf69
                    </div>
                </form>        
            </div>
            <div class="span3">
                <form class="bs-docs-example form-horizontal" method="POST" action="<?php echo site_url('report/daftar_biaya_perjalanan/print_report') ?>">        
                    <div class="control-group">
                        <div class="controls"> 
                            <input type="hidden" id="inpIdHeader" name="inpIdHeader" value="<?php echo $row->id; ?>">
                            <input type="submit" class="btn" value="Cetak Daftar Biaya Perjalanan">
                        </div>
                    </div>
                </form>   
            </div>
        <?php } ?>
    </div>

</div>
<!-- /widget-content --> 
<!-- widget-header -->
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Pegawai Yang Ikut</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <?php if ($akun['role'] == 'operator') { ?>
                <a href="#detail" role="button" class="btn" id="btnTambahDetail" name="btnTambahDetail" data-toggle="modal">Tambah Detail</a>
            <?php } ?>
            <!--modal for detail-->

            <div id="detail" class="modal hide fade modal-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Tambah detail perjalanan</h3>
                </div>
                <div class="modal-body">
                    <!-- /widget-header -->
                    <div class="widget-content"><br>
                        <?php if ($row->jumlah_tujuan == 3) { ?>
                            <form class="bs-docs-example form-horizontal span6" action="<?php echo site_url('transaksi/perjalanandinasdetail/process/add3') ?>" method="POST">
                            <?php } else if ($row->jumlah_tujuan == 2) { ?>
                                <form class="bs-docs-example form-horizontal span6" action="<?php echo site_url('transaksi/perjalanandinasdetail/process/add2') ?>" method="POST">

                                <?php } else if ($row->jumlah_tujuan == 1) { ?>
                                    <form class="bs-docs-example form-horizontal span6" action="<?php echo site_url('transaksi/perjalanandinasdetail/process/add1') ?>" method="POST">

                                    <?php } ?>
                                    <!-- hidden input -->
                                    <input type="hidden" id="inputIdHeader" name="inputIdHeader" value="<?php echo $row->id; ?>"> 
                                    <input type="hidden" id="outJadwalBerangkat1" name="outJadwalBerangkat1" value="<?php echo $row->jadwal_berangkat_1; ?>">  
                                    <input type="hidden" id="outJadwalBerangkat2" name="outJadwalBerangkat2" value="<?php echo $row->jadwal_berangkat_2; ?>">  
                                    <input type="hidden" id="outJadwalBerangkat3" name="outJadwalBerangkat3" value="<?php echo $row->jadwal_berangkat_3; ?>">  
                                    <input type="hidden" id="outJadwalPulang1" name="outJadwalPulang1" value="<?php echo $row->jadwal_pulang_1; ?>">  
                                    <input type="hidden" id="outJadwalPulang2" name="outJadwalPulang2" value="<?php echo $row->jadwal_pulang_2; ?>">  
                                    <input type="hidden" id="outJadwalPulang3" name="outJadwalPulang3" value="<?php echo $row->jadwal_pulang_3; ?>">
                                    <input type="hidden" id="inBiayaAkomodasi1" name="inBiayaAkomodasi1" >  
                                    <input type="hidden" id="inBiayaAkomodasi2" name="inBiayaAkomodasi2" >  
                                    <input type="hidden" id="inBiayaAkomodasi3" name="inBiayaAkomodasi3" >
                                    <input type="hidden" id="inBiayaPenginapan1" name="inBiayaPenginapan1" >  
                                    <input type="hidden" id="inBiayaPenginapan2" name="inBiayaPenginapan2" >  
                                    <input type="hidden" id="inBiayaPenginapan3" name="inBiayaPenginapan3" >
                                    <input type="hidden" id="detailKotaTujuan1" name="detailKotaTujuan1" >  
                                    <input type="hidden" id="detailKotaTujuan2" name="detailKotaTujuan2" >  
                                    <input type="hidden" id="detailKotaTujuan3" name="detailKotaTujuan3" >
                                    <input type="hidden" id="inTransportUtamaTotal" name="inTransportUtamaTotal" >
                                    <!-- hidden input -->

                                    <div class="control-group">
                                        <label class="control-label" for="inPegawai">Nama</label>
                                        <div class="controls">
                                            <select class="input-xlarge" name="inPegawai" id="inPegawai">
                                                <option>--Nama--</option>
                                                <?php
                                                foreach ($SIList_pegawai as $row) {
                                                    echo "<option value=\"" . $row->id . "\">" . $row->nama . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"  for="inNIP">NIP</label>
                                        <div class="controls">
                                            <input type="text" name="inNIP" id="inNIP" placeholder="NIP Pegawai">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inGolongan">Golongan</label>
                                        <div class="controls">
                                            <input type="text" id="inGolongan" name="inGolongan" placeholder="Golongan">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inPengingapan">Penginapan</label>
                                        <div class="controls">
                                            <select class="input-xlarge" id="inPenginapan" name="inPengingapan">
                                                <option>--Jenis Penginapan--</option>
                                                <?php
                                                foreach ($SIList_jenisPenginapan as $row_2) {
                                                    echo "<option value=\"" . $row_2->list_item . "\">" . $row_2->list_item . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inTransportUtama">Transport Utama</label>
                                        <div class="controls">
                                            <select class="input-xlarge" id="inTransportUtama" name="inTransportUtama">
                                                <option>--Transport Utama--</option>
                                                <?php
                                                foreach ($SIList_jenisPenginapan as $row_2) {
                                                    echo "<option value=\"" . $row_2->list_item . "\">" . $row_2->list_item . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inTransportPendukung">Transport Pendukung</label>
                                        <div class="controls">
                                            <input type="text" id="inTransportPendukung" name="inTransportPendukung" placeholder="Rp.">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inPengeluaranRiil">Pengeluaran Riil</label>
                                        <div class="controls">                                                
                                            <input type="text" id="inPengeluaranRiil" name="inPengeluaranRiil" placeholder="Rp.">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                
                                            <button type="submit" class="btn">Simpan</button>
                                            <button class="btn" id="btnHitungTotal">Hitung Total</button> 
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                                

                                        </div>
                                    </div>
                                </form>

                                <!--        <div class="widget-content span6 form-horizontal">
                                            
                                            my name is methos
                                        </div>-->
                                <div class="control-group">
                                    <b>KALKULASI BIAYA PERJALANAN DINAS</b>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="outLamaPerjalanan">Lama Perjalanan (Hari)</label>
                                    <div class="controls">
                                        <input type="text" id="outLamaPerjalanan" name="outLamaPerjalanan" placeholder="0">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="outBiayaAkomodasi">Biaya Akomodasi Per Hari (Rp)</label>
                                    <div class="controls">
                                        <input class="input-mini" type="text" id="outBiayaAkomodasiPengali1" name="outBiayaAkomodasiPengali1" placeholder="0">
                                        <input class="input-medium" type="text" id="outBiayaAkomodasi1" name="outBiayaAkomodasi1">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="input-mini" type="text" id="outBiayaAkomodasiPengali2" name="outBiayaAkomodasiPengali2" placeholder="0">
                                        <input class="input-medium" type="text" id="outBiayaAkomodasi2" name="outBiayaAkomodasi2" placeholder="0">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="input-mini" type="text" id="outBiayaAkomodasiPengali3" name="outBiayaAkomodasiPengali3" placeholder="0">
                                        <input class="input-medium" type="text" id="outBiayaAkomodasi3" name="outBiayaAkomodasi3" placeholder="0">
                                    </div>
                                </div>
                                <!--                            <div class="control-group">
                                                                <div class="controls">
                                                                    <input type="text" id="outBiayaAkomodasiCalc" name="outBiayaAkomodasiCalc" placeholder="0">
                                
                                                                </div>
                                                            </div>-->
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" id="outBiayaAkomodasiTotal" name="outBiayaAkomodasiTotal" placeholder="0" disabled="true">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="outBiayaPenginapan">Biaya Penginapan (Rp)</label>
                                    <div class="controls">
                                        <input class="input-mini" type="text" id="outBiayaPenginapanPengali1" name="outBiayaPenginapanPengali1" placeholder="0">
                                        <input class="input-medium"type="text" id="outBiayaPenginapan1" name="outBiayaPenginapan1" placeholder="0">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="input-mini" type="text" id="outBiayaPenginapanPengali2" name="outBiayaPenginapanPengali2" placeholder="0">
                                        <input class="input-medium"type="text" id="outBiayaPenginapan2" name="outBiayaPenginapan2" placeholder="0">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="input-mini" type="text" id="outBiayaPenginapanPengali3" name="outBiayaPenginapanPengali3" placeholder="0">
                                        <input class="input-medium"type="text" id="outBiayaPenginapan3" name="outBiayaPenginapan3" placeholder="0">
                                    </div>
                                </div>
                                <!--                            <div class="control-group">
                                                                <div class="controls">
                                                                    <input type="text" id="outBiayaPenginapanCalc" name="outBiayaPenginapanCalc" placeholder="0">
                                                                </div>
                                                            </div>-->
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" id="outBiayaPenginapanTotal" name="outBiayaPenginapanTotal" placeholder="0" disabled="true">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="outTransportUtama">Transport Utama (Rp)</label>
                                    <div class="controls">
                                        <input type="text" id="outTransportUtama" name="outTransportUtama" placeholder="0">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" id="outTransportUtamaCalc" name="outTransportUtamaCalc" placeholder="0">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" id="outTransportUtamaTotal" name="outTransportUtamaTotal" placeholder="0" disabled="true">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="outTransportPendukung">Transport Pendukung (Rp)</label>
                                    <div class="controls">
                                        <input type="text" id="outTransportPendukung" name="outTransportPendukung" placeholder="0">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="outPengeluaranRiil">Pengeluaran Riil (Rp)</label>
                                    <div class="controls">
                                        <input type="text" id="outPengeluaranRiil" name="outPengeluaranRiil" placeholder="0">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="outTOTAL"><b>TOTAL (Rp)</b></label>
                                    <div class="controls">
                                        <input type="text" id="outTOTAL" name="outTOTAL" placeholder="0">
                                    </div>
                                </div>

                                </div>
                                <!-- /widget-content --> 
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                    <!--<a href="<?php echo site_url('transaksi/perjalanandinas/add') ?>"><button class="btn btn-primary">Isi Form Pengajuan</button></a>-->
                                </div>
                                </div>

                                <!--/modal for detail-->

                                </span>
                                </div>
                                <div class="widget-content" style="padding: 10px;">
                                    <table <?php if ($akun['role'] == 'operator') { ?>id="example"<?php } ?> class="table table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Golongan</th>
                                                <th>Jabatan</th>
                                                <th>Tujuan</th>
                                                <th>Berangkat</th>
                                                <th>Kembali</th>
                                                <th>Uang Harian</th>
                                                <th>Uang Ref.</th>
                                                <th>Transport</th>
                                                <th>Penginapan</th>
                                                <th>Transport Pendukung</th>
                                                <th>Pengeluaran Riil</th>

                                                <?php if ($akun['role'] == 'operator') { ?><th class="td-actions">Aksi</th><?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--<a href="#detail" role="button" class="btn" data-toggle="modal">Tambah Detail</a>-->
                                            <?php
                                            $no = 1;
                                            foreach (@$perjalanan_detail as $row) {
                                                if ($akun['role'] != 'operator') {

                                                    echo "<tr>"
                                                    . "<td>" . $no . "</td>"
                                                    . "<td>" . $row->nama_pegawai . " </td>"
                                                    . "<td>" . $row->golongan . "</td>"
                                                    . "<td>" . $row->jabatan . " </td>"
                                                    . "<td>" . $row->kota_tujuan . " </td>"
                                                    . "<td>" . $row->jadwal_berangkat . " </td>"
                                                    . "<td>" . $row->jadwal_pulang . " </td>"
                                                    . "<td>" . number_format($row->biaya_akomodasi) . " </td>"
                                                    . "<td> </td>"
                                                    . "<td>" . number_format($row->transport_utama) . " </td>"
                                                    . "<td>" . number_format($row->biaya_penginapan) . "</td>"
                                                    . "<td>" . number_format($row->transport_pendukung) . "</td>"
                                                    . "<td>" . number_format($row->pengeluaran_riil) . "</td>"
                                                    . "</tr>";
                                                    $no++;
                                                } else {
                                                    echo "<tr>"
                                                    . "<td>" . $no . "</td>"
                                                    . "<td>" . $row->nama_pegawai . " </td>"
                                                    . "<td>" . $row->golongan . "</td>"
                                                    . "<td>" . $row->jabatan . " </td>"
                                                    . "<td>" . $row->kota_tujuan . " </td>"
                                                    . "<td>" . $row->jadwal_berangkat . " </td>"
                                                    . "<td>" . $row->jadwal_pulang . " </td>"
                                                    . "<td>" . number_format($row->biaya_akomodasi) . " </td>"
                                                    . "<td> </td>"
                                                    . "<td>" . number_format($row->transport_utama) . " </td>"
                                                    . "<td>" . number_format($row->biaya_penginapan) . "</td>"
                                                    . "<td>" . number_format($row->transport_pendukung) . "</td>"
                                                    . "<td>" . number_format($row->pengeluaran_riil) . "</td>"
                                                    . "<td class=\"td-actions\">"
//                        . "<a href=\"" . site_url('transaksi/perjalanandinas/jumlahtujuan/' . $row->id . '#detail') . "\" class=\"btn btn-success btn-small\" data-toggle=\"modal\"><i class=\"btn-icon-only icon-edit\"> </i></a>"
//                                                . "<a href=\"" . site_url('transaksi/perjalanandinasdetail/edit/' . $row->id.'#detail') . "\" class=\"btn btn-success btn-small\"><i class=\"btn-icon-only icon-edit\"> </i></a>"
                                                    . "<a href = \"" . site_url('transaksi/perjalanandinasdetail/delete/' . $row->id) . "\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>
                                                </td>"
                                                    . "</tr>";
                                                    $no++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                <!-- /widget-header -->

                                <!-- /widget-header -->
                                Komentar
                                <div class="widget-content" style="padding: 10px; width: 50%;">

                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th width="5%"> No </th>
                                                <th width="15%"> username</th>
                                                <th> komentar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data_komentar as $row_5) {
                                                echo "<tr>"
                                                . "<td>" . $no . "</td>"
                                                . "<td>" . $row_5->username . " </td>"
                                                . "<td>" . $row_5->komentar . " </td>";
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /widget-header --> 