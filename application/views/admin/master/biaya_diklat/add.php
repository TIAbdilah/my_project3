
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/biaya_diklat/process/add') ?>" method="POST">            
            <div class="control-group">
                <label class="control-label" for="inpNamaKota">Nama Provinsi</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpNamaKota">
                        <option>Pilih Nama Provinsi</option>
                        <?php
                        foreach ($SIList_kota as $row_1) {
                            echo "<option value=\"" . $row_1->nama_provinsi . "\">" . $row_1->nama_provinsi . "</option>";
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