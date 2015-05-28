
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/unit/process/add') ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpKodeUnit">Kode Unit</label>
                <div class="controls">
                    <input type="text" id="inpKodeUnit" name="inpKodeUnit" placeholder="Kode Unit">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNamaUnit">Nama Unit</label>
                <div class="controls">
                    <input type="text" class="input-xxlarge" id="inpNamaUnit" name="inpNamaUnit" placeholder="Nama Unit">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKepala">Kepala Unit</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpKepala">
                        <option>Pilih Kepala</option>
                        <?php
                        foreach ($SIList_pegawai as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\">" . $row_1->nama . "</option>";
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