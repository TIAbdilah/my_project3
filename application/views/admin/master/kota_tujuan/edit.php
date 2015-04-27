
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Edit Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/kota_tujuan/process/edit/' . $row->id); ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpKodeWilayah">Kode Wilayah</label>
                <div class="controls">
                    <input type="text" id="inpKodeWilayah" name="inpKodeWilayah" value="<?php echo $row->kode_wilayah ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNamaProvinsi">Kode Provinsi</label>
                <div class="controls">
                    <input type="text" id="inpNamaProvinsi" name="inpNamaProvinsi" value="<?php echo $row->nama_provinsi ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNamaKota">Nama Kota</label>
                <div class="controls">
                    <input type="text" id="inpNamaKota" name="inpNamaKota" value="<?php echo $row->nama_kota ?>">
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