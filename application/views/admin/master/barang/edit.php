
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Edit Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/barang/process/edit/' . $row->id); ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpKodeJenisBarang">Jenis Barang</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpKodeJenisBarang">
                        <option>Jenis Barang</option>
                        <?php
                        foreach ($SIList_jenisBarang as $row_1) {
                            echo "<option value=\"" . $row_1->list_item . "\"" . set_select('inpKodeJenisBarang', $row_1->list_item, $row_1->list_item == $row->kode_jenis_barang) . ">" . $row_1->list_item . "</option>";
                        }
                        ?>
                    </select>                    
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKodeBarang">Kode Barang</label>
                <div class="controls">
                    <input type="text" id="inpKodeBarang" name="inpKodeBarang" value="<?php echo $row->kode_barang ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNamaBarang">Nama Barang</label>
                <div class="controls">
                    <input type="text" id="inpNamaBarang" name="inpNamaBarang" value="<?php echo $row->nama_barang ?>">
                </div>
            </div>            
            <div class="control-group">
                <label class="control-label" for="inpPaguHarga">Tipe Barang</label>
                <div class="controls">
                    <input type="text" id="inpTipeBarang" name="inpTipeBarang" value="<?php echo $row->tipe_barang ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPaguHarga">Merek</label>
                <div class="controls">
                    <input type="text" id="inpMerekBarang" name="inpMerekBarang" value="<?php echo $row->merek_barang ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpSatuan">Satuan</label>
                <div class="controls">
                    <select class="input-medium" name="inpSatuan">
                        <option>Satuan</option>
                        <?php
                        foreach ($SIList_satuanBarang as $row_2) {
                            echo "<option value=\"" . $row_2->list_item . "\"" . set_select('inpSatuan', $row_2->list_item, $row_2->list_item == $row->satuan) . ">" . $row_2->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPaguHarga">Pagu Harga</label>
                <div class="controls">
                    <input type="text" id="inpPaguHarga" name="inpPaguHarga" value="<?php echo $row->pagu_harga ?>">
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