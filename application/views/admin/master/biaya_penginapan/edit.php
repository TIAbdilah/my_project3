
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Edit Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/biaya_penginapan/process/edit/' . $row->id); ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpNamaKota">Nama Provinsi</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpNamaKota">
                        <option>Pilih Nama Provinsi</option>
                        <?php
                        foreach ($SIList_kota as $row_1) {
                            echo "<option value=\"" . $row_1->nama_provinsi . "\"".set_select('inpNamaKota', $row_1->nama_provinsi, $row_1->nama_provinsi == $row->nama_kota).">" . $row_1->nama_provinsi . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpGolongan">Golongan</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpGolongan">
                        <option>Pilih Golongan</option>
                        <?php
                        foreach ($SIList_golongan as $row_3) {
                            echo "<option value=\"" . $row_3->list_item . "\"".set_select('inpGolongan', $row_3->list_item, $row_3->list_item == $row->golongan).">" . $row_3->list_item . "</option>";
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