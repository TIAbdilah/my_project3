
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Edit Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/unit/process/edit/' . $row->id); ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpKodeUnit">Kode Unit</label>
                <div class="controls">
                    <input type="text" id="inpKodeUnit" name="inpKodeUnit" value="<?php echo $row->kode_unit ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNamaUnit">Nama Unit</label>
                <div class="controls">
                    <input type="text" id="inpNamaUnit" name="inpNamaUnit" value="<?php echo $row->nama_unit ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKepala">Kepala Unit</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpKepala">
                        <option>Kepala</option>
                        <?php
                        foreach ($SIList_pegawai as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\"" . set_select('inpKepala', $row_1->id, $row_1->id == $row->kepala) . ">" . $row_1->nama . "</option>";
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