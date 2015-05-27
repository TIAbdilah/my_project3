
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Edit Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/kegiatan/process/edit/' . $row->id); ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpKodeUnit">Unit</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpKodeUnit">
                        <option>Pilih Unit</option>
                        <?php
                        foreach ($SIList_unit as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\"".set_select('inpKodeUnit', $row_1->id, $row_1->id == $row->id_unit).">" . $row_1->kode_unit . " - " . $row_1->nama_unit . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKodeKegiatan">Kode Kegiatan</label>
                <div class="controls">
                    <input type="text" id="inpKodeKegiatan" name="inpKodeKegiatan" value="<?php echo $row->kode_kegiatan?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNamaKegiatan">Nama Kegiatan</label>
                <div class="controls">
                    <input type="text" class="input-xxlarge" id="inpNamaKegiatan" name="inpNamaKegiatan" value="<?php echo $row->nama_kegiatan?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKoordinator">Koordinator</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpKoordinator">
                        <option>Pilih Koordinator</option>
                        <?php
                        foreach ($SIList_pegawai as $row_2) {
                            echo "<option value=\"" . $row_2->id . "\"".set_select('inpKoordinator', $row_2->id, $row_2->id == $row->koordinator).">" . $row_2->nama . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPenanggungJawab">Penanggung Jawab</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpPenanggungJawab">
                        <option>Pilih Penanggung Jawab</option>
                        <?php
                        foreach ($SIList_pegawai as $row_3) {
                            echo "<option value=\"" . $row_3->id . "\"".set_select('inpPenanggungJawab', $row_3->id, $row_3->id == $row->penanggung_jawab).">" . $row_3->nama . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">                                                
                    <button type="submit" class="btn">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /widget-content --> 
</div>