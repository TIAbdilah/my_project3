
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/biaya_transport_dlm_kota/process/add') ?>" method="POST">            
            <div class="control-group">
                <label class="control-label" for="inpNamaKota">Nama Kota</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpNamaKota">
                        <option>Nama Kota</option>
                        <?php
                        foreach ($SIList_kota as $row_1) {
                            echo "<option value=\"" . $row_1->nama_kota . "\">" . $row_1->nama_kota . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpBiaya">Biaya</label>
                <div class="controls">
                    <input type="text" id="inpBiaya" name="inpBiaya" placeholder="Biaya">
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