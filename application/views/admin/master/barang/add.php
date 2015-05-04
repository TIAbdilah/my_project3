
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/barang/process/add') ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpKodeJenisBarang">Jenis Barang</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpKodeJenisBarang">
                        <option>Jenis Barang</option>
                        <?php
                        foreach ($SIList_jenisBarang as $row) {
                            echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKodeBarang">Kode Barang</label>
                <div class="controls">
                    <input type="text" id="inpKodeBarang" name="inpKodeBarang" placeholder="Kode Barang">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNamaBarang">Nama Barang</label>
                <div class="controls">
                    <input type="text" id="inpNamaBarang" name="inpNamaBarang" placeholder="Nama Barang">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPaguHarga">Tipe Barang</label>
                <div class="controls">
                    <input type="text" id="inpTipeBarang" name="inpTipeBarang" placeholder="Tipe">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPaguHarga">Merek</label>
                <div class="controls">
                    <input type="text" id="inpMerekBarang" name="inpMerekBarang" placeholder="Merek">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpSatuan">Satuan</label>
                <div class="controls">
                    <select class="input-medium" name="inpSatuan">
                        <option>Satuan</option>
                        <?php
                        foreach ($SIList_satuanBarang as $row) {
                            echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPaguHarga">Harga Satuan</label>
                <div class="controls">
                    <input type="text" id="inpPaguHarga" name="inpPaguHarga" placeholder="Harga Satuan">
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