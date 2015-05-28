
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/biaya_tiket/process/add') ?>" method="POST">            
            <div class="control-group">
                <label class="control-label" for="inpKotaAsal">Kota Asal</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpKotaAsal">
                        <option>Pilih Kota Asal</option>
                        <?php
                        foreach ($SIList_kota as $row_1) {
                            echo "<option value=\"" . $row_1->nama_kota . "\">" . $row_1->nama_kota . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKotaTujuan">Kota Tujuan</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpKotaTujuan">
                        <option>Pilih Kota Tujuan</option>
                        <?php
                        foreach ($SIList_kota as $row_2) {
                            echo "<option value=\"" . $row_2->nama_kota . "\">" . $row_2->nama_kota . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpJenisKendaraan">Jenis Kendaraan</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpJenisKendaraan">
                        <option>Pilih Jenis Kendaraan</option>
                        <?php
                        foreach ($SIList_jenisKendaraan as $row_3) {
                            echo "<option value=\"" . $row_3->list_item . "\">" . $row_3->list_item . "</option>";
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