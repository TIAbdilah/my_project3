
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Edit Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/biaya_tiket/process/edit/' . $row->id); ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpNamaKota">Nama Kota</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpNamaKota">
                        <option>Nama Kota</option>
                        <?php
                        foreach ($SIList_kota as $row_1) {
                            echo "<option value=\"" . $row_1->nama_kota . "\"".set_select('inpNamaKota', $row_1->nama_kota, $row_1->nama_kota == $row->kota_asal).">" . $row_1->nama_kota . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpJenisKendaraan">Jenis Kendaraan</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpJenisKendaraan">
                        <option>Jenis Kendaraan</option>
                        <?php
                        foreach ($SIList_jenisKendaraan as $row_3) {
                            echo "<option value=\"" . $row_3->list_item . "\"".set_select('inpJenisKendaraan', $row_3->list_item, $row_3->list_item == $row->jenis_kendaraan).">" . $row_3->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpBiaya">Biaya</label>
                <div class="controls">
                    <input type="text" id="inpBiaya" name="inpBiaya" value="<?php echo $row->biaya?>">
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