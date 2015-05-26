
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/kegiatan/process/add') ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpKodeUnit">Unit</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpKodeUnit">
                        <option>Unit</option>
                        <?php
                        foreach ($SIList_unit as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->kode_unit . " - " . $row->nama_unit . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKodeKegiatan">Kode Kegiatan</label>
                <div class="controls">
                    <input type="text" id="inpKodeKegiatan" name="inpKodeKegiatan" placeholder="Kode Kegiatan">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNamaKegiatan">Nama Kegiatan</label>
                <div class="controls">
                    <input type="text" class="input-xxlarge" id="inpNamaKegiatan" name="inpNamaKegiatan" placeholder="Nama Kegiatan">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKoordinator">Koordinator</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpKoordinator">
                        <option>Koordinator</option>
                        <?php
                        foreach ($SIList_pegawai as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->nama . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPenanggungJawab">Penanggung Jawab</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpPenanggungJawab">
                        <option>Penanggung Jawab</option>
                        <?php
                        foreach ($SIList_pegawai as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->nama . "</option>";
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