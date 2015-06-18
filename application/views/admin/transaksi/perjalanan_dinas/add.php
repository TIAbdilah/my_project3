<!-- widget-header -->
<div class="widget widget-table action-table">
    <?php
    if ($this->session->flashdata('jadwal') != ''):
        echo $this->session->flashdata('jadwal');
    endif;
    ?>
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Anggaran</h3>
    </div>           
    <div class="widget-content" style="padding: 10px;">
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/perjalanan_dinas/process/add') ?>" method="POST">            
            <div class="control-group">
                <label class="control-label" for="inpIdAnggaran">Anggaran</label>
                <div class="controls" >
                    <select class="input-xxlarge" name="inpIdAnggaran" id="inpIdAnggaran"> 
                        <option>Pilih Anggaran</option>
                        <?php
                        foreach ($SIList_anggaran as $row_1) {
                            if ($row_1->id_unit == $this->session->userdata('kode_unit')) {
                                echo "<option value=\"" . $row_1->id . "\">" . $row_1->kode_kegiatan . " - " . $row_1->nama_kegiatan . " - " . $row_1->jenis_belanja . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpMaksudPerjalanan">Maksud Perjalanan</label>
                <div class="controls">
                    <textarea name="inpMaksudPerjalanan" class="input-xxlarge" rows="2"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inDiklat">Diklat</label>
                <div class="controls">
                    <input type="checkbox" name="inDiklat" id="inDiklat" value="Ya"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpJumlahTujuan">Jumlah Kota Tujuan</label>
                <div class="controls">
                    <label class="radio inline">
                        <input type="radio" name="inpJumlahTujuan" id="optionsRadios1" value="1">1 Kota
                    </label>
                    <label class="radio inline">                                                
                        <input type="radio" name="inpJumlahTujuan" id="optionsRadios2" value="2">2 Kota
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="inpJumlahTujuan" id="optionsRadios3" value="3">3 Kota
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpJadwalBerangkat">Jadwal Berangkat</label>
                <div class="controls">
                    <div id="divs1">
                        <div class="div1">
                            <input type="text" class="inpTanggal" name="inpJadwalBerangkat1" placeholder="Tanggal Berangkat 1">
                        </div>
                        <div class="div2">
                            <input type="text" class="inpTanggal" name="inpJadwalBerangkat21" placeholder="Tanggal Berangkat 1">
                            <input type="text" class="inpTanggal" name="inpJadwalBerangkat22" placeholder="Tanggal Berangkat 2">
                        </div>
                        <div class="div3">
                            <input type="text" class="inpTanggal" name="inpJadwalBerangkat31" placeholder="Tanggal Berangkat 1">
                            <input type="text" class="inpTanggal" name="inpJadwalBerangkat32" placeholder="Tanggal Berangkat 2">
                            <input type="text" class="inpTanggal" name="inpJadwalBerangkat33" placeholder="Tanggal Berangkat 3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inJadwalPulang">Jadwal Pulang</label>
                <div class="controls">
                    <div id="divs2">
                        <div class="div1">
                            <input type="text" class="inpTanggal" name="inpJadwalPulang1" placeholder="Tanggal Pulang 1">
                        </div>
                        <div class="div2">
                            <input type="text" class="inpTanggal" name="inpJadwalPulang21" placeholder="Tanggal Pulang 1">
                            <input type="text" class="inpTanggal" name="inpJadwalPulang22" placeholder="Tanggal Pulang 2">
                        </div>
                        <div class="div3">
                            <input type="text" class="inpTanggal" name="inpJadwalPulang31" placeholder="Tanggal Pulang 1">
                            <input type="text" class="inpTanggal" name="inpJadwalPulang32" placeholder="Tanggal Pulang 2">
                            <input type="text" class="inpTanggal" name="inpJadwalPulang33" placeholder="Tanggal Pulang 3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" >Kota Tujuan</label>
                <div class="controls">
                    <div id="divs3">
                        <div class="div1">
                            <select  name="inpKotaTujuan1" id="inpKotaTujuan">
                                <option>Pilih Nama Kota</option>
                                <?php
                                foreach ($SIList_kota_tujuan as $row_1) {
                                    echo "<option value=\"" . $row_1->id . "\">" . $row_1->nama_kota . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="div2">
                            <select  name="inpKotaTujuan21" id="inpKotaTujuan">
                                <option>Pilih Nama Kota</option>
                                <?php
                                foreach ($SIList_kota_tujuan as $row_1) {
                                    echo "<option value=\"" . $row_1->id . "\">" . $row_1->nama_kota . "</option>";
                                }
                                ?>
                            </select>
                            <select  name="inpKotaTujuan22" id="inpKotaTujuan">
                                <option>Pilih Nama Kota</option>
                                <?php
                                foreach ($SIList_kota_tujuan as $row_2) {
                                    echo "<option value=\"" . $row_2->id . "\">" . $row_2->nama_kota . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="div3">
                            <select  name="inpKotaTujuan31" id="inpKotaTujuan">
                                <option>Pilih Nama Kota</option>
                                <?php
                                foreach ($SIList_kota_tujuan as $row_1) {
                                    echo "<option value=\"" . $row_1->id . "\">" . $row_1->nama_kota . "</option>";
                                }
                                ?>
                            </select>
                            <select  name="inpKotaTujuan32" id="inpKotaTujuan">
                                <option>Pilih Nama Kota</option>
                                <?php
                                foreach ($SIList_kota_tujuan as $row_2) {
                                    echo "<option value=\"" . $row_2->id . "\">" . $row_2->nama_kota . "</option>";
                                }
                                ?>
                            </select>
                            <select  name="inpKotaTujuan33" id="inpKotaTujuan">
                                <option>Pilih Nama Kota</option>
                                <?php
                                foreach ($SIList_kota_tujuan as $row_3) {
                                    echo "<option value=\"" . $row_3->id . "\">" . $row_3->nama_kota . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">  
                    <button type="submit" class="btn">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /widget-header --> 
