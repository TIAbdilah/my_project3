
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Anggaran</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <?php if ($akun['role'] == 'operator') { ?>
                <a href="#detail" role="button" class="btn" data-toggle="modal">Tambah Pengajuan Perjalanan Dinas</a>
            <?php } ?>
            <div id="detail" class="modal hide fade modal-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Pilih Jumlah Tujuan dan Masukkan Data Pengajuan Perjalanan Dinas</h3>
                </div>
                <div class="modal-body">
<!--                    <a href="<?php echo base_url() . 'transaksi/perjalanandinas/jumlahtujuan/1' ?>" role="button" class="btn"> 1 Tujuan</a><br/>
                    <a href="<?php echo base_url() . 'transaksi/perjalanandinas/jumlahtujuan/2' ?>" role="button" class="btn"> 2 Tujuan</a><br/>
                    <a href="<?php echo base_url() . 'transaksi/perjalanandinas/jumlahtujuan/3' ?>" role="button" class="btn"> 3 Tujuan</a>-->
                    <div id="myRadioGroup">
                        <input type="radio" name="jumtujuan" checked="checked" value="1"  />&nbsp;1 Tujuan &nbsp;
                        <input type="radio" name="jumtujuan" value="2" />&nbsp;2 Tujuan&nbsp;
                        <input type="radio" name="jumtujuan" value="3" />&nbsp;3 Tujuan&nbsp;

                        <div id="Tujuan1" class="desc">
                            <!-- widget-header -->
                            <div class="widget-content"><br>
                                <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/perjalanandinas/process/add') ?>" method="POST">
                                    <input name="inJumTujuan" type="hidden" value="1"/>
                                    <div class="control-group">
                                        <label class="control-label" for="inSPT">No SPT</label>
                                        <div class="controls" id="inSPT">
                                            <input type="text" disabled="true" placeholder="Auto Generated">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inAnggaran">Anggaran</label>
                                        <div class="controls" >
                                            <select class="input-xxlarge" name="inAnggaran" id="inAnggaran"> 
                                                <option>--Anggaran--</option>
                                                <?php
                                                foreach ($SIList_anggaran as $row) {
                                                    echo "<option value=\"" . $row->id . "\">" . $row->kode_kegiatan . " - " . $row->nama_kegiatan . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="inMaksudPerjalanan">Maksud Perjalanan</label>
                                        <div class="controls">
                                            <input type="text" id="inMaksudPerjalanan1" name="inMaksudPerjalanan1" placeholder="Maksud Perjalanan">

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inJadwalBerangkat">Jadwal Berangkat</label>
                                        <div class="controls">

                                            <input type="text" class="inJadwalBerangkat1" name="inJadwalBerangkat1" placeholder="Tanggal Perjalanan">

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inJadwalPulang">Jadwal Pulang</label>
                                        <div class="controls">

                                            <input type="text" class="inJadwalPulang1" name="inJadwalPulang1" placeholder="Tanggal Pulang">

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inKotaTujuan">Kota Tujuan</label>
                                        <div class="controls">

                                            <select  name="inKotaTujuan1" id="inKotaTujuan1">
                                                <option>--Nama Kota--</option>
                                                <?php
                                                foreach ($SIList_kota_tujuan as $row) {
                                                    echo "<option value=\"" . $row->id . "\">" . $row->nama_kota . "</option>";
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                    <!--                                    <div class="control-group">
                                                                            <label class="control-label" for="inKendaraanUtama">Kendaraan Utama</label>
                                                                            <div class="controls" >
                                    
                                    
                                                                                <select name="inKendaraanUtama1" id="inKendaraanUtama1"> 
                                                                                    <option>--Jenis Kendaraan--</option>
                                    <?php
//                                                foreach ($SIList_jenisKendaraan as $row) {
//                                                    echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
//                                                }
                                    ?>
                                                                                </select>
                                    
                                                                            </div>
                                                                        </div>-->
                                    <div class="control-group">
                                        <div class="controls">                                                
                                            <button type="submit" class="btn">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /widget-content --> 
                        </div>
                        <div id="Tujuan2" class="desc" style="display: none;">
                            <!-- widget-header -->
                            <div class="widget-content"><br>
                                <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/perjalanandinas/process/add') ?>" method="POST">
                                    <input name="inJumTujuan" type="hidden" value="2"/>
                                    <div class="control-group">
                                        <label class="control-label" for="inSPT">No SPT</label>
                                        <div class="controls" id="inSPT">
                                            <input type="text" disabled="true" placeholder="Auto Generated">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inAnggaran">Anggaran</label>
                                        <div class="controls" >
                                            <select class="input-xxlarge" name="inAnggaran" id="inAnggaran"> 
                                                <option>--Anggaran--</option>
                                                <?php
                                                foreach ($SIList_anggaran as $row) {
                                                    echo "<option value=\"" . $row->id . "\">" . $row->kode_kegiatan . " - " . $row->nama_kegiatan . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="inMaksudPerjalanan">Maksud Perjalanan</label>
                                        <div class="controls">

                                            <input type="text" id="inMaksudPerjalanan1" name="inMaksudPerjalanan1" placeholder="Maksud Perjalanan">                    
                                            <input type="text" id="inMaksudPerjalanan2" name="inMaksudPerjalanan2" placeholder="Maksud Perjalanan Kedua">                    

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inJadwalBerangkat">Jadwal Berangkat</label>
                                        <div class="controls">

                                            <input type="text" class="inJadwalBerangkat1" name="inJadwalBerangkat1" placeholder="Tanggal Perjalanan">                    
                                            <input type="text" class="inJadwalBerangkat2" name="inJadwalBerangkat2" placeholder="Tanggal Perjalanan Kedua">                    

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inJadwalPulang">Jadwal Pulang</label>
                                        <div class="controls">
                                            <input type="text" class="inJadwalPulang1" name="inJadwalPulang1" placeholder="Tanggal Pulang">                    
                                            <input type="text" class="inJadwalPulang2" name="inJadwalPulang2" placeholder="Tanggal Pulang Kedua">                    

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inKotaTujuan">Kota Tujuan</label>
                                        <div class="controls">
                                            <select name="inKotaTujuan1" id="inKotaTujuan1">
                                                <option>--Nama Kota--</option>
                                                <?php
                                                foreach ($SIList_kota_tujuan as $row) {
                                                    echo "<option value=\"" . $row->id . "\">" . $row->nama_kota . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <select  name="inKotaTujuan2" id="inKotaTujuan2">
                                                <option>--Nama Kota--</option>
                                                <?php
                                                foreach ($SIList_kota_tujuan as $row) {
                                                    echo "<option value=\"" . $row->id . "\">" . $row->nama_kota . "</option>";
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                    <!--                                    <div class="control-group">
                                                                            <label class="control-label" for="inKendaraanUtama">Kendaraan Utama</label>
                                                                            <div class="controls" >
                                    
                                    
                                                                                <select name="inKendaraanUtama1" id="inKendaraanUtama1"> 
                                                                                    <option>--Jenis Kendaraan--</option>
                                    <?php
//                                                foreach ($SIList_jenisKendaraan as $row) {
//                                                    echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
//                                                }
                                    ?>
                                                                                </select>
                                                                                <select name="inKendaraanUtama2" id="inKendaraanUtama2"> 
                                                                                    <option>--Jenis Kendaraan--</option>
                                    <?php
//                                                foreach ($SIList_jenisKendaraan as $row) {
//                                                    echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
//                                                }
                                    ?>
                                                                                </select>        
                                    
                                                                            </div>
                                                                        </div>-->
                                    <div class="control-group">
                                        <div class="controls">                                                
                                            <button type="submit" class="btn">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /widget-content --> 
                        </div>
                        <div id="Tujuan3" class="desc" style="display: none;">
                            <!-- widget-header -->
                            <div class="widget-content"><br>
                                <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/perjalanandinas/process/add') ?>" method="POST">
                                    <input name="inJumTujuan" type="hidden" value="3"/>
                                    <div class="control-group">
                                        <label class="control-label" for="inSPT">No SPT</label>
                                        <div class="controls" id="inSPT">
                                            <input type="text" disabled="true" placeholder="Auto Generated">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inAnggaran">Anggaran</label>
                                        <div class="controls" >
                                            <select class="input-xxlarge" name="inAnggaran" id="inAnggaran"> 
                                                <option>--Anggaran--</option>
                                                <?php
                                                foreach ($SIList_anggaran as $row) {
                                                    echo "<option value=\"" . $row->id . "\">" . $row->kode_kegiatan . " - " . $row->nama_kegiatan . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="inMaksudPerjalanan">Maksud Perjalanan</label>
                                        <div class="controls">

                                            <input type="text" id="inMaksudPerjalanan1" name="inMaksudPerjalanan1" placeholder="Maksud Perjalanan">                    
                                            <input type="text" id="inMaksudPerjalanan2" name="inMaksudPerjalanan2" placeholder="Maksud Perjalanan Kedua">    
                                            <input type="text" id="inMaksudPerjalanan3" name="inMaksudPerjalanan3" placeholder="Maksud Perjalanan Ketiga">    
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inJadwalBerangkat">Jadwal Berangkat</label>
                                        <div class="controls">

                                            <input type="text" class="inJadwalBerangkat1" name="inJadwalBerangkat1" placeholder="Tanggal Perjalanan">                    
                                            <input type="text" class="inJadwalBerangkat2" name="inJadwalBerangkat2" placeholder="Tanggal Perjalanan Kedua">    
                                            <input type="text" class="inJadwalBerangkat3" name="inJadwalBerangkat3" placeholder="Tanggal Perjalanan Ketiga">    
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inJadwalPulang">Jadwal Pulang</label>
                                        <div class="controls">

                                            <input type="text" class="inJadwalPulang1" name="inJadwalPulang1" placeholder="Tanggal Pulang">                    
                                            <input type="text" class="inJadwalPulang2" name="inJadwalPulang2" placeholder="Tanggal Pulang Kedua">    
                                            <input type="text" class="inJadwalPulang3" name="inJadwalPulang3" placeholder="Tanggal Pulang Ketiga">    
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inKotaTujuan">Kota Tujuan</label>
                                        <div class="controls">

                                            <select name="inKotaTujuan1" id="inKotaTujuan1">
                                                <option>--Nama Kota--</option>
                                                <?php
                                                foreach ($SIList_kota_tujuan as $row) {
                                                    echo "<option value=\"" . $row->id . "\">" . $row->nama_kota . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <select  name="inKotaTujuan2" id="inKotaTujuan2">
                                                <option>--Nama Kota--</option>
                                                <?php
                                                foreach ($SIList_kota_tujuan as $row) {
                                                    echo "<option value=\"" . $row->id . "\">" . $row->nama_kota . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <select  name="inKotaTujuan3" id="inKotaTujuan3">
                                                <option>--Nama Kota--</option>
                                                <?php
                                                foreach ($SIList_kota_tujuan as $row) {
                                                    echo "<option value=\"" . $row->id . "\">" . $row->nama_kota . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--                                    <div class="control-group">
                                                                            <label class="control-label" for="inKendaraanUtama">Kendaraan Utama</label>
                                                                            <div class="controls" >
                                    
                                                                                <select name="inKendaraanUtama1" id="inKendaraanUtama1"> 
                                                                                    <option>--Jenis Kendaraan--</option>
                                    <?php
//                                                foreach ($SIList_jenisKendaraan as $row) {
//                                                    echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
//                                                }
                                    ?>
                                                                                </select>
                                                                                <select  name="inKendaraanUtama2" id="inKendaraanUtama2"> 
                                                                                    <option>--Jenis Kendaraan--</option>
                                                                                    //<?php
//                                                foreach ($SIList_jenisKendaraan as $row) {
//                                                    echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
//                                                }
//                                                
                                    ?>
                                                                                </select>
                                                                                <select  name="inKendaraanUtama3" id="inKendaraanUtama3"> 
                                                                                    <option>--Jenis Kendaraan--</option>
                                    <?php
//                                                foreach ($SIList_jenisKendaraan as $row) {
//                                                    echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
//                                                }
//                                                
                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>-->
                                    <div class="control-group">
                                        <div class="controls">                                                
                                            <button type="submit" class="btn">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /widget-content --> 
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <!--<a href="<?php echo site_url('transaksi/perjalanandinas/add') ?>"><button class="btn btn-primary">Isi Form Pengajuan</button></a>-->
                </div>
            </div>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No</th>
                    <th width="15%"> No SPT</th>
                    <th width="45%"> ID Anggaran</th>
                    <th width="20%"> Status Approval</th>
                    <th class="td-actions">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->no_spt . " </td>"
                    . "<td>" . $row->nama_kegiatan . "</td>";


                    if ($row->status_approval == 1) {
                        echo "<td>Sedang diproses di operator</td>";
                    } else if ($row->status_approval == 2) {
                        echo "<td>Sedang diproses di eselon IV</td>";
                    } else if ($row->status_approval == 3) {
                        echo "<td>Sedang diproses di eselon III</td>";
                    } else if ($row->status_approval == 4) {
                        echo "<td>Sedang diproses di asisten satker</td>";
                    } else if ($row->status_approval == 5) {
                        echo "<td>Sedang diproses di kepala satker</td>";
                    } else if ($row->status_approval == 6) {
                        echo "<td>Completed</td>";
                    } else {
                        echo "<td></td>";
                    }


                    echo "<td class=\"td-actions\">";
                    if ($row->status_approval == 5 && $akun['role'] == 'operator') {
                        echo "<a href=\"" . site_url('report/surat_perintah_tugas/view/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-print\"> </i></a>";
                    }
                    echo "<a href=\"" . site_url('transaksi/perjalanandinas/edit/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-ok\"> </i></a>"
                    . "<a href=\"" . site_url('master/anggaran/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"> </i></a>
                                                </td>"
                    . "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>